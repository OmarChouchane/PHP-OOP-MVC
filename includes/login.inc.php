<?php
if(isset($_POST['login-submit'])) {
    // Grabbing the data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate RegisterContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new loginContr($username, $password);

    // Running error handlers and user login
    $login->loginUser();

    // Going back to front page
    header("location: ../index.php?error=none");

}else {
    header("location: ../index.php?error=noentry");
    exit();
}

?>