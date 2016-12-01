<?php
    session_start();
    extract($_POST);
    $_SESSION["pass"] = $password;
    $_SESSION["email"] = $email;
    $incorrectLogin = "<p>Login info is incorrect. Enter a@a.a for email and aaa for password.</p>";
    
    if ($email == "a@a.a" && $password == "aaa") {
        header("Location:index.php");
        die();
    } else { 
        header("Location:login.php?msg=$incorrectLogin");
        die();
    }
?>