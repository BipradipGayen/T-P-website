<?php
    session_start();
    include('dbcon.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function sendemail_notify($email,$name)
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
        $mail->setFrom("dummyforphp26@gmail.com","Department Of Information Technology");
        $mail->addAddress($email);     //Add a recipient
         //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Company Registration Notification from IT T&P";
        $email_template="
                    <h2>$name has started the Recruitment Process.</h2>
                    <h4>Please visit the Portal if you want to register for it and fill before the last day.</h4>
                   ";
        
                   
        $mail->Body    = $email_template;
        $mail->send();
        //echo 'Message has been sent';
    }

    //adding of company by user
    if(isset($_POST['add_company']))
    {
        $name=$_POST['name'];
        $register="0";
        $email=$_POST['email'];
        $dsg=$_POST['dsg'];
        $gender=$_POST['gender'];
        $jloc=$_POST['jloc'];
        $sal=$_POST['sal'];
        $intern=$_POST['intern'];
        $dtdrv=$_POST['dtdrv'];
        $dywk=$_POST['dywk'];
        $venue=$_POST['venue'];
        $rgstonl=$_POST['rgstonl'];
        $query="INSERT INTO `company`( `name`, `email`, `designation`, `gendpref`, `location`, `salary`, `internship`, `date`, `day`, `venue`, `rgdstud`, `lda`) VALUES ('$name','$email','$dsg','$gender','$jloc','$sal','$intern',
        '$dtdrv','$dywk','$venue','$register','$rgstonl')";
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {

            $sq = "CREATE TABLE `".$name."`(
                ID INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                NAME VARCHAR(50) NOT NULL,
                UNIVERSITY_ROLL VARCHAR(15) NOT NULL,
                EMAIL VARCHAR(50) NOT NULL,
                GENDER VARCHAR(8) NOT NULL,
                CLASS_10 FLOAT(5) NOT NULL,
                CLASS_12 FLOAT(5) NOT NULL,
                BTECH FLOAT(5) NOT NULL,
                DESIGNATION VARCHAR(20) NOT NULL
                )";
            $sq_run=mysqli_query($con,$sq);  
            $eml_query="SELECT * FROM student WHERE verify_status='1'";
            $eml_query_run=mysqli_query($con,$eml_query);
            $eml_query_run_count=mysqli_num_rows($eml_query_run);
            if($eml_query_run_count > 0)
            {
                foreach($eml_query_run as $row)
                {  
                    sendemail_notify($row['email'],$name);
                }
            }


            if ($sq_run ) {

                $_SESSION['status']="Company added Successfully,corressponding company table created successfully,Students have been notified via mail successfully";
                header("Location: company.php");
            }
            else{
                $_SESSION['status']="Company added Successfully but corressponding company table creation failed";
                header("Location: company.php");     
            }
            
            
            
        }
        else{
            $_SESSION['status']="Company add Failed ";
            header("Location: company.php");
        }
        
    
    
        
    }


    //students registering for company
    if(isset($_POST['stud_comp_register']))
    {
        $cmpname=$_POST['compname'];
       
        $email=$_POST['email'];

        $semail="SELECT * FROM `".$cmpname."` WHERE EMAIL='$email' LIMIT 1";
        $semail_run=mysqli_query($con,$semail);
        $semail_q=mysqli_num_rows($semail_run);
        if($semail_q>0)
        {
            // echo $sname_q;
            $_SESSION['status']="You have already registered earlier";
            header("Location: companyregister.php");
        }
        else{
            $dsg=$_POST['dsg'];
            $name=$_POST['name'];
            $gender=$_POST['gender'];
            $roll=$_POST['roll'];
            $tmarks=$_POST['tmarks'];
            $twmarks=$_POST['twmarks'];
            $btch=$_POST['btch'];


            $query="INSERT INTO `".$cmpname."`( `NAME`, `UNIVERSITY_ROLL`, `EMAIL`, `GENDER`, `CLASS_10`, `CLASS_12`, 
            `BTECH`, `DESIGNATION`) VALUES ('$name','$roll','$email','$gender','$tmarks','$twmarks','$btch','$dsg')";
            $query_run=mysqli_query($con,$query);
            if($query_run)
            {
                $upd="UPDATE company SET rgdstud =(SELECT COUNT(*) FROM `".$cmpname."`) WHERE name='$cmpname'";
                $upd_query=mysqli_query($con,$upd);
                if($upd_query)
                {
                    $_SESSION['status']="Registration Successfull..! ";
                    header("Location: companyregister.php");
                }
                else{
                    $_SESSION['status']="Registration Successfull but updation failed ";
                    header("Location: companyregister.php");
                
                    }
            }   
            else{
                    $_SESSION['status']="Registration Failed!";
                    header("Location: companyregister.php");
            }
                
        }
    }

    //remove company
    if(isset($_POST['delete_company']))
    {
        $user_id=$_POST['delete_id'];
        $name=$_POST['delete_name'];
        // print_r($user_id);
        // print_r($name);
        $sql="DROP TABLE `".$name."`";
        $sql_run=mysqli_query($con,$sql);
        if($sql_run)
        {
            $query="DELETE FROM `company` WHERE sl_no='$user_id'";
            $query_run=mysqli_query($con,$query);
            if($query_run)
            {
                
                $_SESSION['status']="Company Deleted Succcessfully";
                header("Location: company.php");
            }
            else{
                $_SESSION['status']="Couldn't Delete";
                header("Location: company.php");
            }
        }
        else{
                $_SESSION['status']="Couldn't Delete";
                header("Location: company.php");
        }
    }





?>