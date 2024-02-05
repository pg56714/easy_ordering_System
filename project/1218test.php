<?php 
 if(isset($_POST['submit'])){
  	$search = "select `user` from register where user='$user'";
  	$res=mysql_query($search);
  	if(mysql_num_rows($res)>0){
  	echo "<script>alert('使用者名稱已經存在！')</script>";
  	}else {
    $query="insert into `register`(`id`,`user`,`password`) values (null,'".$_POST['user']."','".$_POST['password']."')";
  	if(mysql_query($query)){
  		echo '註冊成功！', header("location: user.php");
  	}else{
  		echo '失敗，請重新嘗試!',mysql_error();
  	}
  	die;
  }
  }
?>