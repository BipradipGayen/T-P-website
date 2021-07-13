<div class="bg-dark">
    <?php if(!isset($_SESSION)) { 
                session_start(); 
            } 
    ?> 

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark ">    
                    <div class="container-fluid">   
                        <a class="navbar-brand" href="https://tint.edu.in/" target="_blank" class="img-thumbnail">
                            <img src="tintlogo.jpg" alt="logo" style="width:40px">&nbsp;<span>Department of Information Technology</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>   
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link "  href="index.php">Home</a>
                                </li>
                                


                            <?php if(!isset($_SESSION['authenticated']) && !isset($_SESSION['authenticated_admin'])): ?>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Register
                                    </a>
                                    <div class="dropdown-menu bg-info " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item " href="register.php">Student</a>
                                        <a class="dropdown-item " href="adminregister.php">Admin</a>
                                    
                                    </div>
                                </li>
                               
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Log In
                                    </a>
                                    <div class="dropdown-menu bg-info " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item " href="login.php">Student</a>
                                        <a class="dropdown-item " href="adminlogin.php">Admin</a>
                                    
                                    </div>
                                </li>

                            <?php endif ?>
                            



                             <?php if(isset($_SESSION['authenticated']) && !isset($_SESSION['authenticated_admin'])): ?>
                                
                                
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Some Work
                                    </a>
                                    <div class="dropdown-menu bg-info " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item " href="">View Stuff</a>
                                     
                                        <a class="dropdown-item " href="companyregister.php">Register Events</a>
                                        <a class="dropdown-item " href="">Add Questions</a>

                                    
                                    </div>
                                </li>

                                
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         My Account
                                    </a>
                                    <div class="dropdown-menu bg-info " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item " href="dashboard.php">Edit Details</a>
                                        <a class="dropdown-item " href="logout.php">Log Out</a>
                                    
                                    </div>
                                </li>


                                
                                    
                                   
                            <?php endif ?>    

                            
                            <?php if(isset($_SESSION['authenticated_admin']) && !isset($_SESSION['authenticated'])): ?>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Some Work
                                    </a>
                                    <div class="dropdown-menu bg-info " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item " href="page.php">View Stuff</a>
                                        <a class="dropdown-item " href="adminviewstuff.php">View Stuff 2</a>
                                        <a class="dropdown-item " href="company.php">Add Company</a>
                                        <a class="dropdown-item " href="">Add Events</a>
                                    
                                    </div>
                                </li>

                                
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         My Account 
                                    </a>
                                    <div class="dropdown-menu bg-info " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item " href="adminaccount.php">Edit Details</a>
                                        <a class="dropdown-item " href="adminlogout.php">Log Out</a>
                                    
                                    </div>
                                </li>
                                    
                                   
                            <?php endif ?>    

                        </ul>
                        
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>
</div>
