<?php
    session_start();
    include('dbcon.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    function send_password_reset($get_name,$get_email,$token)
    {
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $mail->isSMTP(); 
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->Username   = "dummyforphp26@gmail.com";                     //SMTP username
        $mail->Password   = "Iamraju98@00";                               //SMTP password
        $mail->SMTPSecure = "tls";         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        //Recipients
        $mail->setFrom("dummyforphp26@gmail.com", $get_name);
        $mail->addAddress($get_email);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Reset Password Notify";
        $email_template="
                    <h2>Hello</h2>
                    <h3>You are receiving this email because we have received a password reset request for you account</h3>
                    <br/>
                    <h3>Note!! This is a one time generated link to be used.</h3>
                    <br/>
                    <a href='http://localhost/PHP/project/project1/adminpassword_change.php?token=$token&email=$get_email'>Click Me</a>";
        
                
        $mail->Body    = $email_template;
        $mail->send();
        //echo 'Message has been sent';
    }


    if(isset($_POST['adminpassword_reset_link']))
    {
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $token=md5(rand());
        $check_email= "SELECT * FROM administrator WHERE email='$email' ";
        $check_email_run=mysqli_query($con,$check_email);
        $check_email_count=mysqli_num_rows($check_email_run);
        if($check_email_count>0)
        {
            $row=mysqli_fetch_array($check_email_run);
            $get_name=$row['name'];
            $get_email=$row['email'];
            $update_token="UPDATE administrator SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
            $update_token_run=mysqli_query($con,$update_token);
            if ($update_token_run) {
                # code...
                send_password_reset($get_name,$get_email,$token);
                $_SESSION['status']="We emailed you a password link";
                header("Location: adminpassword-reset.php");
                exit(0);

            } else {
                # code...
                $_SESSION['status']="Something went wrong";
                header("Location: adminpassword-reset.php");
                exit(0);
            }
            
        }
        else{
            $_SESSION['status']="No email found";
            header("Location: adminpassword-reset.php");
            exit(0);
        }
    
    
    }


    
    if(isset($_POST['adminpassword_update']))
    {
    
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $npwd=mysqli_real_escape_string($con,$_POST['new_password']);

        $cpwd=mysqli_real_escape_string($con,$_POST['confirm_password']);
        $token=mysqli_real_escape_string($con,$_POST['password_token']);
        if(!empty($token))
        {
            if(!empty($email)&& !empty($npwd)&&!empty($cpwd))
            {
                $check_token="SELECT verify_token FROM administrator WHERE verify_token='$token' LIMIT 1";
                $check_token_run=mysqli_query($con,$check_token);
                $check_token_count=mysqli_num_rows($check_token_run);
                if($check_token_count>0)
                {
                    if($npwd==$cpwd)
                    {
                        $update_password="UPDATE administrator SET password='$npwd' WHERE verify_token='$token' LIMIT 1";
                        $update_password_run=mysqli_query($con,$update_password);
                        if($update_password_run)
                        {
                            $new_token=md5(rand());
                            $update_to_new_token="UPDATE administrator SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                            $update_to_new_token_run=mysqli_query($con,$update_to_new_token);
                            $_SESSION['status']="New Password Update Successful!!";
                            header("Location: adminlogin.php");
                            exit(0);

                        }
                        else{
                            $_SESSION['status']="Didnot update password something went wrong";
                            header("Location: adminpassword-change.php?token=$token&email=$email");
                            exit(0);
                        }
                    }
                    else{
                        $_SESSION['status']="Password & Confirm Password donot match ";
                        header("Location: adminpassword-change.php?token=$token&email=$email");
                        exit(0);
                    }

                }
                else
                {
                    $_SESSION['status']="Invalid token ";
                    header("Location: adminpassword-change.php?token=$token&email=$email");
                    exit(0);
                }
            }
        }
        else{
            $_SESSION['status']="No token available";
            header("Location: adminpassword-change.php");
            exit(0);
        }
        

        
    
    
    }    



?>        