<?php

class RegisterContr extends Register{

    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function registerUser() {
        if ($this->emptyInput() === false) {
            header("location:../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUsername() === false) {
            header("location:../index.php?error=invalidusername");
            exit();
        }
        if ($this->invalidEmail() === false) {
            header("location:../index.php?error=invalidemail");
            exit();
        }
        if ($this->invalidPassword() === false) {
            header("location:../index.php?error=invalidpassword");
            exit();
        }
        if ($this->existingUser() === false) {
            header("location:../index.php?error=existinguser");
            exit();
        }
        $this->setUser($this->username, $this->email, $this->password);
    }

    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidPassword() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function existingUser() {
        $result;
        if($this->checkUser($this->username, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}

?>