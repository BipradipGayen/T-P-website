<?php
    session_start();
    if(!isset($_SESSION['authenticated_admin']))
    {
        $_SESSION['status']="Please Login to access User Dashboard...";
        
        header("Location:adminlogin.php");
        exit(0);
    }

?>
