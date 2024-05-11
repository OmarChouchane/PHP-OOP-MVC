<?php
if(isset($_POST['register-submit'])) {
    echo"yes";
    
    // Grabbing the data from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Instantiate RegisterContr class
    include "../classes/dbh.classes.php";
    include "../classes/register.classes.php";
    include "../classes/register-contr.classes.php";
    $register = new RegisterContr($username, $email, $password);

    // Running error handlers and user register
    $register->registerUser();

    // Going back to front page
    header("location: ../index.php?error=none");

}

?>