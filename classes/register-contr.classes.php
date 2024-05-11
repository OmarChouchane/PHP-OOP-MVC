<?php

class RegisterContr {

    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        $this->$username = $username;
        $this->$email = $email;
        $this->$password = $password;
    }

    private function emptyInput() {
        $result;
        if(empty($this->$username) || empty($this->$password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->$username)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->$email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidPassword() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->$password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}

?>