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
            if($user['type'] == 'Підприємство') {
                $user['user_name'] = ucfirst($user['user_name']);
            } else {
                $user['last_name'] = ucfirst($user['last_name']);
                $user['user_name'] = ucfirst(mb_substr($user['user_name'], 0, 1, 'UTF-8')) . '.';
                $user['middle_name'] = ucfirst(mb_substr($user['middle_name'], 0, 1, 'UTF-8')) . '.';
            }
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

    public function selectRegions() {
        $sql = "SELECT `region_name` FROM `regions`";
        foreach($this->db->row($sql) as $value) {
            $regions[] = $value['region_name'];
        }

        return $regions;
    }

    public function getBodies() {
        $sql = "SELECT `body_name` FROM `bodies`";
        foreach($this->db->row($sql) as $value) {
            $bodies[] = $value['body_name'];
        }

        return $bodies;
    }

    public function selectCities($region) {
        $sql = "SELECT region_id FROM regions WHERE region_name = :region_name";

        $params = [
            'region_name' => $region
        ];

        $region_id = $this->db->column($sql, $params);

        $sql = "SELECT `city_name` FROM cities WHERE region_id = :region_id";

        $params = [
            'region_id' => $region_id
        ];

        foreach($this->db->row($sql, $params) as $value) {
            $cities[] = $value['city_name'];
        }

        return $cities;
    }

}