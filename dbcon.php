<?php
    $server="localhost";
    $username="root";
    $password="";
    $dbname="t&p management system";
    $con=mysqli_connect($server,$username,$password,$dbname);
    if($con == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    
?>