<?php
    session_start();
    include('dbcon.php');
    if(isset($_POST['add_qsn']))
    {
        $name=$_POST['name'];
        $cmp=$_POST['cmp'];
        $rl=$_POST['rl'];
        $psyr=$_POST['psyr'];
        $psn=$_POST['psn'];

        $pdf=addslashes($_FILES['file']['tmp_name']);
        $pdf_name=addslashes($_FILES['file']['name']);
        $pdf=file_get_contents($pdf);
        $pdf=base64_encode($pdf);
       
        $sql="INSERT INTO `interview`(`stud_roll`, `name`, `cname`, `psyr`, `posn`, `fname`, `fsize`)
            VALUES ('$rl,'$name','$cmp','$psyr','$psn','$pdf_name','$pdf')";
        $sql_run=mysqli_query($con,$sql);
        if($sql_run)
        {
            
            $_SESSION['status']="Success";
            header("Location: interviewqsns.php");
        }
        else{
            $_SESSION['status']="Registration Failed ";
            header("Location: interviewqsns.php");
        }
        
           


    }
?>