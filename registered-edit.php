<?php 
    //session_start();
    include('adminauthenticate.php');
    $page_title="Edit Registered User";
    include('include/header.php');
    include('include/navbar.php'); 

    
?>

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 mt-4">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h4 class="card-title">
                    Edit Registered Student
                    <a href="page.php"class=" btn btn-danger  btn-sm float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            

                            
                                <?php 
                                    include('dbcon.php');
                                    if(isset($_GET['rlno']))
                                    {
                                        $rlno=$_GET['rlno'];
                                        $query="SELECT * FROM student WHERE rl_no='$rlno' LIMIT 1";
                                        $query_run=mysqli_query($con,$query);
                                        $query_run_count=mysqli_num_rows($query_run);
                                        if($query_run_count > 0)
                                        {
                                            foreach($query_run as $row)
                                            {   
                                            ?>
                                                <input type="hidden" name ="rlno" value="<?php echo $row['rl_no']; ?>" >
                                                <input type="hidden" name ="em" value="<?php echo $row['email']; ?>" >
                                                <div class="form-group mb-3 ">
                                                    <label for="name"> Name:</label>     
                                                    <input type="text" class="form-control" value="<?php echo $row['name'] ?>" id="name" placeholder="Enter Your Name" name="name" required >
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                
                                                <div class="form-group mb-3">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" placeholder="Enter Email" required name="email" >(Hint.This will be used as Username for LogIn)
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="cid"> College ID:</label>     
                                                    <input type="text" class="form-control" value="<?php echo $row['c_id'] ?>" id="cid" placeholder="Enter College ID" name="cid" required >
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="phon">Enter your phone number:</label>&nbsp;&nbsp;+91
                                                    <input type="tel" id="phon" name="phon" value="<?php echo $row['phn'] ?>"  placeholder="12345678910" required pattern="[1-9]{1}[0-9]{9}" >
                                                
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>   
                                                <div class="form-group mb-3">
                                                    <label for="gender">Enter your Gender:</label>&nbsp;&nbsp;
                                                    <input type="text" id="gender" name="gender" value="<?php echo $row['gender'] ?>" placeholder="Male/Female/Others" required >
                                                
                                                    <div class="valid-feedback">Valid.</div>
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div> 
                                                <div class="form-group mb-3 ">
                                                    <label for="img">Profile Pic:</label>
                                                    <input type="file" class="form-control-file border" id="img" name="file">
                                                    <input type="hidden" value="<?php echo $row['fname'] ?>" name="old_img">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="pswd">Password:(Minimum 4 characters)</label>
                                                    <input type="password" class="form-control" id="pswd" value="<?php echo $row['password'] ?>" placeholder="Enter Password" name="pswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" ><input type="checkbox" onclick="Toggle()">
                                                        Show Password 
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="cpswd">Confirm Password</label>
                                                    <input type="password" class="form-control" id="cpswd"  placeholder="Confirm Password" name="cpswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" >
                                                    <div class="invalid-feedback">Please fill out this field.</div>
                                                </div>
                                            
                                            <?php }    
                                        }
                                        else{
                                            echo "<h4>No Records Found..</h4>";
                                        }
                                    }

                                   

                                ?>
                                    
                                
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info " name="updateuser">Update Student</button>
                            </div>
                        </form>  
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

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
