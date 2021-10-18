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
                    <h2>You have Registered with IT Training and Placement</h2>
                    <h4>Verify with the email address to login with the below given link</h4>
                    <br/><br/>
                    <a href='http://localhost/PHP/project/project1/verify-email.php?token=$verify_token'>Click Me</a>";
        
                   
        $mail->Body    = $email_template;
        $mail->send();
        //echo 'Message has been sent';
    }
    
    
    
    //users to register themselves
    if(isset($_POST['register_btn']))
    {
        $name=$_POST['name'];
        $rl=$_POST['rl'];
        $cid=$_POST['cid'];
        $email=$_POST['email'];
        $phon=$_POST['phon'];
        $gender=$_POST['gender'];
        $pswd=$_POST['pswd'];
        $verify_token=md5(rand());//function to produce random number and alphabets
        $check_email_query= "SELECT * FROM student WHERE email='$email' ";
        $check_email_query_run=mysqli_query($con,$check_email_query);
        $emailcount=mysqli_num_rows($check_email_query_run);
     
        if($emailcount>0)
        {
            $_SESSION['status']="Email id already Exists";
            header("Location: register.php");
        }
        else{
    
            $img=$_FILES['file'];
            
            $filename=$img['name'];
            //print_r($filename);
            $fileerror=$img['error'];
            $filetmp=$img['tmp_name'];
            $fileext=explode('.',$filename);
            $filecheck=strtolower((end($fileext)));
            $fileextstored=array('png','jpg','jpeg');
            if(in_array($filecheck,$fileextstored))
            {
                $destintaion='upload/student/.'.$filename;
                move_uploaded_file($filetmp,$destintaion);
                 //insert user  or registered users data
                $query="INSERT INTO `student`(`rl_no`, `c_id`,`name`, `email`, `phn`,
                 `gender`, `password`, `verify_token`,`fname`, `img`) VALUES  ('$rl','$cid','$name','$email','$phon',
                 '$gender','$pswd','$verify_token','$filename','$destintaion')";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                    {
                        sendemail_verify("$name","$email","$verify_token");
                        $_SESSION['status']="Registration Successfull..!Please verify your email address";
                        header("Location: register.php");
                    }
                    else{
                        $_SESSION['status']="Registration Failed ";
                        header("Location: register.php");
                    }
            }
            else{
                $_SESSION['status']="Image upload Failed...upload only jpg/jpeg/png images";
                header("Location: register.php");
            }
           
        }
       

        
    }


    //for admins to enter new users
    if(isset($_POST['add_user']))
    {
        
        $cpswd=md5($_POST['cpswd']);
        $pswd=md5($_POST['pswd']);
        if($cpswd===$pswd)
        {
            $name=$_POST['name'];
            $rl=$_POST['rl'];
            $cid=$_POST['cid'];
            $email=$_POST['email'];
            $phon=$_POST['phon'];
            $gender=$_POST['gender'];
            $verify_token=md5(rand());//function to produce random number and alphabets
            $check_email_query= "SELECT * FROM student WHERE email='$email' ";
            $check_email_query_run=mysqli_query($con,$check_email_query);
            $emailcount=mysqli_num_rows($check_email_query_run);
            if($emailcount>0)
            {
                $_SESSION['status']="Email id already Exists";
                header("Location: page.php");
            }
            else{
                //insert user  or registered users data
                $img=$_FILES['file'];
        
                $filename=$img['name'];
                //print_r($filename);
                $fileerror=$img['error'];
                $filetmp=$img['tmp_name'];
                $fileext=explode('.',$filename);
                $filecheck=strtolower((end($fileext)));
                $fileextstored=array('png','jpg','jpeg');
                if(in_array($filecheck,$fileextstored))
                {
                    $destintaion='upload/student/.'.$filename;
                    move_uploaded_file($filetmp,$destintaion);
                        //insert user  or registered users data
                    $query="INSERT INTO `student`(`rl_no`, `c_id`,`name`, `email`, `phn`,
                        `gender`, `password`, `verify_token`,`fname`, `img`) VALUES  ('$rl','$cid','$name','$email','$phon',
                        '$gender','$pswd','$verify_token','$filename','$destintaion')";   
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
        }
        else
        {
            $_SESSION['status']="Password and Confirm Password Donot Match";
            header("Location: page.php");
        }
        
       

        
    }

    //for admins to update details of user
    if(isset($_POST['updateuser']))
    {
        
        $cpswd=md5($_POST['cpswd']);
        $pswd=md5($_POST['pswd']);
        if($cpswd===$pswd)
        {
            $email=$_POST['email'];
            $old_email=$_POST['em'];
            $cid=$_POST['cid'];
            $rlno=$_POST['rlno'];
            
            $name=$_POST['name'];
            $phon=$_POST['phon'];
            $gender=$_POST['gender'];
            
            $verify_token=md5(rand());//function to produce random number and alphabets
            $new_img=$_FILES['file'];
            $filename=$new_img['name'];
            $old_img=$_POST['old_img'];
            if((file_exists('upload/student/.'.$filename)==FALSE) && ($filename!=''))
            {
               //deleting existing image of account and inserting new image
                $fileerror=$new_img['error'];
                $filetmp=$new_img['tmp_name'];
                $fileext=explode('.',$filename);
                $filecheck=strtolower((end($fileext)));
                $fileextstored=array('png','jpg','jpeg');
                if(in_array($filecheck,$fileextstored))
                {
                    $destination='upload/student/.'.$filename;
                    move_uploaded_file($filetmp,$destination);
                    unlink("upload/student/.".$old_img);
                    $query="UPDATE student SET fname='$filename',img='$destination' WHERE rl_no='$rlno' ";
                    $query_run=mysqli_query($con,$query);
                }
            }
            if($old_email==$email)
            {
                $query="UPDATE student SET c_id='$cid',name='$name',phn='$phon',gender='$gender',password='$pswd',verify_token='$verify_token',verify_status='1' WHERE rl_no='$rlno' ";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                {
                    
                    $_SESSION['status']="Update Successfull..";
                    header("Location: page.php");
                }
                else{
                    $_SESSION['status']="Update Failed ";
                    header("Location: page.php");
                }
            }
            else{
                $query="UPDATE student SET c_id='$cid',name='$name',email='$email',phn='$phon',gender='$gender',password='$pswd',verify_token='$verify_token',verify_status='0' WHERE rl_no='$rlno' ";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                {
                    sendemail_verify("$name","$email","$verify_token");
                    $_SESSION['status']="Update Successfull..!Please ask him/her to verify their email address";
                    header("Location: page.php");
                }
                else{
                    $_SESSION['status']="Update Failed ";
                    header("Location: page.php");
                }
            }
        }else{
                $_SESSION['status']="Password and Confirm Password Donot Match";
                header("Location: page.php");
        }
        
       
    }
        
    
    //for admins to delete user
    if(isset($_POST['delete_user']))
    {
        $user_id=$_POST['delete_id'];
        
        
        $query="DELETE FROM `student` WHERE rl_no='$user_id'";
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {
            
            $_SESSION['status']="Student Deleted Succcessfully";
            header("Location: page.php");
        }
        else{
            $_SESSION['status']="Couldn't Delete";
            header("Location: page.php");
        }
       
    }


    //for users to update their own details
    if(isset($_POST['update_details']))
    {
        $cpswd=md5($_POST['cpswd']);
        $pswd=md5($_POST['pswd']);
        if($cpswd===$pswd)
        {
            $email=$_POST['email'];
            $old_email=$_POST['em'];
            $cid=$_POST['cid'];
            $rlno=$_POST['rlno'];
            
            $name=$_POST['name'];
            $phon=$_POST['phon'];
            $gender=$_POST['gender'];
            
            $verify_token=md5(rand());//function to produce random number and alphabets
            $new_img=$_FILES['file'];
            $filename=$new_img['name'];
            $old_img=$_POST['old_img'];
            if((file_exists('upload/student/.'.$filename)==FALSE) && ($filename!=''))
            {
               //deleting existing image of account and inserting new image
                $fileerror=$new_img['error'];
                $filetmp=$new_img['tmp_name'];
                $fileext=explode('.',$filename);
                $filecheck=strtolower((end($fileext)));
                $fileextstored=array('png','jpg','jpeg');
                if(in_array($filecheck,$fileextstored))
                {
                    $destination='upload/student/.'.$filename;
                    move_uploaded_file($filetmp,$destination);
                    unlink("upload/student/.".$old_img);
                    $query="UPDATE student SET fname='$filename',img='$destination' WHERE rl_no='$rlno' ";
                    $query_run=mysqli_query($con,$query);
                }
            }
            if($old_email==$email)
            {
                $query="UPDATE student SET c_id='$cid',name='$name',phn='$phon',gender='$gender',password='$pswd',verify_token='$verify_token',verify_status='1' WHERE rl_no='$rlno' ";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                {
                    
                    $_SESSION['status']="Update Successfull..";
                    header("Location: dashboard.php");
                }
                else{
                    $_SESSION['status']="Update Failed ";
                    header("Location: dashboard.php");
                }
            }
            else{
                $query="UPDATE student SET c_id='$cid',name='$name',email='$email',phn='$phon',gender='$gender',password='$pswd',verify_token='$verify_token',verify_status='0' WHERE rl_no='$rlno' ";
                $query_run=mysqli_query($con,$query);
                if($query_run)
                {
                    sendemail_verify("$name","$email","$verify_token");
                    $_SESSION['status']="Update Successfull..!Please ask him/her to verify their email address";
                    header("Location: dashboard.php");
                }
                else{
                    $_SESSION['status']="Update Failed ";
                    header("Location: dashboard.php");
                }
            }
        }else{
                $_SESSION['status']="Password and Confirm Password Donot Match";
                header("Location: dashboard.php");
        }

    }

?>