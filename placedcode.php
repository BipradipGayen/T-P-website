<?php 
    session_start();
    include('dbcon.php');
    if(isset($_POST['update_data']))
    {
        $roll=$_POST['roll'];
        $name=$_POST['name'];
        $cmpname=$_POST['cmp'];
        $psyr=$_POST['psyr'];
       
    
        $query="INSERT INTO `placed`(`roll`, `name`, `cmp_name`, `pass_yr`)  VALUES ('$roll','$name','$cmpname','$psyr')";
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {
            
                $_SESSION['status']="Update Successfull..! ";
                header("Location: adminviewplacedstuds.php");
        }    
        else{
            $_SESSION['status']="Update failed ";
            header("Location: adminviewplacedstuds.php");
        
            }
    }   
    else{
            $_SESSION['status']="Error!";
            header("Location: adminviewplacedstuds.php");
    }
                
        
    
?>