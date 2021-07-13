<?php
    session_start();
    $page_title='Admin Reset Password Form';
    include('include/header.php');
    include('include/navbar.php'); 
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

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
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <h3>Admin Reset Password</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="adminpassword-reset-code.php" method="POST">
                           
                            <div class="form-group mb-3">
                                <label for="email">Email Address:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" required name="email" >
                                
                            </div>
                           
                            
                           
                            
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="adminpassword_reset_link">Reset Password
                                </button>
                           
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
