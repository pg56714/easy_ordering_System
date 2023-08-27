<?php session_start();?>
<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	$upd=mysqli_query($conn,"update `master_list` set `state`='$_POST[state]', `res_id`='$_POST[res_id]'  WHERE `mas_id` = '$_POST[id]';");	
	
	
	echo "<script>alert('修改成功');location.href='restaurant_search.html';</script>";
	
?>