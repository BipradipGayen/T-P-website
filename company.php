<?php 
    // if(!isset($_SESSION)) { 
    //     session_start(); 
    // } 
    include('adminauthenticate.php');
    $page_title="Registered Companies";
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
                        Registered Companies
                        <a href="" data-toggle="modal" data-target="#NameModal" class=" btn btn-primary bg-info btn-sm float-right">Add New Company</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-hover">
                        <?php 
                        include('dbcon.php');

                        $query="SELECT * FROM company";
                        $query_run=mysqli_query($con,$query);
                        $query_run_count=mysqli_num_rows($query_run);
                        if($query_run_count > 0)
                        {   ?>
                        <thead class="thead-dark">
                            <tr >
                            
                                <th scope="col">Sl_No</th>
                                <th scope="col">Name of Company </th>
                                <th scope="col">Email ID</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Gender Preference</th>
                                <th scope="col">Job Location</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Internship Oppurtunity</th>
                                <th scope="col">Date of Drive</th>
                                <th scope="col">Day of Week</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Number of Registered Candidates</th>
                                <th scope="col">Last date to apply online</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($query_run as $row)
                                    {?>
                                       <tr>
                                            <td><?php echo $row['sl_no'];?></td>
                                       
                                            <td><?php echo $row['name'];?></td>
                                       
                                            <td><?php echo $row['email'];?></td>
                                       
                                            <td><?php echo $row['designation'];?></td>
                                      
                                            <td><?php echo $row['gendpref'];?></td>
                                       
                                            <td><?php echo $row['location'];?></td>
                                            
                                            <td><?php echo $row['salary'];?></td>
                                            
                                            <td><?php echo $row['internship'];?></td>
                                                                                        
                                            <td><?php echo $row['date'];?></td>
                                            
                                            <td><?php echo $row['day'];?></td>
                                            
                                            <td><?php echo $row['venue'];?></td>
                                            
                                            <td><?php echo $row['rgdstud'];?></td>
                                            

                                            
                                            <td><?php echo $row['lda'];?></td>
                                            <td>
                                                
                                                <form action="companycode.php" method="POST">
                                                    <input type="hidden" value="<?php echo $row['sl_no'];?>" name ="delete_id">
                                                    <input type="hidden" value="<?php echo $row['name'];?>" name ="delete_name">
                                                    <button type="submit" class="btn btn-sm btn-danger" name="delete_company">Delete</button>
                                                </form>
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

    <!-- Modal for adding company-->
    <div class="modal fade" id="NameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLabel">Add Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="companycode.php" method="POST">
                   

                    <div class="modal-body">
                            <div class="form-group mb-3 ">
                                <label for="name"> Name of Company:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter Company Name" name="name" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" required name="email" >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="name"> Designation:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter Designation" name="dsg" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender">Gender Preference:</label>&nbsp;&nbsp;
                                <input type="text" id="gender" name="gender" placeholder="Both/Male/Female" required >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 
                            <div class="form-group mb-3 ">
                                <label for="name"> Job Location:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter City" name="jloc" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="name"> Salary Offered:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Salary in lakhs" name="sal" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="name"> Internship Oppurtunity:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Yes/No" name="intern" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="name"> Date of Drive:</label>     
                                <input type="date" class="form-control" id="name" placeholder="yyyy-mm-dd" name="dtdrv" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="name"> Day of Week:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Weekday" name="dywk" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="name"> Venue:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Location of Drive" name="venue" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="name"> Last Date to Register Online:</label>     
                                <input type="date" class="form-control" id="name" placeholder="dd-mm-yyyy" name="rgstonl" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_company">Add Company</button>
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

    <br>
    <br>
    <br>
<?php include('include/footer.php'); ?>

