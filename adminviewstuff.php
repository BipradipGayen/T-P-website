<?php 
    include('adminauthenticate.php');
    $page_title="View Stuff";
    include('include/header.php');
    include('include/navbar.php'); 
    
?>




 <div class="container">
                
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Registered Administrators on this Portal
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" class="form-control" name="filter_value" placeholder="Search/Filter Records">
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                $query="SELECT * FROM `administrator` WHERE CONCAT(`name`, `email`) LIKE '%".$valueToSearch."%'";
                                
                                if($query_run=mysqli_query($con,$query))
                                {
                                    if (mysqli_num_rows($query_run) > 0) {
                                        echo "<table class='table table-bordered table-hover'>";
                                            echo "<thead class='thead-dark'>";
                                                echo "<tr>";
                                                    echo "<th scope='col'>Sl_No</th>";
                                                    echo "<th scope='col'>Name</th>";
                                                    
                                                    echo "<th scope='col'>Email</th>";
                                                    echo "<th scope='col'>Phone Number</th>";
                                                    
                                                    echo "<th scope='col'>Password</th>";
                                                echo "</tr>";
                                            echo "</thead>";

                                        while($row=mysqli_fetch_array($query_run))
                                        {
                                            echo "<tbody>";
                                                echo "<tr>";
                                                    echo "<td>" . $row['sl_no'] . "</td>";
                                                    
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['phn'] . "</td>";
                                                 
                                                    echo "<td>" . $row['password'] . "</td>";

                                                echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        echo "</table>";
                                        mysqli_free_result($query_run);
                                    }
                                    
                                    else
                                    {
                                        echo "0 ressults";
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

 
<div class="container">
    
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Registered Candidates on this Portal
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" class="form-control" name="filter_value_1" placeholder="Search/Filter Records">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class= "btn btn-primary" type="submit" name="filter_btn_1">Filter Data</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <?php
                            include('dbcon.php');
                            if(isset($_POST['filter_btn_1']))
                            {
                                $valueToSearch=$_POST['filter_value_1'];
                                $query="SELECT * FROM `student` WHERE CONCAT(`name`, `email`, `gender`) LIKE '%".$valueToSearch."%'";
                                
                                if($query_run=mysqli_query($con,$query))
                                {
                                    if (mysqli_num_rows($query_run) > 0) {
                                        echo "<table class='table table-bordered table-hover'>";
                                            echo "<thead class='thead-dark'>";
                                                echo "<tr>";
                                                    echo "<th scope='col'>Sl_No</th>";
                                                    echo "<th scope='col'> Name</th>";
                                                     echo "<th scope='col'>Email</th>";
                                                    echo "<th scope='col'>Phone Number</th>";
                                                    echo "<th scope='col'>Gender</th>";
                                                    echo "<th scope='col'>Password</th>";
                                                echo "</tr>";
                                            echo "</thead>";

                                        while($row=mysqli_fetch_array($query_run))
                                        {
                                            echo "<tbody>";
                                                echo "<tr>";
                                                    echo "<td>" . $row['sl_no'] . "</td>";
                                                   
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['phn'] . "</td>";
                                                    echo "<td>" . $row['gender'] . "</td>";
                                                    echo "<td>" . $row['password'] . "</td>";

                                                echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        echo "</table>";
                                        mysqli_free_result($query_run);
                                    }
                                    
                                    else
                                    {
                                        echo "0 ressults";
                                    }
                                }
                                else{
                                    echo "ERROR: Could not able to execute ";
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
