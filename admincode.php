<?php
    session_start();
    include('dbcon.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function sendemail_verify($name,$email,$verify_token)
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
        $mail->setFrom("dummyforphp26@gmail.com", $name);
        $mail->addAddress($email);     //Add a recipient
         //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Email verification from IT T&P";
        $email_template="
                    <h2>You have Registered as an Administrator with IT Training and Placement</h2>
                    <h4>Verify with the email address to login with the below given link</h4>
                    <br/><br/>
                    <a href='http://localhost/PHP/project/project1/adminverify-email.php?token=$verify_token'>Click Me</a>";
        
                   
        $mail->Body    = $email_template;
        $mail->send();
        //echo 'Message has been sent';
    }

    if(isset($_POST['adminregister_btn']))
    {
        $name=$_POST['name'];
       
        $email=$_POST['email'];
        $phon=$_POST['phon'];
        
        $pswd=md5($_POST['pswd']);
        $verify_token=md5(rand());//function to produce random number and alphabets
        


        $check_email_query= "SELECT * FROM administrator WHERE email='$email' ";
        $check_email_query_run=mysqli_query($con,$check_email_query);
        $emailcount=mysqli_num_rows($check_email_query_run);
     
            if($emailcount>0)
            {
                $_SESSION['status']="Email id already Exists";
                header("Location: adminregister.php");
            }
            else{
                //insert user  or registered users data
                $query="INSERT INTO `administrator`(`name`, `email`, `phn`, `password`, `verify_token`) VALUES  ('$name','$email','$phon','$pswd','$verify_token')";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                    {
                        sendemail_verify("$name","$email","$verify_token");
                        $_SESSION['status']="Registration Successfull..!Please verify your email address";
                        header("Location: adminregister.php");
                    }
                    else{
                        $_SESSION['status']="Registration Failed ";
                        header("Location: adminregister.php");
                    }
                
                
            }
       

        
    }


    //for admins to update their own details
    if(isset($_POST['update_details']))
    {
        $cpswd=$_POST['cpswd'];
        $pswd=$_POST['pswd'];
        if($cpswd===$pswd)
        {
            $email=$_POST['email'];
            $user_id=$_POST['user_id'];
            $name=$_POST['name'];
            $phon=$_POST['phon'];
           
            
            $verify_token=md5(rand());//function to produce random number and alphabets
            
            $query="UPDATE administrator SET name='$name',email='$email',phn='$phon',password='$pswd',verify_token='$verify_token',verify_status='0' WHERE sl_no='$user_id' ";
            $query_run=mysqli_query($con,$query);
            if($query_run)
            {
                sendemail_verify("$name","$email","$verify_token");
                $_SESSION['status']="Update Successfull..!Please verify your email address";
                header("Location: adminaccount.php");
            }
            else{
                $_SESSION['status']="Update Failed ";
                header("Location: adminaccount.php");
            }
        }
        else{
                $_SESSION['status']="Password and Confirm Password Donot Match";
                header("Location: adminaccount.php");
        }

    }

    //for admins to enter new admins
    if(isset($_POST['add_admin']))
    {
        
        $cpswd=$_POST['cpswd'];
        $pswd=$_POST['pswd'];
        if($cpswd===$pswd)
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phon=$_POST['phon'];
            
            $verify_token=md5(rand());//function to produce random number and alphabets
            


            $check_email_query= "SELECT * FROM administrator WHERE email='$email' ";
            $check_email_query_run=mysqli_query($con,$check_email_query);
            $emailcount=mysqli_num_rows($check_email_query_run);
        
            if($emailcount>0)
            {
                $_SESSION['status']="Email id already Exists for the particular admin";
                header("Location: page.php");
            }
            else{
                //insert user  or registered users data
                $query="INSERT INTO `administrator`(`name`, `email`, `phn`, `password`, `verify_token`) VALUES  ('$name','$email','$phon','$pswd','$verify_token')";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                {
                    sendemail_verify("$name","$email","$verify_token");
                    $_SESSION['status']="Registration Successfull..!Please ask him/her to verify their email address";
                    header("Location: page.php");
                }
                else{
                    $_SESSION['status']="Registration Failed ";
                    header("Location: page.php");
                }
                
                
            }
        }
        else
        {
            $_SESSION['status']="Password and Confirm Password Donot Match";
            header("Location: page.php");
        }
        
    }


    //for admins to delete other admins
    if(isset($_POST['delete_admin']))
    {
        $user_id=$_POST['delete_id'];
        
        
        $query="DELETE FROM `administrator` WHERE sl_no='$user_id'";
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {
            
            $_SESSION['status']="Admin Deleted Succcessfully";
            header("Location: page.php");
        }
        else{
            $_SESSION['status']="Couldn't Delete";
            header("Location: page.php");
        }
       
    }
    
    


?>