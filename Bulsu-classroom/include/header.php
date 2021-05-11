<?php 
session_start();
if(empty($_GET["page"])){
    if(!empty($_SESSION['userid'])){
        echo "<script>window.open('?page=home', '_self')</script>";
    }
    $pages = "- login";
}else if($_GET["page"] == "login" || $_GET["page"] == "register"){
    if(!empty($_SESSION['userid'])){
        echo "<script>window.open('?page=home', '_self')</script>";
    }
    $page = $_GET["page"];
    $pages = "- $page";
}else{
    if(empty($_SESSION['userid'])){
    echo "<script>window.open('?page=login', '_self')</script>";
    }else{
    $userid = $_SESSION["userid"];
    include("functions/global-functions.php");
    $details = user_details();
    $page = $_GET["page"];
    $pages = "- $page";
    $notify_trackid = explode(",",$details["notify_trackid"]);
    //print_r($notify_trackid);
    }
}
?>
<!DOCTYPE html>
<html>
<title>Bulsu Classroom <?php echo $pages; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<body>
