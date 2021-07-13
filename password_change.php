<?php
    session_start();
    $page_title='Password Update Form';
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
                        <h3>Reset Password</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="password-reset-code.php" method="POST">
                           <input type="hidden" name="password_token" value ="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" value ="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" placeholder="Enter Your Email Address" required name="email" >
                                
                            </div>
                            <div class="form-group mb-3">
                                <label for="npwd">New Password</label>
                                <input type="password" class="form-control" id="npwd" placeholder="Enter New Password" required name="new_password" >
                                
                            </div>
                            <div class="form-group mb-3">
                                <label for="cpwd">Confirm Password</label>
                                <input type="password" class="form-control" id="cpwd" placeholder="Confirm New Password" required name="confirm_password" >
                                
                            </div>
                           
                            
                           
                            
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100" name="password_update">Update Password
                                </button>
                           
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>