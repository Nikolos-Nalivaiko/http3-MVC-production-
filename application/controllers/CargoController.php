<?php

namespace application\controllers;

use application\core\Controller;

class CargoController extends Controller {

    public function cargosAction() {

        preg_match('/cargos\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $page_id = $matches[1];

        $request = $this->session->get('request');

        $visibleItems = 8;

        if($request == null) {
            $request_count = 'SELECT COUNT(*) FROM cargos';

            $filters = [
                'request' => "SELECT * FROM cargos",
                'params' => [],
                'request_count' => $request_count
            ];
    
            $this->session->set('request', $filters);
            $request = $this->session->get('request');
        } 

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $cargos = $this->model->filterSearch($data, $visibleItems, $_POST['page']);
            $this->session->set('request', $cargos['request']);

            echo json_encode($cargos);

            header('Content-Type: application/json');
            die();
        } 

        if(isset($_POST['clearForm'])) {
            $request_count = 'SELECT COUNT(*) FROM cargos';

            $filters = [
                'request' => "SELECT * FROM cargos",
                'params' => [],
                'request_count' => $request_count
            ];
    
            $this->session->set('request', $filters);

            echo json_encode(true);

            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['load_region'])) {
            $region = $_POST['load_region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['unload_region'])) {
            $region = $_POST['unload_region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }
        
        if(!empty($request['params']['load_region'])) {
            $cities_load = $this->model->selectCities($request['params']['load_region']);
        } else {
            $cities_load = null;
        }

        if(!empty($request['params']['unload_region'])) {
            $cities_unload = $this->model->selectCities($request['params']['unload_region']);
        } else {
            $cities_unload = null;
        }

        $cargos = $this->model->getItems($page_id, $visibleItems, $request['request'], $request['params']);

        $vars = [
            'user' => $this->checkAuth(),
            'cargos' => $cargos['cargos'],
            'load_regions' => $this->model->selectRegions(),
            'unload_regions' => $this->model->selectRegions(),
            'params' => $request['params'],
            'cities_load' => $cities_load,
            'cities_unload' => $cities_unload,
            'bodies' => $this->model->getBodies(),
            'pages' => $this->model->getTotalPages($visibleItems, $request['request_count'], $request['params']),
            'currentPage' => $page_id,
            'visiblePages' => $visibleItems
        ];

        $this->view->render('Біржа вантажів', $vars);
    }

    public function infoAction() {

        preg_match('/cargo\/info\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $cargo_id = $matches[1];
        
        $cargo = $this->model->getCargo($cargo_id);

        if(empty($cargo)) {
            $this->view->errorCode(403);
        }

        $vars = [
            'user' => $this->checkAuth(),
            'cargo' => $cargo
        ];

        $this->view->render('Інформація про вантаж', $vars);
    }

    public function createAction() {

        if(isset($_POST['load_region'])) {
            $region = $_POST['load_region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['unload_region'])) {
            $region = $_POST['unload_region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $validation = $this->model->validationForm($data);

            if(empty($validation)) {
                $cargoID = $this->model->createCargo($data, $this->session->get('id_user'));
                $url = '/cargo/info/'.$cargoID;
                $qr = $this->qr->generateQr($cargoID, $url, 'qr_cargos');
                $this->model->setQr($cargoID, $qr);
                echo json_encode($validation);
            } else {
                echo json_encode($validation);
            }

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
            'load_regions' => $this->model->selectRegions(),
            'unload_regions' => $this->model->selectRegions(),
            'bodies' => $this->model->getBodies(),
        ];

        $this->view->render('Новий вантаж', $vars);
    }

    public function updateAction() {

        $cargo_id = $this->session->get('cargo_id');

        $cargo = $this->model->getCargo($cargo_id);

        if(isset($_POST['load_region'])) {
            $region = $_POST['load_region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['unload_region'])) {
            $region = $_POST['unload_region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(!empty($cargo['load_region'])) {
            $cities_load = $this->model->selectCities($cargo['load_region']);
        } else {
            $cities_load = null;
        }

        if(!empty($cargo['unload_region'])) {
            $cities_unload = $this->model->selectCities($cargo['unload_region']);
        } else {
            $cities_unload = null;
        }

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $validation = $this->model->validationForm($data);

            if(empty($validation)) {
                $this->model->updateCargo($data, $cargo_id);
                echo json_encode($validation);
            } else {
                echo json_encode($validation);
            }

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
            'cargo' => $cargo,
            'load_regions' => $this->model->selectRegions(),
            'unload_regions' => $this->model->selectRegions(),
            'cities_load' => $cities_load,
            'cities_unload' => $cities_unload,
            'bodies' => $this->model->getBodies(),
        ];

        $this->view->render('Редагування вантажу', $vars);
    }

}