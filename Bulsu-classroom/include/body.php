<?php 
if(isset($_GET["page"])){
    $page = $_GET["page"];
    if($page == "login"){
        include("page/login.php");
    }else if($page == "register"){
        include("page/register.php");
    }else if($page == "home"){
        include("page/home.php");
    }else if($page == "anouncements"){
        include("page/anouncements.php");
    }else if($page == "student-list"){
        include("page/studentlist.php");
    }else if($page == "student-status"){
        include("page/studentstatus.php");
    }else if($page == "assignments"){
        include("page/assignments.php");
    }else if($page == "quizes"){
        include("page/quizes.php");
    }else if($page == "exams"){
        include("page/exams.php");
    }else if($page == "grades"){
        include("page/grades.php");
    }else if($page == ""){
        include("page/login.php");
    }
}else{
    echo "<script>window.open('?page=login', '_self')</script>";
}
?>
