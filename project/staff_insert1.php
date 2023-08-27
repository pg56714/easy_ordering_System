<?php session_start();?>
<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	$upd=mysqli_query($conn,"insert into `restaurant` (`res_name`) values ('$_POST[res_name]')");
	
	
	echo "<script>alert('新增成功');location.href='staff.php';</script>";
 
?>