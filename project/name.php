
<script src="mod/sweetalert.js"></script>
<head>
<style>
.t11{color:#000000;font-family:Microsoft JhengHei;font-size:26px;text-align:center; border-radius:10px;}
.t12{
	border-style:solid;border-width:1px 2px;padding:2px;
    background-color:#FFFF37;
    box-shadow: 0 2px 3px 0	;
	position:relative;
    right:-25px;
}


</style>
</head>
<?php if (!isset($_SESSION)) {session_start();}
//if(@$_SERVER['HTTP_REFERER']){
  //  echo '';
//}else{
  // echo "<script>swal('請正常操作系統!');</script><meta http-equiv=REFRESH CONTENT=2;url=index.php>";
//}
//if(!isset($_SESSION['username']))
//{
	//die("<Script>swal('請先登入再進行操作!', '請返回首頁', 'warning')</Script><meta //http-equiv=REFRESH CONTENT=2;url=index.php>");
//}
include"connect.php";



$aemail = $_SESSION['email'];
if (($aemail  == true))
{$limit = $_SESSION['email']; 

$tc = "SELECT * FROM `customer` WHERE `email` = '$limit'"; 
$tc2 = mysqli_query($conn,$tc);
$tc3 = mysqli_fetch_array($tc2); 
$name = $tc3['name'];
$email = $tc3['email'];
}


//if ($level == 'tc')
//{$Authority = "老師";}
//if ($level == 'tcall')
//{$Authority = "主任";}




echo"<font class='t11 t12'> $name 您好</font>";

?>