<?php if($details["user_type"] == "Teacher"){ ?>
  <!-- Header -->
  <header class="w3-container" style="padding-top:5px;">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fas fa-book-reader w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Assignments<br><span class="w3-small">Total of Assigments Distribute</span></h4>
        
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fas fa-book-reader w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Quizes <br><span class="w3-small">Total of Quizzes  Distribute</span></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fas fa-book-reader w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Exams <br><span class="w3-small">Total of Exams Distribute</span></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>4</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Students <br><span class="w3-small">Total of Students</span></h4>
      </div>
    </div>
    <div class="w3-col m12 w3-margin-top">
     <h4><i class="far fa-bell"></i> Feeds</h4>
      <table class="w3-table">
        <tr class="w3-dark-grey">
            <th>Date</th>
            <th>Details</th>
            <th>Events</th>
            <th></th>
        </tr>
        <?php 
          $feed = feeds("ALL", "ALL", "ALL");
          $count = mysqli_num_rows($feed);
          if($count != 0 ){
            while($feeds = mysqli_fetch_assoc($feed)){
        ?>
            <tr>
              <td><?php echo $feeds["date_created"]; ?></td>
              <td><?php echo $feeds["description"]; ?></td>
              <td><?php echo $feeds["event"]; ?></td>
              <td><a href="#" class="w3-btn w3-border w3-round">View</a></td>
            </tr>
        <?php 
            }
          }else{
            echo "<tr><td colspan='4' class='w3-center'>0 Feeds</td></tr>";
          }
        ?>
      </table>
    </div>
  </div>


<?php
   }else{ 
    //==============================>
   //======== STUDENT DIV ==========> 
  //================================>
  $feed = feeds($details["course"], $details["year"], $details["section"],  1);
  $count = mysqli_num_rows($feed);

?>
  <header class="w3-top w3-white" style="margin-top: 40px;">
    <h5><button readonly class="w3-hover-none w3-btn">
    (<?php echo $count; ?>)Feeds
    <i class="far fa-bell"></i>
    <?php if($details["notify"] != 0){ ?>
    <span class="w3-badge w3-right w3-small w3-green">
    <?php echo $details["notify"]; ?>
    </span>
    <?php } ?>
    </button> 
    </h5>
  </header>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px;margin-top: 50px;">
      <div class="w3-col m9">
        <?php
          while($feeds = mysqli_fetch_assoc($feed)){
            $prof_details = user_search($feeds["userid_created"]);
            $prof_name = $prof_details["fname"]." ".$prof_details["mname"][0].". ".$prof_details["lname"];
            if(in_array($feeds["trackid"], $notify_trackid)){
                $icon = '<i class="fa fa-bell w3-text-green w3-medium"></i>';
                $bg = "w3-card";
            }else{
                $icon = "";
                $bg = "w3-border";
            }
        ?>
          <div class="w3-container w3-white w3-round w3-margin <?php echo $bg; ?>"><br>
            <img src="img/teacher.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
            <span class="w3-right w3-opacity"><?php echo date("F j, Y, g:i a", strtotime($feeds["date_created"])); ?></span>
            <h4 style="line-height: 20px;">
                Prof. <?php echo $prof_name; ?> <?php echo $icon; ?>
                <br><span class="w3-small"><i class="fa fa-book"></i> <?php echo $feeds["subject"]; ?></span>
                <br><span class="w3-small"><i class="fa fa-flag-o"></i> <?php echo $feeds["event"]; ?></span>
            </h4>
            <hr class="w3-clear">
            <p><?php echo $feeds["description"]; ?></p>
            <a href="#" class="w3-button w3-border w3-round w3-margin-bottom">View <i class="fa fa-angle-double-right"></i></a> 
          </div>
          <?php } ?>
      </div>
      <div class="w3-col m3 w3-center w3-top" style="right: -30px;top: 100px;">
          <img src="img/CS.png" style="width:100%;max-width:200px;" alt="Google Regional Map">
          <h5>College Of Science</h5>
      </div>
    </div>
  </div>
<?php 
} 
?>
