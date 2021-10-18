<?php 
    include('adminauthenticate.php');
    $page_title="Placed Candidates";
    include('include/header.php');
    include('include/navbar.php'); 
    
?>




 <div class="container py-5">
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
                
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   
                    <h4 class="card-title">
                    <a href="" data-toggle="modal" data-target="#NameModal" class=" btn btn-primary bg-info float-right">Add Placed Candidates</a>    
                    Placed Candidates
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                <input type="text" class="form-control" name="filter_value" placeholder="Search by Passout Year/Company Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class= "btn btn-primary" type="submit" name="filter_btn">Filter Data</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <?php
                            include ('dbcon.php');
                            if(isset($_POST['filter_btn']))
                            {
                                $valueToSearch=$_POST['filter_value'];
                                $query="SELECT * FROM `placed` WHERE CONCAT(`cmp_name`, `pass_yr`) LIKE '%".$valueToSearch."%'";
                                
                                if($query_run=mysqli_query($con,$query))
                                {
                                    if (mysqli_num_rows($query_run) > 0) {
                                        echo "<table class='table table-bordered table-hover'>";
                                            echo "<thead class='thead-dark'>";
                                                echo "<tr>";
                                                    echo "<th scope='col'>Roll No</th>";
                                                    echo "<th scope='col'>Student Name</th>";
                                                    echo "<th scope='col'>Company Name</th>";
                                                    echo "<th scope='col'>Passout Year</th>";
                                                    
                                                echo "</tr>";
                                            echo "</thead>";

                                        while($row=mysqli_fetch_array($query_run))
                                        {
                                            echo "<tbody>";
                                                echo "<tr>";
                                                    echo "<td>" . $row['roll'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['cmp_name'] . "</td>";
                                                    echo "<td>" . $row['pass_yr'] . "</td>";
                                                echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        echo "</table>";
                                        mysqli_free_result($query_run);
                                    }
                                    
                                    else
                                    {
                                        echo "0 Results";
                                    }
                                }
                                else{
                                    echo "ERROR: Could not able to execute";
                                }
                            }    
                                                                    
                           

                        ?>
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
                    <h5 class="modal-title " id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="placedcode.php" method="POST">
                   

                    <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="roll">Roll Number:</label>&nbsp;&nbsp;
                                <input type="text" class="form-control" id="roll" name="roll" placeholder=" University Roll_Number" required >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 

                            <div class="form-group mb-3 ">
                                <label for="name"> Name:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter Student Name" name="name" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="cmp">Company</label>&nbsp;&nbsp;
                                <input type="text" class="form-control" id="cmp" name="cmp" placeholder="Enter Company Name" required >
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 

                            <div class="form-group mb-3">
                                <label for="yr">Passout Year</label>&nbsp;&nbsp;
                                <input type="number" id="yr" name="psyr" placeholder="Enter Year Of Passout" required min="2005">
                            
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update_data">Update</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
 

         


<?php include('include/footer.php'); ?>
