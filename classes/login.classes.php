<?php

class Login extends Dbh {

    protected function getUser ($username, $password) {
        $stmt = $this->connect()->prepare("SELECT users_password FROM users WHERE users_username = ? OR users_email = ?"); 

        if (!$stmt->execute([$username,$username])) 
        {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: ../index.php?error=esernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]['users_password']);

        if ($checkPwd === false) 
        {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif ($checkPwd === true) {
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_username = ? OR users_email = ? AND users_password = ?"); 

            if (!$stmt->execute([$username,$username,$password])) 
            {
                $stmt = null;
                header("location:../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) 
            {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['user_id'] = $user[0]['users_id'];
            $_SESSION['user_username'] = $user[0]['users_username'];
            $_SESSION['user_email'] = $user[0]['users_email'];
        }


        $stmt = null;
    }
    

}

?>