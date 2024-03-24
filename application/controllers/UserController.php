<?php

namespace application\controllers;

use application\core\Controller;

class UserController extends Controller {

    public function infoAction() {

        preg_match('/user\/info\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $user_id = $matches[1];

        $user = $this->model->getUser($user_id, $this->session->get('id_user'));
        
        if(isset($_POST['formData'])) {
            $data = json_decode($_POST['formData'], true);
            $validation = $this->model->validationForm($data);

            if(empty($validation)) {
                $this->model->createReview($user_id, $this->session->get('id_user'), $data['rating'], $data['review']);
            }
            echo json_encode($validation);

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'user' => $this->checkAuth(),
            'user_info' => $user
        ];

        $this->view->render('Інформація про користувача', $vars);
    }

}