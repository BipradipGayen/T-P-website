<?php 
    $page_title="homepage";
    include('include/header.php');
    include('include/navbar.php'); 
?>

<div class="container">
<div id="demo" class="carousel slide" style="position:relative;
            width:1000px;
            height:500px;
            margin-left:auto;
            margin-right:auto;
            margin-bottom:30px;
            padding:50px;"data-ride="carousel">
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
</div> 
<div class="py-5">
    <div class="container">
        <div class="row">
        <div class="row">
  <div class="col-sm-4 container-fluid card" style="padding-left:0 padding-bottom=0">
    <div class="card-body">
      <h4 class="card-title  " ><u>DEPARTMENTAL VISION</u></h4>
      <p class="card-text" style="text-align:justify ">To attract world recognition in education, innovation and research 
      in the field of Information Technology to meet the growing demands of software industry 
      and society in a broader sense.</p>
    </div>   
  </div>
  
  <div class="col-sm-4 container"  >
    <h4 class="text-center"><u>About TINT-IT</u></h4>
    <p> Information Technology is one of the most prestigious departments in Techno International NewTown.
       A perfect blend of research and industry experienced faculties enrich this department that results in the
        overall growth of the department. Faculties and students are involved in multidisciplinary cutting-edge researches 
        and as a result this department has a notable number of publications in eminent international journals. The students 
        of the IT department are consistently setting a good record in placement activities. Students get offer from the multiple reputed MNCs with attractive pay packages.</p>
  </div>
  <div class="col-sm-4 container-fluid card">
    <div class="card-body">
      <h4 class="card-title  " style="border-bottom:1px solid"><u>DEPARTMENTAL MISSION</u></h4>
      <p class="card-text" style="text-align:justify ">1. To translate young students into knowledgeable and skillful
       information technology professionals for the growth of IT industry.<br><br>
      2. To provide best in class academic ambience and facilities to generate, translate, practice and innovate Information Technology knowledge in order 
      to develop futuristic applications for growth of varied sectors of society.<br><br>
      3. To explore possibilities for the development of industry-academia relationships with global industry leaders.
      <br><br>4. To mould the students by inculcating the spirit of ethical values contributing to the societal ethics.
      </p>
    </div>   
  </div>
</div>
        </div>
    </div>
</div>


<?php include('include/footer.php'); ?>
