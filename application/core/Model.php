<?php

namespace application\core;

use application\lib\Db;
use application\helper\Validation;

abstract class Model {

    public $db;
    public $validation;

    public function __construct()
    {
        $this->validation = new Validation;
        $this->db = new Db;
    }

    public function selectUser($id_user) {
        $sql = "SELECT * FROM users WHERE id_user = :id";
        $params = [
            'id' => $id_user
        ];

        foreach($this->db->row($sql, $params) as $user) {
            $user['last_name'] = ucfirst($user['last_name']);
            $user['user_name'] = ucfirst(mb_substr($user['user_name'], 0, 1, 'UTF-8')) . '.';
            $user['middle_name'] = ucfirst(mb_substr($user['middle_name'], 0, 1, 'UTF-8')) . '.';
        }
        return $user;
    }

    public function checkCookie($login, $key) {
        $sql = "SELECT * FROM users WHERE login=:login AND cookie=:key";

        $params = [
            'login' => $login,
            'key' => $key,
        ];

        foreach($this->db->row($sql, $params) as $user) {
            return $user;
        }
    }

}