<?php
header('Content-type: text/html; charset=utf-8');
require_once "inc/class/Car.class.php";
//request.getHeader("referer");
session_start();

$Cart = new Cart();


$sn = $_GET["sn"];


if(isset($sn) && strlen(trim($sn))>0 && is_numeric($sn)){

	$Cart->removeItem($sn);
	//echo '刪除成功!';
}

?>