<?php 
// Create connection
$conn = mysqli_connect("localhost","root", "");
mysqli_select_db($conn,"bulsuclassroom");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>