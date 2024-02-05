<?php session_start();?>
<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	$res_sel=mysqli_query($conn,"SELECT * FROM `restaurant` where `res_id`='$_POST[id]'");
	$res=mysqli_fetch_assoc($res_sel);
	
	if($_POST["id"]!=""){

		mysqli_query($conn,"DELETE FROM `restaurant` WHERE `res_id`='$res[res_id]'");
		
		echo "<script>alert('刪除成功');location.href='staff.php';</script>";
	}else{
		echo "<script>alert('刪除失敗');location.href='staff.php';</script>";
	}
?>