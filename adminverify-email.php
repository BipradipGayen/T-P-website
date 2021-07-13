<?php 
session_start();
include('dbcon.php');
    if (isset($_GET['token'])) {
        # code...
        $token=$_GET['token'];
        $verify_query="SELECT  verify_token,verify_status FROM administrator WHERE verify_token='$token' ";
        $verify_query_run=mysqli_query($con,$verify_query);
        $count=mysqli_num_rows($verify_query_run);
        if($count>0)
        {
            $row=mysqli_fetch_array($verify_query_run);
            if($row['verify_status']=="0")
            {
                $clicked_token=$row['verify_token'];
                $update_query="UPDATE administrator SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
                $update_query_run=mysqli_query($con,$update_query);
               
                if ($update_query_run) {
                    # code...
                    $_SESSION['status']="Your Account has been verified Successfully";
                    header("Location:adminlogin.php");
                    exit(0);
                } else {
                    # code...
                    $_SESSION['status']="Verification Failed";
                    header("Location:adminlogin.php");
                    exit(0);
                }
                
            }
            else{
                $_SESSION['status']="Email already verified.Please Login";
                header("Location:adminlogin.php");
                exit(0);
            }

        }
        else{
            $_SESSION['status']="This token doesn't exist";
            header("Location:adminlogin.php");
        }
    } else {
        # code...
        $_SESSION['status']="Not Allowed";
        header("Location:adminlogin.php");
    }
    
?>