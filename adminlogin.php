<?php
    session_start();
    if(isset($_SESSION['authenticated_admin']))
    {
        $_SESSION['status']="You are already Logged In.";
        
        header("Location:adminaccount.php");
        exit(0);
    }

    $page_title='Admin Login Form';
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
                        <h3>Administrator Login form</h3>
                    </div>
                    <div class="card-body">
                        <form action="adminlogincode.php"  method="POST">
                           
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" required name="email" >
                                
                            </div>
                           
                            <div class="form-group mb-3 ">
                                <label for="pswd">Password:(Minimum 4 characters)</label>
                                <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" ><input type="checkbox" onclick="Toggle()">
                                    Show Password 
                                
                            </div>
                           
                            
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary" name="admin_login_now_btn">Login
                                </button>
                                <a href="adminpassword-reset.php" class="float-end" target="_blank">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function Toggle() {
        var temp = document.getElementById("pswd");
        if (temp.type === "password") {
            temp.type = "text";
        }
        else {
            temp.type = "password";
        }
    }
</script> 



<?php include('include/footer.php'); ?>