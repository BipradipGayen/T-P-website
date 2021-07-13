<?php
    session_start();
    $page_title='Admin Registration Page';
    include('include/header.php');
    include('include/navbar.php');
    if(isset($_SESSION['authenticated']))
    {
       
        header("Location:admindashboard.php");
    }
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="alert">
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
            </div>
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <h5>Administrator Registration Form</h5>
                    </div>
                    <div class="card-body ">
                        <form action="admincode.php"  method="POST">
                            <div class="form-group mb-3 ">
                                <label for="name"> Name:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" required name="email" >(Hint.This will be used as Username for LogIn)
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phon">Enter your phone number:</label>&nbsp;&nbsp;+91
                                <input type="tel" id="phon" name="phon" placeholder="12345678910" required pattern="[1-9]{1}[0-9]{9}" >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>   
                           
                            <div class="form-group mb-3 ">
                                <label for="pswd">Password:(Minimum 4 characters)</label>
                                <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" ><input type="checkbox" onclick="Toggle()">
                                    Show Password 
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary" name="adminregister_btn">Register Now
                                </button>
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