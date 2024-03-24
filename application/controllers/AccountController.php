<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function selectAction() {

        $vars = [
            'user' => $this->checkAuth(),
        ];

        $this->view->render('Вибір типу профілю', $vars);
    }

    public function signInAction() {

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $validation = $this->model->validationSignIn($data);

            if(empty($validation)) {
                $this->session->set('auth', true);
                $user = $this->model->signInUser($data['login']);
                $this->session->set('id_user', $user['id_user']);
                if(isset($data['checkbox'])) {
                    $key = $this->model->rememberUser($data['login']);
                    $this->cookie->set('login', $data['login']);
                    $this->cookie->set('key', $key);
                }
                echo json_encode($validation);
            } else {
                echo json_encode($validation);
            }  

            header('Content-Type: application/json');
            die();
        }

        $vars = [];

        $this->view->render('Авторизація', $vars);
    }

    public function signUpUserAction() {

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $validation = $this->model->validationSignUpUser($data);

            if(empty($validation)) {
                $userID = $this->model->createUser($data);
                $this->session->set('auth', true);
                $this->session->set('id_user', $userID);
                echo json_encode($validation);    
            } else {
                echo json_encode($validation);
            }

            header('Content-Type: application/json');
            die();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES)) {
            $imageArray = [];
            if(!empty($_FILES['files'])) {
                foreach ($_FILES['files']['name'] as $index => $name) {
                    $imageArray[] = [
                        'name' => $name,
                        'size' => $_FILES['files']['size'][$index],
                        'tmp_name' => $_FILES['files']['tmp_name'][$index],
                    ];
                }
                $this->model->uploadImage($imageArray, $this->session->get('id_user'));
            }
        }

        if(isset($_POST['region'])) {
            $region = $_POST['region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
            'regions' => $this->model->selectRegions(),
        ]; 

        $this->view->render('Реєстрація профілю', $vars);
    }

    public function signUpCompanyAction() {

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);

            $validation = $this->model->validationSignUpCompany($data);

            if(empty($validation)) {
                $userID = $this->model->createCompany($data);
                $this->session->set('auth', true);
                $this->session->set('id_user', $userID);
                echo json_encode($validation);    
            } else {
                echo json_encode($validation);
            }

            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['region'])) {
            $region = $_POST['region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'regions' => $this->model->selectRegions(),
        ];

        $this->view->render('Реєстрація профілю', $vars);
    }

    public function recoverySelectAction() {

        $vars = [];

        $this->view->render('Відновлення даних', $vars);
    }

    public function recoveryLoginAction() {

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);
            $validation = $this->model->validationRecoverLogin($data);
            if(empty($validation)) {
                $login = $this->model->recoveryLogin($data);
                echo json_encode(['status' => true, 'login' => $login]);
            } else {
                echo json_encode($validation);
            }

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
        ];

        $this->view->render('Відновлення логіну', $vars);
    }

    public function recoveryPasswordAction() {

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);
            $validation = $this->model->validationRecoverPassword($data);
            if(empty($validation)) {
                $password = $this->model->recoveryPassword($data);
                echo json_encode(['status' => true, 'password' => $password]);
            } else {
                echo json_encode($validation);
            }

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
        ];

        $this->view->render('Відновлення паролю', $vars);
    }

    public function profileAction() {

        $profile = $this->model->getUser($this->session->get('id_user'));

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);
            $validation = $this->model->validationComment($data);

            if(empty($validation)) {
                $this->model->createComment($data, $this->session->get('id_user'));
            }
            echo json_encode($validation);

            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['updateUser'])) {
            $data = json_decode($_POST['updateUser'], true);
            $validation = $this->model->validationSetting($data, $profile['type']);
            if(empty($validation)) {
                $this->model->updateUser($data, $this->session->get('id_user'));
            }

            echo json_encode($validation);
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['imageDelete']) && $_POST['imageDelete'] == 'true') {
            $this->model->deleteImage($this->session->get('id_user'));
        }

        if(isset($_FILES['files'])) {
            $imageArray = [];
            if(!empty($_FILES['files'])) {
                foreach ($_FILES['files']['name'] as $index => $name) {
                    $imageArray[] = [
                        'name' => $name,
                        'size' => $_FILES['files']['size'][$index],
                        'tmp_name' => $_FILES['files']['tmp_name'][$index],
                    ];
                }
                $this->model->updateImageSetting($imageArray, $this->session->get('id_user'));
            }
        } 

        if(!empty($profile['region'])) {
            $cities = $this->model->selectCities($profile['region']);
        } else {
            $cities = null;
        }

        if(isset($_POST['region'])) {
            $region = $_POST['region'];
            echo json_encode($this->model->selectCities($region));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['updateCargoId'])) {
            $cargoId = json_decode($_POST['updateCargoId'], true);
            $this->session->set('cargo_id', $cargoId);
            echo json_encode('true');
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['updateCarId'])) {
            $carId = json_decode($_POST['updateCarId'], true);
            $this->session->set('car_id', $carId);
            echo json_encode('true');
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['cargoId'])) {
            $cargoId = json_decode($_POST['cargoId'], true);
            echo json_encode($this->model->deleteCargo($cargoId));
            header('Content-Type: application/json');
            die();
        }

        if(isset($_POST['carId'])) {
            $carId = json_decode($_POST['carId'], true);
            echo json_encode($this->model->deleteCar($carId));
            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
            'profile' => $profile,
            'regions' => $this->model->selectRegions(),
            'cities' => $cities,
        ];

        $this->view->render('Профіль', $vars);
    }

    public function changePasswordAction() {

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);
            $validation = $this->model->validationChangePass($data);

            if(empty($validation)) {
                $this->model->updatePassword($data, $this->session->get('id_user'));    
            }
            echo json_encode($validation);

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
        ];

        $this->view->render('Зміна паролю', $vars);
    }

    public function changeLoginAction() {

        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);
            $validation = $this->model->validationChangeLogin($data);

            if(empty($validation)) {
                $this->model->updateLogin($data, $this->session->get('id_user'));    
            }
            echo json_encode($validation);

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
        ];

        $this->view->render('Зміна логіну', $vars);
    }
}