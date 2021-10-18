<?php
    session_start();
    include('dbcon.php');
    if(isset($_POST['login_now_btn']))
    {
        $email=mysqli_real_escape_string($con,$_POST['email']) ;
        $pswd=md5(mysqli_real_escape_string($con,$_POST['pswd'])) ;
        $login_query="SELECT * FROM student WHERE email='$email' AND password='$pswd' LIMIT 1";
        $login_query_run=mysqli_query($con,$login_query);
        $logincount=mysqli_num_rows($login_query_run);
        if($logincount>0)
        {
            $row=mysqli_fetch_array($login_query_run);
           
            if($row['verify_status']=="1")
            {
                $_SESSION['authenticated']=TRUE;
                $_SESSION['auth_user']=[
                    'rlno'=>$row['rl_no']
                    // 'email'=>$row['email'],
                    // 'phn'=>$row['phn']
                    
                ];
                $_SESSION['status']="You are Logged In Successfully";
                header("Location: dashboard.php");
                exit(0);
            }
            else{
                $_SESSION['status']="Please verify your email address to Login";
                header("Location: login.php");
                exit(0);
            }
        }
        else{
            $_SESSION['status']="Invalid email or password";
            header("Location: login.php");
            exit(0);
        }
        

    }
    else{
        $_SESSION['status']="Invalid Login";
        header("Location: login.php");
        exit(0);
    }

?>