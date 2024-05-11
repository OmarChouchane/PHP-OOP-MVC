<?php

if(isset($_POST['register-submit'])) {

    // Grabbing the data from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Instantiate RegisterContr class
    include "../classes/register.classes.php";
    include "../classes/register-contr.classes.php";
    $register = new RegisterContr($username, $password);

    // Running error handlers and user register

    // Going back to front page

}

?>