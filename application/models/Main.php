<?php

namespace application\models;
use application\core\Model;

class Main extends Model {
    public function getReviews() {
        $sql = "SELECT users.user_name, users.middle_name, users.image, users.last_name, users.type, comment.*
        FROM comment
        JOIN users ON users.id_user = comment.user_id";

        return $this->db->row($sql);
    }
}