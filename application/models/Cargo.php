<?php

namespace application\models;
use application\core\Model;

class Cargo extends Model {

    public function validationForm($data) {

        $rules = [
            'cargo_name' => ['required', $this->validation->setRegexDescript(), 'min: 2'],
            'weight' => ['required', 'numeric'],
            'load_region' => ['required'],
            'load_city' => ['required'],
            'unload_region' => ['required'],
            'unload_city' => ['required'],
            'body' => ['required'],
            'price' => ['required'],
            'pay_method' => ['required'],
            'distance' => ['required'],
            'description' => [$this->validation->setRegexDescript()],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;

    }

    public function createCargo($data, $user_id) {
        $sql = "INSERT INTO `cargos` (`cargo_name`, `weight`, `load_region`, `load_city`, `unload_region`, `unload_city`, `load_date`, `unload_date`, `body`, `price`, `pay_method`, `distance`, `description`, `urgent`, `user_id`)
         VALUES (:cargo_name, :weight, :load_region, :load_city, :unload_region, :unload_city, :load_date, :unload_date, :body, :price, :pay_method, :distance, :description, :urgent, :user_id)";

        $urgent = isset($data['urgent']) ? "Yes" : "No";

        $params = [
            'cargo_name' => $data['cargo_name'],
            'weight' => $data['weight'],
            'load_region' => $data['load_region'],
            'load_city' => $data['load_city'],
            'unload_region' => $data['unload_region'],
            'unload_city' => $data['unload_city'],
            'load_date' => $data['load_date'],
            'unload_date' => $data['unload_date'],
            'body' => $data['body'],
            'price' => $data['price'],
            'pay_method' => $data['pay_method'],
            'distance' => $data['distance'],
            'description' => $data['description'],
            'urgent' => $urgent,
            'user_id' => $user_id
        ];

        $cargo = $this->db->query($sql, $params);

        return $cargo['id'];

    }

    public function getCargo($cargo_id) {

        $sql = "SELECT cargos.*, users.user_name, users.middle_name, users.last_name, users.phone, users.premium_status, users.type, users.image
        FROM cargos
        LEFT JOIN users ON users.id_user = cargos.user_id
        WHERE cargo_id = :cargo_id";

        $params = [
            'cargo_id' => $cargo_id
        ];

        $cargo_data = $this->db->row($sql, $params);

        if(!empty($cargo_data))  {
            foreach($cargo_data as $cargo) {

                $user_id = $cargo['user_id'];
                $sql = "SELECT reviews.*, users.user_name, users.middle_name, users.last_name, users.type, users.image 
                FROM reviews
                LEFT JOIN users ON users.id_user = reviews.sender_id 
                WHERE recipient_id = :user_id";

                $params = [
                    'user_id' => $user_id
                ];

                $data = $this->db->row($sql, $params);

                foreach($data as $review) {
                    $average_rating[] = $review['rating'];
                    $reviews[] = $review;
                }

                $cargo['reviews'] = $reviews;
                $cargo['average_rating'] = array_sum($average_rating) / count($average_rating);
            }
        } else {
            $cargo = null;
        }

        return $cargo;
    }

    public function setQr($cargo_id, $qr_code) {
        $sql = "UPDATE `cargos` SET `qr_cargo` = :qr_code WHERE `cargo_id` = :cargo_id";

        $params = [
            'qr_code' => $qr_code,
            'cargo_id' => $cargo_id
        ];  

        $this->db->query($sql, $params);
    }

    public function getItems($page, $itemsPage, $request, $params) {

        $offset = ($page - 1) * $itemsPage;

        $sql = $request." ORDER BY cargo_id DESC LIMIT $offset, $itemsPage";

        $data_cargos = $this->db->row($sql, $params);

        if(!empty($data_cargos)) {
            foreach($data_cargos as $cargo) {
                $sql = "SELECT `premium_status` FROM `users` WHERE id_user=:id_user";
    
                $params = [
                    'id_user' => $cargo['user_id']
                ];
    
                $cargo['status'] = $this->db->column($sql, $params);
                $cargos[] = $cargo;
            }
        } else {
            $cargos = null;
        }

        return ['cargos' => $cargos];
    }

    public function getTotalPages($itemsPage, $request, $params) {
        $sql = $request;

        $totalItems = $this->db->column($sql, $params);

        $totalPages = ceil($totalItems / $itemsPage);

        return $totalPages;

    }

    public function filterSearch($data, $itemsPage, $page) {
        $params = [];
        $conditions = [];

        $page = $page;
        $itemsPage = $itemsPage;
        $offset = ($page - 1) * $itemsPage;

        foreach ($data as $key => $value) {
            if(!empty($value)) {
                if (strpos($key, '_from') !== false) {
                    $fieldName = str_replace('_from', '', $key);
                    $conditions[] = "$fieldName >= :$key";
                    $params[$key] = $value;
                } elseif (strpos($key, '_to') !== false) {
                    $fieldName = str_replace('_to', '', $key);
                    $conditions[] = "$fieldName <= :$key";
                    $params[$key] = $value;
                } else {
                    $conditions[] = "$key = :$key";
                    $params[$key] = $value;
                }
            }
        }

        $sql = 'SELECT * FROM cargos WHERE ' . implode(' AND ', $conditions) .' ORDER BY cargo_id DESC LIMIT ' .$offset.', '. $itemsPage;
        $request = 'SELECT * FROM cargos WHERE ' . implode(' AND ', $conditions);

        $request_count = 'SELECT COUNT(*) FROM cargos WHERE ' . implode(' AND ', $conditions);
        $cargos = $this->db->row($sql, $params);

        $filters = [
            'request' => $request,
            'params' => $params,
            'request_count' => $request_count
        ];

        return ['cargos' => $cargos, 'request' => $filters];
    }

    public function updateCargo($data, $cargo_id) {
        $sql = "UPDATE `cargos` SET `cargo_name` = :cargo_name, `weight` = :weight, `load_region` = :load_region, `load_city` = :load_city, `unload_region` = :unload_region, `unload_city` = :unload_city, `load_date` = :load_date, `unload_date` = :unload_date, `body` = :body, `price` = :price, `pay_method` = :pay_method, `distance` = :distance, `description` = :description, `urgent` = :urgent
        WHERE `cargos`.`cargo_id` = :cargo_id";

        $urgent = isset($data['urgent']) ? "Yes" : "No";

        $params = [
            'cargo_name' => $data['cargo_name'],
            'weight' => $data['weight'],
            'load_region' => $data['load_region'],
            'load_city' => $data['load_city'],
            'unload_region' => $data['unload_region'],
            'unload_city' => $data['unload_city'],
            'load_date' => $data['load_date'],
            'unload_date' => $data['unload_date'],
            'body' => $data['body'],
            'price' => $data['price'],
            'pay_method' => $data['pay_method'],
            'distance' => $data['distance'],
            'description' => $data['description'],
            'urgent' => $urgent,
            'cargo_id' => $cargo_id
        ];

        $this->db->query($sql, $params);
    }

}