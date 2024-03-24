<?php

namespace application\controllers;

use application\core\Controller;

class CarController extends Controller {

    public function carsAction() {

        preg_match('/cars\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $page_id = $matches[1];

        $visibleItems = 8;

        $request_car = $this->session->get('request_car');

        if($request_car == null) {
            $request_count = 'SELECT COUNT(*) FROM cars';

            $filters = [
                'request' => "SELECT cars.car_id AS car_id_cars, car_images.car_id AS car_id_images, cars.*, car_images.* FROM cars JOIN car_images ON cars.car_id = car_images.car_id WHERE car_images.preview = 'Yes'",
                'params' => [],
                'request_count' => $request_count
            ];
    
            $this->session->set('request_car', $filters);
            $request_car = $this->session->get('request_car');
        } 

        $cars = $this->model->getItems($page_id, $visibleItems, $request_car['request'], $request_car['params']);

        if(isset($_POST['region'])) {
            $region = $_POST['region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(!empty($request_car['params']['region'])) {
            $cities = $this->model->selectCities($request_car['params']['region']);
        } else {
            $cities = null;
        }

        if(!empty($request_car['params']['brand'])) {
            $models = $this->model->getModels($request_car['params']['brand']);
        } else {
            $models = null;
        }

        if(isset($_POST['brand'])) {
            $brand = $_POST['brand'];
            echo json_encode($this->model->getModels($brand));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['clearForm'])) {
            $request_count = 'SELECT COUNT(*) FROM cars';

            $filters = [
                'request' => "SELECT cars.car_id AS car_id_cars, car_images.car_id AS car_id_images, cars.*, car_images.* FROM cars JOIN car_images ON cars.car_id = car_images.car_id WHERE car_images.preview = 'Yes'",
                'params' => [],
                'request_count' => $request_count
            ];
    
            $this->session->set('request_car', $filters);

            echo json_encode(true);

            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $cars = $this->model->filterSearch($data, $visibleItems, $_POST['page']);
            $this->session->set('request_car', $cars['request']);

            echo json_encode($cars);

            header('Content-Type: application/json');
            die();
        } 

        $vars = [
            'user' => $this->checkAuth(),
            'cars' => $cars['cars'],
            'pages' => $this->model->getTotalPages($visibleItems, $request_car['request_count'], $request_car['params']),
            'currentPage' => $page_id,
            'visiblePages' => $visibleItems,
            'params' => $request_car['params'],
            'regions' => $this->model->selectRegions(),
            'bodies' => $this->model->getBodies(),
            'years_from' => $this->model->generateYears(),
            'years_to' => $this->model->generateYears(),
            'brands' => $this->model->getBrands(),
            'cities' => $cities,
            'models' => $models,
        ];

        $this->view->render('Біржа транспорту', $vars);
    }

    public function createAction() {

        if(isset($_POST['region'])) {
            $region = $_POST['region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['brand'])) {
            $brand = $_POST['brand'];
            echo json_encode($this->model->getModels($brand));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $validation = $this->model->validationForm($data);

            if(empty($validation)) {
                $carID = $this->model->createCar($data, $this->session->get('id_user'));
                $this->session->set('carID', $carID);
                $url = '/car/info/'.$carID;
                $qr = $this->qr->generateQr($carID, $url, 'qr_car');
                $this->model->setQr($carID, $qr);
                if(empty($data['file'])) {
                    $this->model->uploadImage($data['file'], $this->session->get('carID'));
                    $this->session->remove('carID');
                } 
                echo json_encode($validation);
            } else {
                echo json_encode($validation);
            }

            header('Content-Type: application/json');
            die();
        }

        if(isset($_FILES['files'])) {
            $imageArray = [];
            if(!empty($_FILES['files'])) {
                foreach ($_FILES['files']['name'] as $index => $name) {
                    $imageArray[] = [
                        'name' => $name,
                        'size' => $_FILES['files']['size'][$index],
                        'preview' => $_POST['preview'][$index],
                        'tmp_name' => $_FILES['files']['tmp_name'][$index],
                    ];
                }
            }
            $this->model->uploadImage($imageArray, $this->session->get('carID'));
            $this->session->remove('carID');
        } 

        $vars = [
            'user' => $this->checkAuth(),
            'regions' => $this->model->selectRegions(),
            'bodies' => $this->model->getBodies(),
            'years' => $this->model->generateYears(),
            'brands' => $this->model->getBrands() 
        ];

        $this->view->render('Новий транспорту', $vars);
    }

    public function infoAction() {

        preg_match('/car\/info\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $car_id = $matches[1];

        $car = $this->model->getCar($car_id);

        if(empty($car)) {
            $this->view->errorCode(403);
        }

        $vars = [
            'user' => $this->checkAuth(),
            'car' => $car,
        ];

        $this->view->render('Інформація про транспорту', $vars);
    }

    public function updateAction() {

        $car_id = $this->session->get('car_id');

        $car = $this->model->getCar($car_id);

        if(!empty($car['region'])) {
            $cities = $this->model->selectCities($car['region']);
        } else {
            $cities = null;
        }

        if(!empty($car['brand'])) {
            $models = $this->model->getModels($car['brand']);
        } else {
            $models = null;
        }

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $validation = $this->model->validationForm($data);

            if(empty($validation)) {
                if(!empty($data['imagesDelete'])) {
                    $this->model->deleteImage($data['imagesDelete'], $car_id);
                }
                $this->model->updateCar($data, $car_id);
            } 

            echo json_encode($validation);

            header('Content-Type: application/json');
            die();
        } 

        if(isset($_FILES['files'])) {
            $imageArray = [];
            if(!empty($_FILES['files'])) {
                foreach ($_FILES['files']['name'] as $index => $name) {
                    $imageArray[] = [
                        'name' => $name,
                        'size' => $_FILES['files']['size'][$index],
                        'preview' => $_POST['preview'][$index],
                        'tmp_name' => $_FILES['files']['tmp_name'][$index],
                    ];
                }
            }
            $this->model->uploadImage($imageArray, $car_id);
        } 

        if(isset($_POST['allImages'])) {
            $all_images = $_POST['allImages'];
            $this->model->updateImages($all_images, $car_id);
        }

        $vars = [
            'user' => $this->checkAuth(),
            'car' => $car,
            'bodies' => $this->model->getBodies(),
            'years' => $this->model->generateYears(),
            'brands' => $this->model->getBrands(),
            'models' => $models,
            'cities' => $cities,
            'regions' => $this->model->selectRegions(),
        ];

        $this->view->render('Інформація про транспорту', $vars);
    }

}