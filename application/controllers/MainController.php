<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        
        // dump($this->session->get('auth'));
        // dump($this->session->get('id_user'));
        // dump($this->cookie->get('auth'));
        // dump($this->cookie->get('id_user'));
        // $this->session->remove('id_user');
        // $this->session->remove('auth');

        // $this->session->remove('auth');
        // $this->session->remove('id_user');
        // $this->cookie->delete('key');
        // $this->cookie->delete('login');

        $vars = [
            'user' => $this->checkAuth()
        ];

        $this->view->render('Головна сторінка', $vars);
    }

}