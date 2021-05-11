<?php 
include("../include/connections.php");
session_start();
$type = $_POST["action_type"];
if($type == "add_anouncements"){ //ADD ANOUCEMENTS
    $userid = $_SESSION["userid"];

    if($_POST["year"] == "" || $_POST["section"] == "" || $_POST["subject"] == "" || $_POST["description"] == ""){
        echo "Please make sure all fields are filled in correctly.";
    }else{
        $inser_student_track = mysqli_query($conn, 'INSERT INTO `student_track`(`trackid`, `course`, `year`, `section`, `subject`, 
        `date_request`, `date_ended`, `description`, `attachments`, `event`, `status`, `userid_created`, `date_created`) 
        VALUES ("'.$_POST["trackid"].'","'.$_POST["course"].'","'.$_POST["year"].'","'.$_POST["section"].'","'.$_POST["subject"].'",
        "NONE","NONE","'.$_POST["description"].'","NONE","Anouncements","active","'.$userid.'", NOW())');
        if($inser_student_track){
            echo"Success";
        }else{
            echo "SQL ERROR - please contact the administrator.";
        }
    }

    $update = mysqli_query($conn,"UPDATE login SET notify = notify + 1,notify_trackid=',".$_POST["trackid"]."' WHERE `year`='".$_POST["year"]."' AND `section`='".$_POST["section"]."'");

    mysqli_close($conn);



}else if($type == "edit_anouncements"){ //ADD ANOUNCEMENTS
    if($_POST["year"] == "" || $_POST["section"] == "" || $_POST["subject"] == "" || $_POST["description"] == ""){
        echo "Please make sure all fields are filled in correctly.";
    }else{
    $update = mysqli_query($conn,"UPDATE student_track SET `subject`='".$_POST["subject"]."',`year`='".$_POST["year"]."',
    `section`='".$_POST["section"]."',`description`='".$_POST["description"]."' WHERE `trackid`='".$_POST["trackid"]."'");
        if($update){
            echo"Success";
        }else{
            echo "SQL ERROR - please contact the administrator.";
        }
    }
    mysqli_close($conn);

}else if($type == "delete_anouncements"){ //DELETE ANOUCEMENTS
    $delete = mysqli_query($conn,"DELETE FROM student_track WHERE `trackid`='".$_POST["trackid"]."'");
    if($delete){
        echo"Success";
    }else{
        echo "SQL ERROR - please contact the administrator.";
    }
    mysqli_close($conn);
}else if($type == "anouncements_data"){ //GET ANOUCNESMENT DATA
    $select = mysqli_query($conn,"SELECT `subject`,`year`,`section`,`description` FROM student_track WHERE trackid='".$_POST["trackid"]."' LIMIT 1");
    $row = mysqli_fetch_assoc($select);
    $data = array(
        "year"     => $row["year"],
        "section"  => $row["section"],
        "description"   => $row["description"],
        "subject"      => $row["subject"]
    );
    echo json_encode($data);
    mysqli_close($conn);

}else if($type == "login"){ //LOGIN
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    if($userid == "" AND $password ==""){
        echo "Please Enter Password and User ID";   
    }else{
        $db = mysqli_query($conn, "SELECT * FROM login WHERE userid='$userid' AND password='$password'");
        $result = mysqli_num_rows($db);
        $row = mysqli_fetch_assoc($db);

        if($result == 1){
            $_SESSION["userid"] = $userid;
            $_SESSION["password"] = $password;
            echo  "<span><span class='w3-text-red'>Success:</span> ".$row["user_type"]." Login <i class='fas fa-unlock-alt'></i></span>";
        }else{
            $db = mysqli_query($conn, "SELECT * FROM login WHERE userid='$userid'");
            $result = mysqli_num_rows($db);
            if($result == 0){
                echo "Incorect User ID";
            }else{
                $db = mysqli_query($conn, "SELECT * FROM login WHERE password='$password'");
                $result = mysqli_num_rows($db);
                if($result == 0){
                    echo "Incorect Password";
                }else{
                    echo "Incorect Password and User ID"; 
                }
            }
        
        }
        mysqli_close($conn);
    }
}else if($type == "register"){ //REGISTER
    $show_error = array();
    $fname = $_POST["fname"] or $show_error["fname"] = "Missing Field: First name";
    $mname = $_POST["mname"] or $show_error["mname"] = "Missing Field: Middle name";
    $lname = $_POST["lname"] or $show_error["lname"] = "Missing Field: Last name";
    $address = $_POST["address"] or $show_error["address"] = "Missing Field: Address";
    $gmail = $_POST["gmail"] or $show_error["gmail"] = "Missing Field: Email account";
    $contact = $_POST["contact"] or $show_error["contact"] = "Missing Field: Contact number";
    $college = $_POST["college"] or $show_error["college"] = "Missing Field: College";
    $course = $_POST["course"] or $show_error["course"] = "Missing Field: Course";
    $year = $_POST["year"] or $show_error["year"] = "Missing Field: Year";
    $section = $_POST["section"] or $show_error["section"] = "Missing Field: Section";
    $userid = $_POST["userid"] or $show_error["userid"] = "Missing Field: School ID";
    $password = $_POST["password"] or $show_error["password"] = "Missing Field: Password";
    $password2 = $_POST["password2"] or $show_error["password2"] = "Missing Field: Confirm Password";

    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname) || !preg_match("/^[a-zA-Z-' ]*$/",$fname) || !preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
        $name_validate = $show_error["name_validate"] = "Errors Field: Only letters and white space allowed <br><br>(First, Middle, Last Name)</br>";
    }
    if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        $email_validate = $show_error["email_validate"] = "Errors Field: Invalid email format";
    }
    if(!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $contact)) {
        $contact_validate = $show_error["contact_validate"] = "Errors Field: Invalid Contact Number";
    }

    $db = mysqli_query($conn, "SELECT * FROM login WHERE userid='$userid'");
    $result = mysqli_num_rows($db);
    if($result == 1){
        $schoolid_validate = $show_error["schoolid_validate"] = "DB ERROR: The College ID is already exists.";
    }
    if($password >  6){
        $password_minimum = $show_error["password_minimum"] = "Errors Field: Password strength must be <br>greater than 6 characters.";
    }
    if($password !=  $password2){
        $password2 = $show_error["password2"] = "Errors Field: Passwords do not match.";
    }

    if (count($show_error) != 0) { //SHOW ALL ERROR=> 
        foreach ($show_error as $error) {
        echo "<div class='w3-medium w3-col m6'><p class='result'><i class='fa fa-exclamation-circle w3-text-red w3-margin-right'></i> " . $error . "</p></div>\n";
        }
    }else{
        $insert_login = mysqli_query($conn, "INSERT INTO `login`(`userid`, `password`, `fname`, `mname`, `lname`, `address`, `gmail`, `contact`, `college`, `course`, `handle_course`, `year`, `section`, `status`, `user_type`,`notify`,`notify_trackid`, `date_created`) 
        VALUES ('$userid','$password','$fname','$mname','$lname','$address','$gmail','$contact','$college','$course','','$year','$section','active','Student','0','trackid',NOW())");
        if($insert_login){
            echo "Success";
        }else{
            echo "<div class='w3-medium w3-col m6'><p class='result'><i class='fa fa-exclamation-circle w3-text-red w3-margin-right'></i> SQL ERROR - please contact the administrator</p></div>\n";
        }
    }
}else if($type == "logout"){ //LOGOUT
    session_start();
    session_destroy();    
}
?>