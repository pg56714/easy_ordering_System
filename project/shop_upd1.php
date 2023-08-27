<?php session_start();?>
<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	$upd=mysqli_query($conn,"update `shop` set `dollar`='$_POST[dollar]', `res_id`='$_POST[res_id]'  WHERE `shop_id` = '$_POST[id]';");	
	
	
	echo "<script>alert('修改成功');location.href='shop_search.php';</script>";
	
?>