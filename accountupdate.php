<?php 
    //session_start();
    include('authentication.php');
    $page_title="Update Details";
    include('include/header.php');
    include('include/navbar.php'); 

    
?>

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="card-title">
                    Edit Account Details
                    <a href="dashboard.php"class=" btn btn-danger  btn-sm float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="code.php" method="POST">
                            

                            <div class="modal-body">
                                <?php 
                                    include('dbcon.php');
                                    if(isset($_GET['user_id']))
                                    {
                                        $user_id=$_GET['user_id'];
                                        $query="SELECT * FROM student WHERE sl_no='$user_id' LIMIT 1";
                                        $query_run=mysqli_query($con,$query);
                                        $query_run_count=mysqli_num_rows($query_run);
                                        if($query_run_count > 0)
                                        {
                                            foreach($query_run as $row)
                                            {   
                                            ?>
                                                <input type="hidden" name ="user_id" value="<?php echo $row['sl_no']; ?>" >
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
                                    
                            </div>    
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info " name="update_details">Update</button>
                            </div>
                        </form>  
                    
                    </div>
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
