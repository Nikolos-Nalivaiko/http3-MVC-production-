<?php

namespace application\models;
use application\core\Model;

class Car extends Model {

    public function validationForm($data) {
        $rules = [
            'brand' => ['required'],
            'model' => ['required'],
            'engine_capacity' => ['required'],
            'wheel_mode' => ['required'],
            'power' => ['required'],
            'gearbox' => ['required'],
            'body' => ['required'],
            'engine_type' => ['required'],
            'load_capacity' => ['required'],
            'price' => ['required'],
            'region' => ['required'],
            'city' => ['required'],
            'year' => ['required'],
            'mileage' => ['required'],
            'description' => [$this->validation->setRegexDescript()],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;
    }

    public function createCar($data, $user_id) {
        $sql = "INSERT INTO `cars` (`brand`, `model`, `engine_capacity`, `wheel_mode`, `power`, `gearbox`, `body`, `engine_type`, `load_capacity`, `price`, `region`, `city`, `year`, `mileage`, `description`, `user_id`)
        VALUES (:brand, :model, :engine_capacity, :wheel_mode, :power, :gearbox, :body, :engine_type, :load_capacity, :price, :region, :city, :year, :mileage, :description, :user_id)";

        $params = [
            'brand' => $data['brand'],
            'model' => $data['model'],
            'engine_capacity' => $data['engine_capacity'],
            'wheel_mode' => $data['wheel_mode'],
            'power' => $data['power'],
            'gearbox' => $data['gearbox'],
            'body' => $data['body'],
            'engine_type' => $data['engine_type'],
            'load_capacity' => $data['load_capacity'],
            'price' => $data['price'],
            'region' => $data['region'],
            'city' => $data['city'],
            'year' => $data['year'],
            'mileage' => $data['mileage'],
            'description' => $data['description'],
            'user_id' => $user_id,
        ];

        $cargo = $this->db->query($sql, $params);

        return $cargo['id']; 
    }

    public function updateCar($data, $car_id) {
        $sql = "UPDATE `cars` SET `brand` = :brand, `model` = :model, `engine_capacity` = :engine_capacity, `wheel_mode` = :wheel_mode, `power` = :power, `gearbox` = :gearbox, `body` = :body, `engine_type` = :engine_type, `load_capacity` = :load_capacity, `price` = :price, `region` = :region, `city` = :city, `year` = :year, `mileage` = :mileage, `description` = :description
        WHERE `cars`.`car_id` = :car_id";

        $params = [
            'brand' => $data['brand'],
            'model' => $data['model'],
            'engine_capacity' => $data['engine_capacity'],
            'wheel_mode' => $data['wheel_mode'],
            'power' => $data['power'],
            'gearbox' => $data['gearbox'],
            'body' => $data['body'],
            'engine_type' => $data['engine_type'],
            'load_capacity' => $data['load_capacity'],
            'price' => $data['price'],
            'region' => $data['region'],
            'city' => $data['city'],
            'year' => $data['year'],
            'mileage' => $data['mileage'],
            'description' => $data['description'],
            'car_id' => $car_id
        ];

        $this->db->query($sql, $params);
    }

    public function generateYears() {
        $currentYear = date("Y");
        $startYear = 1980;
        $years = range($currentYear, $startYear);
    
        return $years;        
    }

    public function getBrands() {
        $sql = "SELECT brand_name FROM brands";
        foreach($this->db->row($sql) as $value) {
            $brands[] = $value['brand_name'];
        }

        return $brands;
    }

    public function getModels($brand) {
        $sql = "SELECT brand_id FROM brands WHERE brand_name = :brand_name";

        $params = [
            'brand_name' => $brand
        ];

        $brand_id = $this->db->column($sql, $params);

        $sql = "SELECT `model_name` FROM models WHERE brand_id = :brand_id";

        $params = [
            'brand_id' => $brand_id
        ];

        foreach($this->db->row($sql, $params) as $value) {
            $models[] = $value['model_name'];
        }

        return $models;
    }

    public function setQr($car_id, $qr_code) {
        $sql = "UPDATE `cars` SET `qr_car` = :qr_code WHERE `car_id` = :car_id";

        $params = [
            'qr_code' => $qr_code,
            'car_id' => $car_id
        ];  

        $this->db->query($sql, $params);
    }

    private function setImages($image_name,$image_preview, $car_id) {
            $sql = "INSERT INTO `car_images` (`image_name`, `preview`, `car_id`) VALUES (:name, :preview, :car_id)";

            $params = [
                'name' => $image_name,
                'preview' => $image_preview,
                'car_id' => $car_id 
            ];

            $this->db->query($sql, $params);
    }

    public function uploadImage($files, $carID) {
        if(!empty($files)) {
            foreach ($files as $file) {
                $tmpName = $file['tmp_name'];
                $name = $file['name'];
                $preview = $file['preview'];
    
                $this->setImages($name, $preview, $carID);
                
                $root_directory = $_SERVER['DOCUMENT_ROOT'];
                $upload_directory = $root_directory . 'public/car_images/';
                $file_destination = $upload_directory . $name;
        
                move_uploaded_file($tmpName, $file_destination);
            }
        } else {
            $this->setImages('default.jpg', 'Yes', $carID);
        }
    }

    public function uploadUpdateImage($files, $carID) {
        if(!empty($files)) {
            foreach ($files as $file) {
                $tmpName = $file['tmp_name'];
                $name = $file['name'];
                $preview = $file['preview'];
    
                $this->setImages($name, $preview, $carID);
                
                $root_directory = $_SERVER['DOCUMENT_ROOT'];
                $upload_directory = $root_directory . 'public/car_images/';
                $file_destination = $upload_directory . $name;
        
                move_uploaded_file($tmpName, $file_destination);
            }
        } 
    }

    public function updateImages($images, $car_id) {
        foreach($images as $image) {
            if($image['preview'] == "Yes") {
                $sql = "SELECT image_name FROM car_images WHERE preview = :preview AND car_id = :car_id";

                $params = [
                    'preview' => 'Yes',
                    'car_id' => $car_id,
                ];

                $image_name = $this->db->column($sql, $params);

                $sql = "UPDATE `car_images` SET `preview` = :preview WHERE `car_images`.`car_id` = :car_id AND `image_name` = :image_name";

                $params = [
                    'preview' => 'No',
                    'car_id' => $car_id,
                    'image_name' => $image_name
                ];

                $this->db->query($sql, $params);

                $sql = "UPDATE `car_images` SET `preview` = :preview WHERE `car_images`.`car_id` = :car_id AND `image_name` = :image_name";

                $params = [
                    'preview' => 'Yes',
                    'car_id' => $car_id,
                    'image_name' => $image['url']
                ];

                $this->db->query($sql, $params);
            }
        }
    }

    public function deleteImage($images, $car_id) {
        foreach($images as $image) {
            $sql = "DELETE FROM `car_images` WHERE `image_name` = :image_name AND `car_id` = :car_id";

            $params = [
                'image_name' => $image,
                'car_id' => $car_id
            ];

            $this->db->query($sql, $params);
        }
    }

    public function getItems($page, $itemsPage, $request, $params) {

        $offset = ($page - 1) * $itemsPage;

        $sql = $request." ORDER BY cars.car_id DESC LIMIT $offset, $itemsPage";

        $data_cars = $this->db->row($sql, $params);

        if(!empty($data_cars)) {
            foreach($data_cars as $car) {
                $sql = "SELECT `premium_status` FROM `users` WHERE id_user=:id_user";
    
                $params = [
                    'id_user' => $car['user_id']
                ];
    
                $car['status'] = $this->db->column($sql, $params);
                $cars[] = $car;
            }
        } else {
            $cars = null;
        }

        return ['cars' => $cars];
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

        $sql = "SELECT cars.car_id AS car_id_cars, car_images.car_id AS car_id_images, cars.*, car_images.* FROM cars JOIN car_images ON cars.car_id = car_images.car_id WHERE car_images.preview = 'Yes' AND ".implode(' AND ', $conditions)." ORDER BY cars.car_id DESC LIMIT $itemsPage";
        $request = "SELECT cars.car_id AS car_id_cars, car_images.car_id AS car_id_images, cars.*, car_images.* FROM cars JOIN car_images ON cars.car_id = car_images.car_id WHERE car_images.preview = 'Yes' AND ".implode(' AND ', $conditions);

        $request_count = 'SELECT COUNT(*) FROM cars WHERE ' . implode(' AND ', $conditions);
        $cars = $this->db->row($sql, $params);

        $filters = [
            'request' => $request,
            'params' => $params,
            'request_count' => $request_count
        ];

        return ['cars' => $cars,'request' => $filters];
    }

    public function getCar($car_id) {
        $sql = "SELECT cars.*, users.user_name, users.middle_name, users.last_name, users.phone, users.premium_status, users.type, users.image 
        FROM cars 
        JOIN users ON users.id_user = cars.user_id
        WHERE car_id = :car_id";

        $params = [
            'car_id' => $car_id
        ];

        $car_data = $this->db->row($sql, $params);

        if(!empty($car_data)) {
            foreach($car_data as $car) {
                $user_id = $car['user_id'];

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
        
                    $car['reviews'] = $reviews;
                    $car['average_rating'] = round(array_sum($average_rating) / count($average_rating), 1);
                } else {
                    $car['reviews'] = null;
                    $car['average_rating'] = "-";
                }

                $sql = "SELECT image_name
                FROM car_images
                WHERE car_id = :car_id";

                $params = [
                    'car_id' => $car_id
                ];

                $data = $this->db->row($sql, $params);

                foreach($data as $image) {
                    $image_name[] = $image['image_name'];
                }

                $car['images'] = $image_name;

            }
        } else {
            $car = null;
        }
        return $car;
    }
}