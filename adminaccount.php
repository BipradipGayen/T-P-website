<?php 
   
    include('adminauthenticate.php');
    $page_title="Admin Account";
    include('include/header.php');
    include('include/navbar.php'); 
    
?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                 <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5><?=$_SESSION['status'];?></h5>
                        </div>
                        <?php
                            unset($_SESSION['status']);
                    }
                
                ?>

                
                      <?php $empno= $_SESSION['auth_user']['empno'];
                            
                            include('dbcon.php');

                            $query="SELECT * FROM administrator WHERE emp_no='$empno'";
                            $query_run=mysqli_query($con,$query);
                            $query_run_count=mysqli_num_rows($query_run);
                            if($query_run_count > 0)
                            {
                                foreach($query_run as $row)
                                {
                                ?>
                                    
                                <div class="card mb-3 mx-auto bg-warning" style="max-width: 900px; ">
                                    <div class="row">
                                        <div class="col-md-4 ">
                                            <div class="container mb-3 mt-3">
                                                <img src="<?php echo $row['img'];?>"  class="img-fluid" style="height:400px"  alt="profile picture">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <br>
                                                <h4 class="card-title mb-3 mb-3">
                                                    EMPLOYEE ID:&nbsp;<?php echo $row['emp_no'];?>
                                                </h4>
                                            
                                        
                                        
                                                <h4 class="card-title mb-3 mb-3">
                                                    NAME:&nbsp;<?php echo $row['name'];?>
                                                </h4>
                                            

                                        
                                                <h4 class="card-title mb-3 mb-3">
                                                    EMAIL ID :&nbsp;<?php echo $row['email'];?>
                                                </h4>
                                            
                                        
                                                <h4 class="card-title mb-3 mb-3">
                                                    PHONE NUMBER:&nbsp;<?php echo $row['phn'];?>
                                                </h4>
                                            

                                        
                                                <h4 class="card-title mb-3 mb-3">
                                                    PASSWORD:&nbsp; <?php echo $row['password'];?>
                                                </h4>
                                            
                                                <br>
                                                <div class="text-center">
                                                    <a href="adminaccountupdate.php?user_id=<?php echo $_SESSION['auth_user']['empno']; ?>"  class=" btn btn-primary bg-info btn-md ">Edit Details</a>
                                                </div>     
                               
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                
                                <?php
                                }
                            }
                            else{?>
                                <hr>
                                    <td>No Record Found</td>
                                </hr>
                                <?php
                            }

                            ?> 
                        
                    </div>
                </div>

            </div>
        </div>
    
    <br>

         


<?php include('include/footer.php'); ?>
