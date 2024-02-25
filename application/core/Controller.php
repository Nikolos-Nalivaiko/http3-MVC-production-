<?php

namespace application\core;

use application\core\View;
use application\helper\Session;
use application\helper\Cookie;

abstract class Controller {

    public $route;
    public $view;
    public $model;
    public $acl;
    public $session;
    public $cookie;

    public function __construct($route)
    {
       $this->route = $route;
       $this->view = new View($route);
       $this->session = new Session;
       $this->cookie = new Cookie;
       $this->model = $this->loadModel($route['controller']);
       if(!$this->checkAcl()) {
        View::errorCode(403);
       }
    } 

    public function loadModel($name) {
        $path = 'application\models\\'.ucfirst($name);

        if(class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl() {
 
        $this->acl = require 'application/acl/'.$this->route['controller'].'.php';
        if($this->isAcl('all')) {
            return true;
        } elseif ($this->session->has('auth') == true  && $this->isAcl('authorize')) {
            return true;
        } else {
            return false;
        }
    }

    public function isAcl($key) {
        return in_array($this->route['action'], $this->acl[$key]);
    }

    public function checkAuth() {

        $session = $this->session->get('auth');

        $cookie_login = $this->cookie->get('login');
        $cookie_key = $this->cookie->get('key');

        if($session == false) {
            if(!empty($cookie_login) && !empty($cookie_key)) {

                $user = $this->model->checkCookie($cookie_login, $cookie_key);

                if(!empty($user) or $user != false) {
                    $this->session->set('id_user', $user['id_user']);
                    $this->session->set('auth', true);
                    return $this->model->selectUser($user['id_user']);
                }
            } 
        } else {
            return $this->model->selectUser($this->session->get('id_user'));
        }
    }

}