
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>驗證帳號</title>
<script src="mod/sweetalert.js"></script>
</head>
<body>
<form action="echeck.php" method="post">
<?php
include "connect.php";

$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$check=$_POST['check'];
$echeck=$_POST['echeck'];

if ($check==$echeck)
{
	$query = "INSERT INTO `customer`(`phone`, `password`, `name`, `email`) VALUES ('$phone','$password','$name','$email')";
    $result= mysqli_query($conn, $query);
	if($result==true){
	 echo"<Script>swal('會員驗證成功！請重新登入開始訂餐','','success')</Script>";echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';

}
}

if ($check != $echeck)
{
	 echo"<Script>swal('驗證失敗，請重新註冊','','error')</Script>";echo '<meta http-equiv=REFRESH CONTENT=2;url=test.php>';
	//echo" <input type = 'button' onclick = 'history.go(-1);' style='background-color:#66FF66;' value = '返回' style=>";
	
	
}
?>



</br>
</form>
</body>
</html>