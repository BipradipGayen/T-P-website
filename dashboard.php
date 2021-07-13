<?php 
    include('authentication.php');
    $page_title="Dashboard";
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

                <div class="card">
                <div class="card-header ">
                        <h4 class="card-title">
                            Your Account Details
                            <a href="accountupdate.php?user_id=<?php echo $_SESSION['auth_user']['slno']; ?>"  class=" btn btn-primary bg-info btn-sm float-right">Edit Details</a>
                        </h4>
                    </div>
                    <div class="card-body">
                      <?php $slno= $_SESSION['auth_user']['slno'];
                            
                            include('dbcon.php');

                            $query="SELECT * FROM student WHERE sl_no='$slno'";
                            $query_run=mysqli_query($con,$query);
                            $query_run_count=mysqli_num_rows($query_run);
                            if($query_run_count > 0)
                            {
                                foreach($query_run as $row)
                                {
                                ?>
                                    <hr>
                                        <h5>
                                            SL NO:&nbsp;<?php echo $row['sl_no'];?>
                                        </h5>
                                    </hr>
                                
                                    <hr>
                                        <h5>
                                            NAME:&nbsp;<?php echo $row['name'];?>
                                        </h5>
                                    </hr>

                                    <hr>
                                        <h5>
                                           EMAIL ID :&nbsp;<?php echo $row['email'];?>
                                        </h5>
                                    </hr>
                                    <hr>
                                        <h5>
                                            PHONE NUMBER:&nbsp;<?php echo $row['phn'];?>
                                        </h5>
                                    </hr>

                                    <hr>
                                        <h5>
                                           GENDER:&nbsp; <?php echo $row['gender'];?>
                                        </h5>
                                    </hr>

                                    <hr>
                                        <h5>
                                           PASSWORD:&nbsp; <?php echo $row['password'];?>
                                        </h5>
                                    </hr>
                                        
                                        
                               

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
    </div>
</div>
<br>
<br>
<br>


<?php include('include/footer.php'); ?>
