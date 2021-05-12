<?php 
if($_GET["page"]== "login" || $_GET["page"] == "register" || empty($_GET["page"])){
?>
<nav class="w3-sidebar w3-bar-block w3-light-grey w3-animate-right w3-top  w3-large bulsu-sidebar" id="bulsu-sidebar">
  <a href="javascript:void()" onclick="bulsu_closed()" class="w3-bar-item w3-hover-red w3-red w3-button w3-center w3-padding-16"><i class="fa fa-angle-double-right"></i></a> 
  <a href="?page=register" onclick="bulsu_closed()" style="font-weight: 100;" class="w3-bar-item w3-button w3-padding-16"><i class="fas fa-file-signature"></i>&nbsp;&nbsp;Register</a> 
  <a href="#" onclick="bulsu_closed()" style="font-weight: 100;" class="w3-bar-item w3-button w3-padding-16"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;About Us</a> 
  <a href="#about" onclick="bulsu_closed()" style="font-weight: 100;" class="w3-bar-item w3-button w3-padding-16"><i class="fas fa-phone-square-alt"></i>&nbsp;&nbsp;Contact Us</a> 
  <a href="#contact" onclick="bulsu_closed()" style="font-weight: 100;" class="w3-bar-item w3-button w3-padding-16"><i class="fas fa-question-circle"></i>&nbsp;&nbsp;Help</a>
</nav>

<header class="w3-container w3-top w3-xlarge w3-padding front-header">
    <div class="w3-row">
        <div class="w3-col m1 w3-col s3">
            <img class="logo" src="img/cs.png">
        </div>
        <div class="w3-col m9 w3-col s7">
            <h2>College of Science Classroom<br>
            <span>Bulacan State University</span>
            </h2>
        </div>
        <div class="w3-col m2 w3-col s2">
        <a href="javascript:void(0)" class="w3-right w3-btn w3-text-white menu-icon" onclick="bulsu_open()">☰</a>
        </div>
    </div>
</header>
<?php 
    }else{
?>
<div class="w3-bar w3-top w3-text-white w3-large" style="z-index:3;background-color: #366e29!important;">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="bulsu_open();"><i class="fa fa-bars"></i> Bulsu Classroom</button>
  <span class="w3-bar-item w3-left w3-hide-small w3-hide-medium">CS Classroom</span>
  <span class="w3-bar-item w3-right">
      <a class="w3-btn w3-hover-none w3-medium"  id="logout" style="padding:0" onclick="logout()" title="logout"><i class="fas fa-lock fa-fw"></i>  Logout</a>
    </span>
</div>

<nav class="w3-sidebar w3-collapse w3-white w3-card sidebar" id="bulsu-sidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    <?php if($details["user_type"] == "Student"){ ?>
      <img src="img/user.png" class="w3-circle w3-margin-right" style="max-width: 60px;">
      <?php }else{ ?>
        <img src="img/teacher.png" class="w3-circle w3-margin-right" style="max-width: 60px;">
      <?php } ?>
    </div>
    <div class="w3-col s8 w3-bar">
     <span>Welcome, <strong><?php echo $details["fname"]; ?></strong></span><br>
     <span class="id"><i class="fa fa-user"></i> <?php echo $details["user_type"]; ?></span><br>
     <span class="id">ID: <?php echo $details["userid"]; ?></span>

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
  <?php if($details["user_type"] == "Student"){ ?>
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="bulsu_closed()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp;&nbsp;Close Menu</a>
    <a href="?page=home" class="w3-bar-item w3-button w3-padding <?php if($page=="home"){ echo"w3-light-grey";} ?>"><i class="fa fa-home fa-fw"></i>&nbsp;&nbsp;Home</a>
    <a href="?page=assignments" class="w3-bar-item w3-button w3-padding <?php if($page == "assignments"){ echo"w3-light-grey";} ?>"><i class="far fa-bell fa-fw w3-text-blue"></i>&nbsp;&nbsp;Assignments</a>
    <a href="?page=quizes" class="w3-bar-item w3-button w3-padding <?php if($page == "quizes"){ echo"w3-light-grey";} ?>"><i class="far fa-bell fa-fw w3-text-red"></i>&nbsp;&nbsp;Quizes</a>
    <a href="?page=exams" class="w3-bar-item w3-button w3-padding <?php if($page == "exams"){ echo"w3-light-grey";} ?>"><i class="far fa-bell fa-fw w3-text-khaki"></i>&nbsp;&nbsp;Exams</a>
    <a href="?page=submitted" class="w3-bar-item w3-button w3-padding <?php if($page == "grades"){ echo"w3-light-grey";} ?>"><i class="fas fa-archive fa-fw"></i>&nbsp;&nbsp;Submitted</a>
    <a href="?page=settings" class="w3-bar-item w3-button w3-padding <?php if($page == ""){ echo"w3-light-grey";} ?>"><i class="fa fa-cog fa-fw"></i>&nbsp;&nbsp;Settings</a><br><br>
  <?php }else{ ?>
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="bulsu_closed()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp;&nbsp;Close Menu</a>
    <a href="?page=home" class="w3-bar-item w3-button w3-padding <?php if($page=="home"){ echo"w3-light-grey";} ?>"><i class="fa fa-home fa-fw"></i>&nbsp;&nbsp;Home</a>
    <a href="?page=anouncements" class="w3-bar-item w3-button w3-padding <?php if($page == "anouncements"){ echo"w3-light-grey";} ?>"><i class="far fa-bell fa-fw"></i>&nbsp;&nbsp;Anouncements</a>
    <a href="?page=student-list" class="w3-bar-item w3-button w3-padding <?php if($page == "student-list"){ echo"w3-light-grey";} ?>"><i class="fas fa-users fa-fw"></i>&nbsp;&nbsp;Students List</a>
    <a href="?page=student-status" class="w3-bar-item w3-button w3-padding <?php if($page == "student-status"){ echo"w3-light-grey";} ?>"><i class="fas fa-user-alt fa-fw"></i>&nbsp;&nbsp;Students Status</a>
    <a href="?page=assignments" class="w3-bar-item w3-button w3-padding <?php if($page == "assignments"){ echo"w3-light-grey";} ?>"><i class="fas fa-file-alt fa-fw w3-text-red"></i>&nbsp;&nbsp;List of Assignments</a>
    <a href="?page=quizes" class="w3-bar-item w3-button w3-padding <?php if($page == "quizes"){ echo"w3-light-grey";} ?>"><i class="fas fa-file-alt fa-fw w3-text-blue"></i>&nbsp;&nbsp;List of Quizes</a>
    <a href="?page=exams" class="w3-bar-item w3-button w3-padding <?php if($page == "exams"){ echo"w3-light-grey";} ?>"><i class="fas fa-file-alt fa-fw w3-text-teal"></i>&nbsp;&nbsp;List of Exams</a>
    <a href="?page=files" class="w3-bar-item w3-button w3-padding <?php if($page == "grades"){ echo"w3-light-grey";} ?>"><i class="fas fa-archive fa-fw"></i>&nbsp;&nbsp;List of Files</a>

    <a href="#" class="w3-bar-item w3-button w3-padding <?php if($page == ""){ echo"w3-light-grey";} ?>"><i class="fa fa-cog fa-fw"></i>&nbsp;&nbsp;Settings</a><br><br>
    <a href="https://meet.google.com/" target="_blank" class="w3-bar-item w3-button w3-padding <?php if($page == ""){ echo"w3-light-grey";} ?>"><i class="fas fa-video"></i>&nbsp;&nbsp;Gmeet</a>
  <?php } ?>
  </div>
</nav>
<div class="w3-main w3-animate-opacity" id="main">
<?php } ?>
<div class="w3-overlay w3-animate-opacity" onclick="bulsu_closed()" style="cursor:pointer" title="close side menu" id="bulsu-overlay"></div>
