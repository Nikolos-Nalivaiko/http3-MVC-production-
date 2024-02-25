<?php

namespace application\controllers;

use application\core\Controller;

class CargoController extends Controller {

    public function cargosAction() {

        $vars = [];

        $this->view->render('Біржа вантажів', $vars);
    }

    public function infoAction() {

        $vars = [];

        $this->view->render('Інформація про вантаж', $vars);
    }

    public function createAction() {

        $vars = [];

        $this->view->render('Новий вантаж', $vars);
    }

}