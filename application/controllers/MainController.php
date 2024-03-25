<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        
        $vars = [
            'user' => $this->checkAuth(),
            'comments' => $this->model->getReviews()
        ];

        $this->view->render('Головна сторінка', $vars);
    }

}