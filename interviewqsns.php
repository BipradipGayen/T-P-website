<?php 
    include('authentication.php');
    $page_title="Appeared Interviews";
    include('include/header.php');
    include('include/navbar.php'); 
    
?>
<div class="container py-5">
    
                
    <div class="row">
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

            <div class="card">
            
                <div class="card-header">
                    <h4 class="card-title">
                        Student Experience
                        <a href="" data-toggle="modal" data-target="#NameModal" class=" btn btn-primary bg-info btn-sm float-right">Add Questions</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <input type="text" class="form-control" name="filter_value" placeholder="Search by Company Name/PassOut Year ">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class= "btn btn-primary" type="submit" name="filter_btn">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <?php
                            include ('dbcon.php');
                            if(isset($_POST['filter_btn']))
                            {
                                $valueToSearch=$_POST['filter_value'];
                                $query="SELECT * FROM `interview` WHERE CONCAT(`cmp_name`, `pass_yr`) LIKE '%".$valueToSearch."%'";
                                
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
                <div class="modal-header text-center bg-info">
                    <h5 class="modal-title " id="exampleModalLabel">Add Questions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="interviewcode.php" method="POST" enctype="multipart/form-data">
                   

                    <div class="modal-body">
                            <div class="form-group mb-3 ">
                                <label for="name"> Name:</label>     
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>    
                            
                            <div class="form-group mb-3">
                                <label for="cmp">Company:</label>
                                <input type="text" id="cmp" class="form-control" name="cmp" placeholder="Enter Company Name" required  >
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>   

                            <div class="row">
                                <div class="form-group col-md-5 ">
                                    <label for="rl"> Roll:</label>     
                                    <input type="text"  id="rl" placeholder=" University Roll" name="rl" required >
                                    
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="psyr">PassOut:</label>
                                    <input type="number" id="yr" name="psyr" placeholder=" Year Of Passout" required min="2005">
                                
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div> 
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="psn">Position:</label>
                                <input type="text" class="form-control" id="psn" placeholder="Positon Applied For" name="psn" required>
                                    
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mb-3 ">
                                <input type="file" class="form-control-file border" name="file">
                            </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_qsn">Add</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

<?php include('include/footer.php'); ?>