<?php 
    include('authentication.php');
    $page_title="Placed Students";
    include('include/header.php');
    include('include/navbar.php'); 
    
?>




 <div class="container py-5">
    
                
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   
                    <h4 class="card-title">
                    
                    Placed Students
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


         


<?php include('include/footer.php'); ?>
