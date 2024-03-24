<?php

namespace application\models;
use application\core\Model;

class User extends Model {

    public function getUser($user_id, $current_user_id) {
        $sql = "SELECT user_name, middle_name, last_name, type, region, city, phone, image, premium_status
        FROM users
        WHERE id_user = :user_id";

        $params = [
            'user_id' => $user_id
        ];

        $user_data = $this->db->row($sql, $params);
        if(!empty($user_data)) {
            foreach($user_data as $user) {

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

                $user['reviews'] = $reviews;
                $user['average_rating'] = round(array_sum($average_rating) / count($average_rating), 1);

                $sql = "SELECT * 
                FROM cargos 
                WHERE user_id = :user_id 
                ORDER BY cargo_id DESC";

                $params = [
                    'user_id' => $user_id
                ];

                $cargos = $this->db->row($sql, $params);

                $user['cargos'] = $cargos;

                $sql = "SELECT cars.car_id AS car_id_cars, car_images.car_id AS car_id_images, cars.*, car_images.* 
                FROM cars JOIN car_images ON cars.car_id = car_images.car_id 
                WHERE car_images.preview = :preview AND cars.user_id = :user_id
                ORDER BY cars.car_id DESC";

                $params = [
                    'preview' => 'Yes',
                    'user_id' => $user_id
                ];

                $cars = $this->db->row($sql, $params);
                $user['cars'] = $cars;

                $sql = "SELECT reviews.*, users.user_name, users.middle_name, users.last_name, users.type, users.image 
                FROM reviews
                LEFT JOIN users ON users.id_user = reviews.sender_id 
                WHERE sender_id = :current_user_id AND recipient_id = :user_id";

                $params = [
                    'user_id' => $user_id,
                    'current_user_id' => $current_user_id,
                ];

                $current_review = $this->db->row($sql, $params);
                $user['current_reviews'] = $current_review;
            }
        }

        return $user;
    }

    public function validationForm($data) {
        $rules = [
            'review' => ['required', $this->validation->setRegexDescript()],
            'rating' => ['required'],
        ];

        $validation = $this->validation->validator->make($data, $rules);

        $this->validation->setAliases($validation);
        $this->validation->setMessages($validation);

        return (!empty($errors = $this->validation->errors($validation))) ? $errors : null;
    }

    public function createReview($user_id, $current_user_id, $rating, $description) {
        $sql = "SELECT reviews.*, users.user_name, users.middle_name, users.last_name, users.type, users.image 
        FROM reviews
        LEFT JOIN users ON users.id_user = reviews.sender_id 
        WHERE sender_id = :current_user_id AND recipient_id = :user_id";

        $params = [
            'user_id' => $user_id,
            'current_user_id' => $current_user_id,
        ];

        if(empty($this->db->row($sql, $params))) {

            $sql = "INSERT INTO `reviews`
            (`recipient_id`, `sender_id`, `description`, `rating`)
            VALUES
            (:user_id, :current_user_id, :description, :rating)";

            $params = [
                'user_id' => $user_id,
                'current_user_id' => $current_user_id,
                'description' => $description,
                'rating' => $rating
            ];

            $this->db->query($sql, $params);
        } else {

            $sql = "UPDATE `reviews`
            SET `description` = :description, `rating` = :rating
            WHERE `sender_id` = :current_user_id AND `recipient_id` = :user_id";

            $params = [
                'description' => $description,
                'rating' => $rating,
                'current_user_id' => $current_user_id,
                'user_id' => $user_id,
            ];

            $this->db->query($sql, $params);
        }
    }

}