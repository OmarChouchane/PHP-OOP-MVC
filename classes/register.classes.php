<?php

class Register extends Dbh {

    protected function setUser ($username,$email,$password) {
        $stmt = $this->connect()->prepare("INSERT INTO users (users_username, users_email, users_password) VALUES (?,?,?)");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if ($stmt->execute(arra($username,$email,$hashedPwd))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser ($username,$email) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR email = ?");

        if ($stmt->execute(arra($username,$email))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = true;
        }
        else {
            $resultCheck = false;
        }
        
        return $resultCheck;
    }
    

}

?>