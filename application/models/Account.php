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

    public function validationSignUpCompany($data) {
        $log_check = $this->checkLogin($data['login']);

        if($log_check['status']) {
            return "Такий логін вже існує";
        }

        $rules = [
            'password' => ['required', $this->validation->setRegexData(), 'min: 2', 'max: 18'],
            'confirm' => ['required', $this->validation->setRegexData(), 'same:password', 'min: 2', 'max: 18'],
            'login' => ['required', $this->validation->setRegexData(),'min: 2', 'max: 18'],
            'company_name' => ['required', $this->validation->setRegexDescript()],
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

    public function validationComment($data) {

        $rules = [
            'review' => ['required', $this->validation->setRegexDescript()],
            'rating' => ['required'],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function validationSetting($data, $type) {

        if($type == "Фізична особа") {
            $rules = [
                'user_name' => ['required', $this->validation->setRegexDescript()],
                'middle_name' => ['required', $this->validation->setRegexDescript()],
                'last_name' => ['required', $this->validation->setRegexDescript()],
                'region' => ['required'],
                'city' => ['required'],
                'phone' => ['required'], 
                'email' => ['required', 'email'],
            ];
        } else {
            $rules = [
                'user_name' => ['required', $this->validation->setRegexDescript()],
                'region' => ['required'],
                'city' => ['required'],
                'phone' => ['required'], 
                'email' => ['required', 'email'],
            ];
        }

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function validationChangePass($data) {

        $log_check = $this->checkLogin($data['login']);

        if($log_check['status'] == false) {
            return "Такий логін не існує";
        } else {
            return $this->checkPassSignIn($log_check['password'], $data['old_password']);
        }

        $rules = [
            'old_password' => ['required', $this->validation->setRegexData()],
            'new_password' => ['required', $this->validation->setRegexData()],
            'confirm_password' => ['required', $this->validation->setRegexData(), 'same:new_password'],
            'login' => ['required', $this->validation->setRegexData()],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function validationChangeLogin($data) {
        $log_check = $this->checkLogin($data['old_login']);

        if($log_check['status'] == false) {
            return "Такий логін не існує";
        } else {
            return $this->checkPassSignIn($log_check['password'], $data['password']);
        }

        $new_login_check = $this->checkLogin($data['new_login']);

        if($new_login_check['status'] == true) {
            return "Такий логін вже існує";
        }

        $rules = [
            'old_login' => ['required', $this->validation->setRegexData()],
            'new_login' => ['required', $this->validation->setRegexData()],
            'confirm_login' => ['required', $this->validation->setRegexData(), 'same:new_login'],
            'password' => ['required', $this->validation->setRegexData()],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;
    }

    public function validationRecoverLogin($data) {

        $sql = "SELECT * FROM users WHERE email = :email";

        $params = [
            'email' => $data['email']
        ];

        if(empty($this->db->row($sql, $params))) {
            return "Email не існує";
        } else {
            $sql = "SELECT password FROM users WHERE email = :email ";

            $params = [
                'email' => $data['email']
            ];

            $password = $this->db->column($sql, $params);

            if(!password_verify($data['password'], $password)){
                return "Пароль не правильний";
            }

        }


        $rules = [
            'password' => ['required', $this->validation->setRegexData()],
            'email' => ['required', 'email'],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function validationRecoverPassword($data) {

        $sql = "SELECT * FROM users WHERE login = :login";

        $params = [
            'login' => $data['login']
        ];

        if(!empty($this->db->row($sql, $params))) {
            $sql = "SELECT * FROM users WHERE login = :login AND email = :email";

            $params = [
                'login' => $data['login'],
                'email' => $data['email']
            ];

            if(empty($this->db->row($sql, $params))) {
                return "Логін невірний";    
            }

        } else {
            return "Логін не існує";
        }

        $rules = [
            'login' => ['required', $this->validation->setRegexData()],
            'email' => ['required', 'email'],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function recoveryLogin($data) {
        $sql = "SELECT login FROM users WHERE email = :email ";

        $params = [
            'email' => $data['email']
        ];

        return $this->db->column($sql, $params);

    }

    public function recoveryPassword($data) {
        $length = rand(5, 7); 
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $generate_password = '';

        for ($i = 0; $i < $length; $i++) {
            $generate_password .= $characters[rand(0, strlen($characters) - 1)]; 
        }

        $password = password_hash($generate_password, PASSWORD_DEFAULT);
    
        $sql = "UPDATE users SET password = :password WHERE login = :login AND email = :email";

        $params = [
            'password' => $password,
            'login' => $data['login'],
            'email' => $data['email']
        ];

        $this->db->query($sql, $params);

        return $generate_password;
        
    }

    public function createUser($data) {
        $sql = "INSERT INTO `users` (`password`, `login`, `user_name`, `middle_name`, `last_name`, `type`, `region`, `city`, `phone`, `email`, `creation_data`, `cookie`) VALUES 
        (:password, :login, :user_name, :middle_name, :last_name, :type, :region, :city, :phone, :email, :creation_data, :cookie)";

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

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
        ];

        $create = $this->db->query($sql, $params);

        return $create['id'];
    }

    public function createCompany($data) {
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
            'user_name' => $data['company_name'],
            'middle_name' => null,
            'last_name' => null,
            'type' => 'Підприємство',
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

    public function uploadImage($files, $user_id) {
        if(!empty($files)) {
            foreach ($files as $file) {
                $tmpName = $file['tmp_name'];
                $name = $file['name'];

                $root_directory = $_SERVER['DOCUMENT_ROOT'];
                $upload_directory = $root_directory . 'public/user_image/';
                $file_destination = $upload_directory . $name;
    
                $sql = "UPDATE `users` SET `image` = :image WHERE `users`.`id_user` = :user_id";

                $params = [
                    'image' => $file['name'],
                    'user_id' => $user_id
                ];

                $this->db->query($sql,$params);
        
                move_uploaded_file($tmpName, $file_destination);
            }
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

    public function getUser($user_id) {
        $sql = "SELECT * FROM users WHERE id_user = :user_id";

        $params = [
            'user_id' => $user_id
        ];

        foreach($this->db->row($sql, $params) as $user) {

            $sql = "SELECT reviews.*, users.user_name, users.middle_name, users.last_name, users.type, users.image 
            FROM reviews
            LEFT JOIN users ON users.id_user = reviews.sender_id 
            WHERE recipient_id = :user_id";

            $params = [
                'user_id' => $user_id
            ];

            $data = $this->db->row($sql, $params);

            if(!empty($data)) {
                foreach($data as $review) {
                    $average_rating[] = $review['rating'];
                    $reviews[] = $review;
                }
    
                $user['reviews'] = $reviews;
                $user['average_rating'] = round(array_sum($average_rating) / count($average_rating), 1);
            } else {
                $user['reviews'] = null;
                $user['average_rating'] = "-";
            }

            $sql = "SELECT * FROM cargos WHERE user_id = :user_id ORDER BY cargo_id DESC";

            $params = [
                'user_id' => $user_id
            ];

            $user['cargos'] = $this->db->row($sql, $params);

            $sql = "SELECT cars.*, car_images.* FROM cars JOIN car_images ON cars.car_id = car_images.car_id WHERE car_images.preview = :preview AND cars.user_id = :user_id ORDER BY cars.car_id DESC";

            $params = [
                'preview' => 'Yes',
                'user_id' => $user_id
            ];

            $user['cars'] = $this->db->row($sql, $params);

            $sql = "SELECT reviews.*, users.user_name, users.middle_name, users.last_name, users.type, users.image
            FROM reviews
            LEFT JOIN users ON users.id_user = reviews.sender_id 
            WHERE recipient_id = :user_id";

            $params = [
                'user_id' => $user_id
            ];

            $user['reviews'] = $this->db->row($sql, $params);

            $sql = "SELECT comment.*, users.user_name, users.middle_name, users.last_name, users.type, users.image
            FROM comment
            LEFT JOIN users ON users.id_user = comment.user_id 
            WHERE comment.user_id = :user_id";

            $params = [
                'user_id' => $user_id
            ];

            foreach($this->db->row($sql, $params) as $comment) {
                $user['comment'] = $comment;
            }

            return $user;
        }
    }

    public function createComment($comment, $user_id) {
        $sql = "SELECT * FROM comment WHERE user_id = :user_id";

        $params = [
            'user_id' => $user_id
        ];

        if(empty($this->db->row($sql, $params))) {
            $sql = "INSERT INTO `comment` (`description`, `rating`, `user_id`)
            VALUES (:description, :rating, :user_id)";

            $params = [
                'description' => $comment['review'],
                'rating' => $comment['rating'],
                'user_id' => $user_id
            ];

            $this->db->query($sql, $params);
        } else {
            $sql = "UPDATE `comment` SET `description` = :description, `rating` = :rating WHERE `comment`.`user_id` = :user_id";

            $params = [
                'description' => $comment['review'],
                'rating' => $comment['rating'],
                'user_id' => $user_id
            ];

            $this->db->query($sql, $params);
        }
    }

    public function updateUser($data, $user_id) {
        $sql = "UPDATE `users`
        SET `user_name` = :user_name, `middle_name` = :middle_name, `last_name` = :last_name, `region` = :region, `city` = :city, `phone` = :phone, `email` = :email
        WHERE `users`.`id_user` = :user_id";

        $params = [
            'user_name' => $data['user_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'region' => $data['region'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'user_id' => $user_id
        ];

        $this->db->query($sql, $params);
    }

    public function deleteImage($user_id) {
        $sql = "SELECT image FROM users WHERE id_user = :user_id";

        $params = [
            'user_id' => $user_id
        ];

        $image = $this->db->column($sql, $params);

        $root_directory = $_SERVER['DOCUMENT_ROOT'];
        $upload_directory = $root_directory . 'public/user_image/';
        $file_unlink = $upload_directory . $image;
        unlink($file_unlink);

        $sql = "UPDATE `users` SET `image` = :image WHERE `users`.`id_user` = :user_id";

        $params = [
            'image' => 'default.jpg',
            'user_id' => $user_id
        ];

        return $this->db->query($sql,$params);

    }

    public function updateImageSetting($files, $user_id) {
        if(!empty($files)) {
            foreach ($files as $file) {
                $tmpName = $file['tmp_name'];
                $name = $file['name'];

                $root_directory = $_SERVER['DOCUMENT_ROOT'];
                $upload_directory = $root_directory . 'public/user_image/';
                $file_destination = $upload_directory . $name;

                $sql = "SELECT image FROM users WHERE id_user = :user_id";

                $params = [
                    'user_id' => $user_id
                ];

                $image = $this->db->column($sql,$params);

                $file_unlink = $upload_directory . $image;

                if($image != 'default.jpg') {
                    unlink($file_unlink);
                }
    
                $sql = "UPDATE `users` SET `image` = :image WHERE `users`.`id_user` = :user_id";

                $params = [
                    'image' => $file['name'],
                    'user_id' => $user_id
                ];

                $this->db->query($sql,$params);
        
                move_uploaded_file($tmpName, $file_destination);
            }
        } 
    }

    public function updatePassword($data, $user_id) {
        $sql = "UPDATE users SET password = :new_password WHERE login = :login AND id_user = :user_id";

        $new_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $params = [
            'login' => $data['login'],
            'user_id' => $user_id,
            'new_password' => $new_password
        ];

        $this->db->query($sql, $params);
    
    }

    public function updateLogin($data, $user_id) {
        $sql = "UPDATE users SET login = :login WHERE id_user = :user_id";

        $params = [
            'login' => $data['new_login'],
            'user_id' => $user_id
        ];

        $this->db->query($sql, $params);
    }

    public function deleteCargo($cargo_id) {
        $sql = "DELETE FROM cargos WHERE `cargos`.`cargo_id` = :cargo_id";

        $params = [
            'cargo_id' => $cargo_id
        ];

        $this->db->query($sql, $params);
    }

    public function deleteCar($car_id) {
        $sql = "DELETE FROM car_images WHERE `car_images`.`car_id` = :car_id";

        $params = [
            'car_id' => $car_id
        ];

        $this->db->query($sql, $params);

        $sql = "DELETE FROM cars WHERE `cars`.`car_id` = :car_id";

        $params = [
            'car_id' => $car_id
        ];

        $this->db->query($sql, $params);
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