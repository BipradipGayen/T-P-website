<?php
    session_start();
    unset($_SESSION['authenticated_admin']);
    unset($_SESSION['auth_user']);
    $_SESSION['status']= "You Logged Out Successfully";
    header("Location:adminlogin.php");
?>