<?php

namespace application\controllers;

use application\core\Controller;

class CarController extends Controller {

    public function carsAction() {

        $vars = [];

        $this->view->render('Біржа транспорту', $vars);
    }

    public function createAction() {

        $vars = [];

        $this->view->render('Новий транспорту', $vars);
    }

    public function infoAction() {

        $vars = [];

        $this->view->render('Інформація про транспорту', $vars);
    }

}