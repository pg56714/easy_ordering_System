<?php
header('Content-type: text/html; charset=utf-8');
require_once "inc/class/Car.class.php";

session_start();

$Cart = new Cart();


$sn = $_GET["sn"];
$num = $_GET['num'];

if(!is_numeric($num))
$num = 1;
if(isset($sn) && strlen(trim($sn))>0 && is_numeric($sn)){

	$Cart->updateItem($sn,$num);
	//修改$sn的數量
}

?>