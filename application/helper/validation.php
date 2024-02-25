<?php

namespace application\helper;
use Rakit\Validation\Validator;

class Validation {

    public $validator;

    public function __construct() {
        $this->validator = new Validator;
    }

    public function errors($validation) {
        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $message = $errors->all();
            $message = $message[0];
        } else {
            $message = null;
        }
        return $message;
    }

    public function setAliases($validation) {

        $validation->setAliases([
            'login' => 'Логін',
            'password' => 'Пароль',
            'confirm' => 'Підтвердження паролю',
            'user_name' => "І'мя",
            'middle_name' => 'По-батькові',
            'last_name' => 'Прізвище',
            'region' => 'Область',
            'city' => 'Місто',
        ]);
    }

    public function setMessages($validation) {
        $validation->setMessages([
            'required' => ':attribute - поле повинно бути заповнено',
            'regex' => ':attribute - поле має невірний формат',
            'confirm:same' => ':attribute - не відповідає паролю',
            'email' => ':attribute - невірний формат пошти',
            'min' => ':attribute - недостатньо символів',
            'max' => ':attribute - велика кількість символів',
        ]);
    }

    public function setRegexData() {
        $regex = 'regex:/^[a-zA-Z0-9а-яА-ЯЁёҐґЄєІіЇї]*$/u';
        return $regex;
    }

    public function setRegexDescript() {
        $regex = 'regex:/^[a-zA-Z0-9а-яА-ЯЁёҐґЄєІіЇї\s"#,.]*$/u';
        return $regex;
    }

}