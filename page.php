<?php 
    // if(!isset($_SESSION)) { 
    //     session_start(); 
    // } 
    include('adminauthenticate.php');
    $page_title="View Stuff";
    include('include/header.php');
    include('include/navbar.php'); 

    
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
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
        
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Registered Students
                        <a href="" data-toggle="modal" data-target="#NameModal" class=" btn btn-primary bg-info btn-sm float-right">Add User</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr >
                            
                                <th scope="col">Sl_No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email ID</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Password</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include('dbcon.php');

                                $query="SELECT * FROM student";
                                $query_run=mysqli_query($con,$query);
                                $query_run_count=mysqli_num_rows($query_run);
                                if($query_run_count > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                       ?>
                                       <tr>
                                            <td><?php echo $row['sl_no'];?></td>
                                       
                                            <td><?php echo $row['name'];?></td>
                                       
                                            <td><?php echo $row['email'];?></td>
                                       
                                            <td><?php echo $row['phn'];?></td>
                                      
                                            <td><?php echo $row['gender'];?></td>
                                       
                                            <td><?php echo $row['password'];?></td>
                                            
                                            <td>
                                                <a href="registered-edit.php?user_id=<?php echo $row['sl_no']; ?>" class="btn btn-sm btn-info" >Edit &nbsp;</a>
                                                <button type="button" value="<?php echo $row['sl_no']; ?>" data-toggle="modal" data-target="#DeleteModal" class="btn btn-sm btn-danger deletebtn" >Delete</button>
                                            </td>
                                       
                                       </tr>

                                       <?php
                                    }
                                }
                                else{?>
                                    <tr>
                                        <td>No Record Found</td>
                                    </tr>
                                    <?php
                                }

                            ?>
                            
                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-4">
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
        
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Registered Admins
                        <a href="" data-toggle="modal" data-target="#NameModal1" class=" btn btn-primary bg-info btn-sm float-right">Add Admins</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr >
                            
                                <th scope="col">Sl_No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email ID</th>
                                <th scope="col">Phone</th>
                                
                                <th scope="col">Password</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include('dbcon.php');

                                $query="SELECT * FROM administrator";
                                $query_run=mysqli_query($con,$query);
                                $query_run_count=mysqli_num_rows($query_run);
                                if($query_run_count > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                       ?>
                                       <tr>
                                            <td><?php echo $row['sl_no'];?></td>
                                       
                                            <td><?php echo $row['name'];?></td>
                                       
                                            <td><?php echo $row['email'];?></td>
                                       
                                            <td><?php echo $row['phn'];?></td>
                                      
                                            <td><?php echo $row['password'];?></td>
                                            
                                            <td>
                                                <?php
                                                    $slno= $_SESSION['auth_user']['slno'];
                                                    if($slno!=$row['sl_no'])
                                                    {
                                                ?>
                                                    <a href="adminaccountupdate.php?user_id=<?php echo $row['sl_no']; ?>" class="btn btn-sm btn-info" >Edit</a> 
                                                    <button type="button" value="<?php echo $row['sl_no']; ?>" data-toggle="modal" data-target="#DeleteModal1" class="btn btn-sm btn-danger deletebtn1" >Delete</button>
                                                   
                                            <?php } ?>
                                            
                                            </td>
                                       
                                       </tr>

                                       <?php
                                    }
                                }
                                else{?>
                                    <tr>
                                        <td>No Record Found</td>
                                    </tr>
                                    <?php
                                }

                            ?>
                            
                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal for adding user-->
    <div class="modal fade" id="NameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                   

                    <div class="modal-body">
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
                            <div class="form-group mb-3">
                                <label for="gender">Enter your Gender:</label>&nbsp;&nbsp;
                                <input type="text" id="gender" name="gender" placeholder="Male/Female/Others" required >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 
                            <div class="form-group mb-3 ">
                                <label for="pswd">Password:(Minimum 4 characters)</label>
                                <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" ><input type="checkbox" onclick="Toggle()">
                                    Show Password 
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="cpswd">Confirm Password</label>
                                <input type="password" class="form-control" id="cpswd"  placeholder="Confirm Password" name="cpswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" >
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_user">Add User</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

    <!-- Modal for adding admin-->
    <div class="modal fade" id="NameModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLabel">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admincode.php" method="POST">
                   

                    <div class="modal-body">
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
                                <label for="pswd1">Password:(Minimum 4 characters)</label>
                                <input type="password" class="form-control" id="pswd1" placeholder="Enter password" name="pswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" ><input type="checkbox" onclick="Toggle1()">
                                    Show Password 
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="cpswd">Confirm Password</label>
                                <input type="password" class="form-control" id="cpswd"  placeholder="Confirm Password" name="cpswd" pattern="[0-9/a-z/A-Z]+" required minlength="4" >
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_admin">Add Admin</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>


    <!-- Delete User -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title " id="exampleModalLabel">Delete User??!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                                
                    <input type="hidden" name ="delete_id" class="delete_user_id" >
                    <div class="modal-body">
                            <h5>Are You Sure You Want To Delete?</h5>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="delete_user">Delete User</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

    <!-- Delete Admin -->
    <div class="modal fade" id="DeleteModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title " id="exampleModalLabel">Delete Admin??!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admincode.php" method="POST">
                                
                    <input type="hidden" name ="delete_id" class="delete_admin_id" >
                    <div class="modal-body">
                            <h5>Are You Sure You Want To Delete?</h5>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="delete_admin">Delete Admin</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

    <!-- script to show/hide password  -->
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
    <!-- script to show/hide password  -->
    <script>
    function Toggle1() {
        var temp = document.getElementById("pswd1");
        if (temp.type === "password") {
            temp.type = "text";
        }
        else {
            temp.type = "password";
        }
    }
    </script> 
    


    <!-- script to pass sl_no of student to delete  -->

    <script>
        $(document).ready(function(){
            $('.deletebtn').click(function (e){
                e.preventDefault();
                var user_id=$(this).val();
                $('.delete_user_id').val(user_id);
                $('#DeleteModal').modal('show');
            })
        })
    </script> 

    <!-- script to pass sl_no of admin to delete  -->

    <script>
        $(document).ready(function(){
            $('.deletebtn1').click(function (e){
                e.preventDefault();
                var user_id=$(this).val();
                $('.delete_admin_id').val(user_id);
                $('#DeleteModal1').modal('show');
            })
        })
    </script> 
    <br>
    <br>
    <br>
<?php include('include/footer.php'); ?>

