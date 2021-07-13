<?php
    session_start();
    include('dbcon.php');
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
            // mysqli_select_db($con,$dbname);


            // //Code to see if Table Exists
            // $exists="SELECT 1 from $name";
            // $exists_run = mysqli_query($con,$exists);
            
            // $existcount=mysqli_num_rows($exists_run);
            
            // if($existcount>0)
            // {
            //     $_SESSION['status']="Company already registered";
            //     header("Location: company.php");
            // }
            // else{

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
                // $sql_run=mysqli_query($con,$sql);    
                if (mysqli_query($con,$sq)) {
                    $_SESSION['status']="Company added Successfully and corressponding company table created successfully";
                    header("Location: company.php");
                } else {
                    $_SESSION['status']="Company added Successfully but corressponding company table creation failed";
                    header("Location: company.php");                }
            
            
            
        }
        else{
            $_SESSION['status']="Company add Failed ";
            header("Location: company.php");
        }
        
    
    
        
    }

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





?>