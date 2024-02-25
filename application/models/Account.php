<?php

namespace application\models;
use application\core\Model;

class Account extends Model {

    public function validationSignUpUser($data) {

        $log_check = $this->checkLogin($data['login']);

        if($log_check['status']) {
            return "Такий логін вже існує";
        }

        $rules = [
            'password' => ['required', $this->validation->setRegexData(), 'min: 2', 'max: 18'],
            'confirm' => ['required', $this->validation->setRegexData(), 'same:password', 'min: 2', 'max: 18'],
            'login' => ['required', $this->validation->setRegexData(),'min: 2', 'max: 18'],
            'user_name' => ['required', $this->validation->setRegexDescript()],
            'middle_name' => ['required', $this->validation->setRegexDescript()],
            'last_name' => ['required', $this->validation->setRegexDescript()],
            'region' => ['required'],
            'city' => ['required'],
            'phone' => ['required'], 
            'email' => ['required', 'email'],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function validationSignIn($data) {

        $log_check = $this->checkLogin($data['login']);

        if($log_check['status'] == false) {
            return "Такий логін не існує";
        } else {
            return $this->checkPassSignIn($log_check['password'], $data['password']);
        }


        $rules = [
            'password' => ['required', $this->validation->setRegexData(), 'min: 2', 'max: 18'],
            'login' => ['required', $this->validation->setRegexData(),'min: 2', 'max: 18'],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function createUser($data) {
        $sql = "INSERT INTO `users` (`password`, `login`, `user_name`, `middle_name`, `last_name`, `type`, `region`, `city`, `phone`, `email`, `creation_data`, `cookie`, `image`) VALUES 
        (:password, :login, :user_name, :middle_name, :last_name, :type, :region, :city, :phone, :email, :creation_data, :cookie, :image)";

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        if(empty($data['file'][0]['name'])) {
            $file = 'default.jpg';
        } else {
            $file = $data['file'][0]['name'];
        }

        $params = [
            'password' => $password,
            'login' => $data['login'],
            'user_name' => $data['user_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'type' => 'Фізична особа',
            'region' => $data['region'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'creation_data' => date('Y-m-d'),
            'cookie' => null,
            'image' => $file,
        ];

        $create = $this->db->query($sql, $params);

        return $create['id'];
    }

    public function selectRegions() {
        $sql = "SELECT `region_name` FROM `regions`";
        foreach($this->db->row($sql) as $value) {
            $regions[] = $value['region_name'];
        }

        return $regions;
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

    public function uploadImage($files) {
        foreach ($files as $file) {
            $tmpName = $file['tmp_name'];
            $name = $file['name'];
            
            $root_directory = $_SERVER['DOCUMENT_ROOT'];
            $upload_directory = $root_directory . 'public/user_image/';
            $file_destination = $upload_directory . $name;
    
            move_uploaded_file($tmpName, $file_destination);
        }
    }

    public function rememberUser($login) {
        $key = $this->generateSalt();

        $params = [
           'key' => $key,
           'login' => $login
        ];
        
       $sql = "UPDATE users SET cookie=:key WHERE login=:login";
       $this->db->query($sql,$params);
       return $key;
    }

    public function signInUser($login) {
        $sql = "SELECT * FROM users WHERE login = :login";

        $params = [
            'login' => $login
        ];

        foreach($this->db->row($sql, $params) as $user)  {
            return $user;
        }
    }

    private function checkLogin($login) {
        $sql = "SELECT * FROM users WHERE `login` = :login ";

        $params = [
            'login' => $login
        ];

        $users = $this->db->row($sql, $params);

        if(!empty($users)) {
            foreach($users as $user) {
                return ['status' => true, 'password' => $user['password']];
            }
        } else {
            return ['status' => false];
        }
    }

    private function checkPassSignIn($pass_db, $user_pass) {
        if(!password_verify($user_pass, $pass_db)) {
            return "Пароль неправильний";
        }
    }

    private function generateSalt() {
        $salt = '';
        $saltLenght = 10;

        for($i = 0; $i < $saltLenght; $i++) {
            $salt .= chr(mt_rand(33,126));
        }

        return $salt;
    }
}