<?php 
    // if(!isset($_SESSION)) { 
    //     session_start(); 
    // } 
    include('authentication.php');
    $page_title="Company Registration";
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
                <div class="card-header text-center bg-info">
                    <h4 class="card-title">
                        Registered Companies
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr >
                            
                                <th scope="col">Sl_No</th>
                                <th scope="col">Name of Company </th>
                                
                                <th scope="col">Designation</th>
                                <th scope="col">Gender Preference</th>
                                <th scope="col">Job Location</th>
                                <th scope="col">Salary(in Lakhs p.a)</th>
                                <th scope="col">Internship Oppurtunity</th>
                                <th scope="col">Date of Drive</th>
                                <th scope="col">Day of Week</th>
                                <th scope="col">Venue</th>
                       
                                <th scope="col">Last date to apply online</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include('dbcon.php');

                                $query="SELECT * FROM company";
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
                                       
                                       
                                            <td><?php echo $row['designation'];?></td>
                                      
                                            <td><?php echo $row['gendpref'];?></td>
                                       
                                            <td><?php echo $row['location'];?></td>
                                            
                                            <td><?php echo $row['salary'];?></td>
                                            
                                            <td><?php echo $row['internship'];?></td>
                                                                                        
                                            <td><?php echo $row['date'];?></td>
                                            
                                            <td><?php echo $row['day'];?></td>
                                            
                                            <td><?php echo $row['venue'];?></td>
                                            
                                            
                                            
                                            
                                            <td><?php echo $row['lda'];?></td>
                                            <?php
                                                $current_date=date("Y-m-d"); 
                                                $val=$row['lda'];
                                                if($val > $current_date){ ?>
                                                    <td><button type="button" value="<?php echo $row['name']; ?>" data-toggle="modal" data-target="#NameModal" class=" btn btn-primary bg-info btn-sm float-right compbtn">Register</a></td>
                                            <?php }
                                            else{ ?>
                                                <td><button type="button disabled" >Register</button></td>

                                            <?php } ?>
                                       
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
                    <h5 class="modal-title " id="exampleModalLabel">Register Yourself</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="companycode.php" method="POST">
                   
                    <input type="hidden"  name ="compname" class="comp_name" >
                    <div class="modal-body">
                            <div class="form-group mb-3 ">
                                <label for="name"> Student Name:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required >
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
                                <input type="text" class="form-control" id="name" placeholder="Enter Designation You Want to Apply For" name="dsg" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender">Gender:</label>&nbsp;&nbsp;
                                <input type="text" id="gender" name="gender" placeholder="Male/Female/Others" required >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 
                            
                            <div class="form-group mb-3 ">
                                <label for="roll">University Roll:</label>     
                                <input type="text" class="form-control" id="roll" placeholder="Roll Number" name="roll" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="tmarks"> Class 10 (%):</label>     
                                <input type="number" step="0.01" min="40"class="form-control" id="tmarks" placeholder="Your Marks in %" name="tmarks" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="twmarks"> Class 12 (%):</label>     
                                <input type="number" step="0.01" min="40" class="form-control" id="twmarks" placeholder="Your Marks in %" name="twmarks" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="btch">BTECH(%):</label>     
                                <input type="number" step="0.01" min="40" class="form-control" id="btch" placeholder="Your Marks in %" name="btch" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                           
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="stud_comp_register">Register</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.compbtn').click(function (e){
                e.preventDefault();
                var user_id=$(this).val();
                $('.comp_name').val(user_id);
                $('#NameModal').modal('show');
            })
        })
    </script> 
   
    <br>
    <br>
    <br>
<?php include('include/footer.php'); ?>

