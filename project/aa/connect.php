
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "order";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
    die("連線失敗" . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>