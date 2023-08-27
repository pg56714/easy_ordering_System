<?php
$server = "localhost"; 
$user = "root";        
$password = "";
$db = "restaurant";
   
$conn = mysqli_connect($server,$user,$password,$db);
if (!$conn) {
    die("連線失敗" . mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");
?>
