<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function selectAction() {

        $vars = [];

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
            $this->model->uploadImage($_FILES);
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

        $vars = [];

        $this->view->render('Реєстрація профілю', $vars);
    }

    public function recoverySelectAction() {

        $vars = [];

        $this->view->render('Відновлення даних', $vars);
    }

    public function recoveryLoginAction() {

        $vars = [];

        $this->view->render('Відновлення даних', $vars);
    }

    public function recoveryPasswordAction() {

        $vars = [];

        $this->view->render('Відновлення даних', $vars);
    }
}