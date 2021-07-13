<?php 
    $page_title="homepage";
    include('include/header.php');
    include('include/navbar.php'); 
?>


<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="pasta.jpg" alt="Los Angeles" width="850" height="478">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="caesar.jpg" alt="Chicago" width="850" height="478">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="git.jpg" alt="New York" width="850" height="478">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
        <div class="row">
  <div class="col-sm-4 container-fluid card" style="padding-left:0 padding-bottom=0">
    <div class="card-body">
      <h4 class="card-title  " ><u>INSTITUTIONAL VISION</u></h4>
      <p class="card-text" style="text-align:justify ">To be recognized nationally as a premier institution producing 
      qualified engineers/professionals with research 
      skills by the year 2025.</p>
    </div>   
  </div>
  
  <div class="col-sm-4 container" id="about" >
    <h4><u>About TINT</u></h4>
    <p> Techno International New Town (Formerly known as Techno India College of Technology), Approved by All
     India Council for Technical Education (AICTE) and Affiliated to Maulana Abul Kalam Azad University of 
     Technology, West Bengal, India, is one of the best colleges of the Techno India Group. It started its 
     journey in the year of 2005. The college is the logical development and the rational conclusion of the 
     mission and the vision of the Techno India Group which is one of the largest knowledge management groups in India.</p>
  </div>
  <div class="col-sm-4 container-fluid card">
    <div class="card-body">
      <h4 class="card-title  " style="border-bottom:1px solid"><u>INSTITUTIONAL MISSION</u></h4>
      <p class="card-text" style="text-align:justify ">1. To provide high quality technical 
      education and research opportunities to meet the needs of the industry, academia and society.<br><br>
      2. To inculcate in the students ethical values, social responsibility, professionalism such that they 
      work for positive growth of the nation.<br><br>
      3. To provide the state-of-the-art learning ambience and R & D opportunities to aspiring engineers with 
      capability to become successful entrepreneurs. 
      </p>
    </div>   
  </div>
</div>
        </div>
    </div>
</div>


<?php include('include/footer.php'); ?>
