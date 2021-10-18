<?php
    session_start();
    $page_title='Student Registration page';
    include('include/header.php');
    include('include/navbar.php');
    if(isset($_SESSION['authenticated']))
    {
       
        header("Location:dashboard.php");
    }
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                    <div class="card-header bg-info text-center">
                        <h5>Student Registration form</h5>
                    </div>
                    <div class="card-body ">
                        <form action="code.php"   method="POST" enctype="multipart/form-data">

                            <div class="form-group mb-3 ">
                                <label for="name"> Name:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email ID:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" required name="email" >(Hint.This will be used as Username for LogIn)
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <label for="rl" class="form-label "> Roll Number:</label>     
                                <input type="text"  class="form-control"id="rl" name="rl" placeholder="University Roll Number"  required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label for="cid"> College ID:</label>     
                                <input type="text" class="form-control" id="cid" name="cid" placeholder="Enter College ID" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="phon">Phone Number:</label>&nbsp;&nbsp;+91
                                <input type="tel" id="phon" name="phon" placeholder="12345678910" required pattern="[1-9]{1}[0-9]{9}" >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>   

                            <div class="form-group col-md-6">
                                <label for="gender">Gender:</label>&nbsp;&nbsp;
                                <input type="text" class="form-control" id="gender" name="gender" placeholder="Male/Female/Others" required >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="img">Profile Pic:</label>
                            <input type="file" class="form-control-file border" id="img" name="file">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="pswd">Password:(Minimum 4 characters)</label>
                            <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" ><input type="checkbox" onclick="Toggle()">
                                Show Password 
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary " name="register_btn">Register Now
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