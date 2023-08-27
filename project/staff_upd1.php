<?php session_start();?>
<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	$upd=mysqli_query($conn,"update `restaurant` set `res_name`='$_POST[res_name]' WHERE `res_id` = '$_POST[id]';");	
	
	
	echo "<script>alert('修改成功');location.href='staff.php';</script>";
	
?>