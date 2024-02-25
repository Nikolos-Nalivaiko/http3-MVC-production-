<?php

namespace application\controllers;

use application\core\Controller;

class UserController extends Controller {

    public function infoAction() {

        $vars = [];

        $this->view->render('Інформація про користувача', $vars);
    }

}