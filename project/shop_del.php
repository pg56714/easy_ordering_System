<?php session_start();?>
<?php
	include "connect.php";
	$res_sel=mysqli_query($conn,"SELECT * FROM `shop` where `shop_id`='$_POST[id]'");
	$res=mysqli_fetch_assoc($res_sel);
	
	if($_POST["id"]!=""){

		mysqli_query($conn,"DELETE FROM `shop` WHERE `shop_id`='$res[shop_id]'");
		
		echo "<script>alert('刪除成功');location.href='shop_search.php';</script>";
	}else{
		echo "<script>alert('刪除失敗');location.href='shop_search.php';</script>";
	}
?>