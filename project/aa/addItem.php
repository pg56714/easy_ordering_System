<?php
include"connect.php" ;

header('Content-type: text/html; charset=utf-8');

require_once "inc/class/Car.class.php";

session_start();

$Cart = new Cart();

$sn = $_GET["sn"];
$num = $_GET['num'];

$shop = $_GET["x"];

//查餐點


//echo $sn;
if(!is_numeric($num))
$num = 1;
if(isset($sn) && strlen(trim($sn))>0 && is_numeric($sn)){
	$sql = "SELECT * FROM `shop` where `shop` = '$shop'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $name =$row["name"];
    $dollar =$row["dollar"];
	
	$Cart->addItem($sn, $name, $dollar, $num, "描述", "單位");

}
//加入成功後回到前一頁
$referer  = $_SERVER['HTTP_REFERER'];
if(strlen(trim($referer))==0)
$referer = "Product.php";

header("Location:$referer");
?>