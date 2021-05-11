<?php 
include("include/connections.php");
//RETRIEVE FUNCTIONS


function assignments($course, $year, $sections, $type=0){
    global $conn, $userid;
  
    if($type){
        $sql = "`course`='$course' AND `year`='$year' AND `section`='$sections' AND `event`='Assignement'";
    }else{
        $sql = "`userid_created`='$userid' AND `event`='Assignement'";
    }

    $no_of_records_per_page = 2;
    $offset = ($page_to-1) * $no_of_records_per_page;

    $total_pages_sql = mysqli_query($conn, "SELECT COUNT(*) FROM student_track WHERE $sql ");
    $total_rows = mysqli_fetch_array($total_pages_sql)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $db = mysqli_query($conn, "SELECT * FROM student_track WHERE $sql ORDER by date_created DESC LIMIT $offset, $no_of_records_per_page");
 
    return array($db, $total_pages);
}
function assignments_count($course, $year, $sections, $type=0){
    if($type){
        $sql = "`course`='$course' AND `year`='$year' AND `section`='$sections' AND `event`='Assignement'";
    }else{
        $sql = "`userid_created`='$userid' AND `event`='Assignement'";
    }
    $db = mysqli_query($conn, "SELECT COUNT(year),COUNT(section) FROM student_track WHERE $sql GROUP BY Country");
    return array($db);
}

function anouncements($page_to){
    global $conn, $userid;
  
    $no_of_records_per_page = 2;
    $offset = ($page_to-1) * $no_of_records_per_page;

    $total_pages_sql = mysqli_query($conn, "SELECT COUNT(*) FROM student_track WHERE `userid_created`='$userid' AND `event`='Anouncements' ");
    $total_rows = mysqli_fetch_array($total_pages_sql)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $db = mysqli_query($conn, "SELECT * FROM student_track WHERE userid_created='$userid' AND `event`='Anouncements' ORDER by date_created DESC LIMIT $offset, $no_of_records_per_page");
 
    return array($db, $total_pages);
}

function feeds($course, $year, $sections, $type=0){
    global $conn, $userid;
    
    if($type){
        $sql = "`course`='$course' AND `year`='$year' AND `section`='$sections'";
    }else{
        $sql = "`userid_created`='$userid'";
    }
    $db = mysqli_query($conn, "SELECT * FROM student_track WHERE $sql ORDER by date_created DESC");

    return $db;
}

function user_search($value){
    global $conn, $userid;
    $db = mysqli_query($conn, "SELECT * FROM login WHERE  userid='$value'");
    $row = mysqli_fetch_assoc($db);
    return $row;
}

function user_details(){
    global $conn, $userid;
    $db = mysqli_query($conn, "SELECT * FROM login WHERE  userid='$userid'");
    $row = mysqli_fetch_assoc($db);
    return $row;
}

function sections_list(){
    global $conn, $userid;
    $db = mysqli_query($conn, "SELECT * FROM school_information WHERE  `type`='Section'");
    return $db;
}
function year_list(){
    global $conn, $userid;
    $db = mysqli_query($conn, "SELECT * FROM school_information WHERE  `type`='Year'");
    return $db;
}

//OTHERS FUNCTIONS
function paginations($url, $page_to, $total_pages){
    $paginations = "";
    if($page_to <= 1){ $disabled =  'w3-opacity'; }else{$disabled = "";}
    if($page_to >= $total_pages){ $disabled2 = 'w3-opacity'; }else{$disabled2 = "";}
    if($page_to <= 1){ $prev = '#'; } else { $prev = "?page=anouncements&page_to=".($page_to - 1); }
    if($page_to >= $total_pages){  $next = '#'; } else { $next = "?page=anouncements&page_to=".($page_to + 1);}
    $paginations .= "
        <div class='w3-right w3-margin-top'>
        <div class='w3-bar w3-border'>
        <a href='" . $url. "'&page_to=1' class='w3-bar-item w3-button w3-border-right'>&laquo;</a> 
        <a href='$prev' class='w3-bar-item w3-button  $disabled'>Prev</a>
        ";
    for($pages = max($page_to-1, 1); $pages<=max(1, min($total_pages,$page_to+1)); $pages++) {  
        if($page_to == $pages ){
            $paginations .= '<a class="w3-bar-item w3-button w3-dark-grey" href = "' . $url . '&page_to=' . $pages . '">' . $pages . ' </a>';
        }else{
            $paginations .= '<a class="w3-bar-item w3-button" href = "' . $url. '&page_to=' . $pages . '">' . $pages . ' </a>';
        } 
    } 
    $paginations .= "<a href='$next' class='w3-bar-item w3-button $disabled2'>Next</a>";
    $paginations .= "<a href=". $url."&page_to=".$total_pages." class='w3-bar-item w3-border-left w3-button'>&raquo;</a>";
    $paginations .="</div>";
    $paginations .="</div>";
    return $paginations;
}

function trackid(){
    global $conn;

    /*** Generate tracking ID and make sure it's not a duplicate one ***/

    /* Ticket ID can be of these chars */
    $useChars = 'AEUYBDGHJLMNPQRSTVWXZ123456789';

    /* Generate the ID */
    $trackingID  = '';
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= '-';
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= '-';
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= $useChars[mt_rand(0,29)];
    $trackingID .= $useChars[mt_rand(0,29)];

    /* Check for duplicate Tracking ID. Small chance, but on some servers... */
    $res1 = mysqli_query($conn, "SELECT `id` FROM `student_track` WHERE `trackid` = '$trackingID' LIMIT 1");

    if (mysqli_num_rows($res1) != 0){
        /* Tracking ID not unique, let's try another way */
        $trackingID .= $useChars[mt_rand(0,29)];
        $trackingID .= $useChars[mt_rand(0,29)];
        $trackingID .= $useChars[mt_rand(0,29)];
        $trackingID .= '-';
        $trackingID .= $useChars[mt_rand(0,29)];
        $trackingID .= $useChars[mt_rand(0,29)];
        $trackingID .= $useChars[mt_rand(0,29)];
        $trackingID .= '-';
        $trackingID .= substr(microtime(), -4);

        $res2 = mysqli_query($conn, "SELECT `id` FROM `student_track` WHERE `trackid` = '$trackingID' LIMIT 1");

        if (hesk_dbNumRows($res2) != 0){
            return false;
        }
    }

    return $trackingID;

} // END hesk_createID()
?>