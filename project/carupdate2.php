<?php session_start(); require"name.php";?>
<!doctype html>
<html>
<title>北商線上點餐系統</title>
<html lang="en">
<head>
<meta charset="UTF-8">
<script src="mod/sweetalert.js"></script>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="zh-tw" />
	 <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<style>
	.t2{color:black;font-family:Microsoft JhengHei;font-size:26px;text-align:center; border-radius:20px;}
	.tt{color:black;font-family:Microsoft JhengHei;font-size:40px;text-shadow: 0px 0px 4px #000000;}
	.t3{color:#003377;font-family:Microsoft JhengHei;font-size:20px;text-align:center;border-radius:8px;font-weight:bold;}
	.btn4 {
  background-color:#FFFF82;
  font-size:20px;
	.btn1 {
  background-color:#DFFFDF;
  font-size:16px;
  .th{
  padding: 5px;
  text-align: left;    
  border-top:3px #000000 solid;
  border-bottom:3px #000000 solid;
  text-align:center
}

		</style>
</head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.html">北商線上點餐系統</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
				
                    <ul class="navbar-nav ms-auto">
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Product.php">菜單</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"href="logout.php">登出系統</a></li>
					    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" ><?php include"name.php" ; ?></a></li>
                       
            
                      
						
                    </ul>
                </div>
            </div></nav><br/><br/><br/><br/><br/>
			<body style="background-color:#F5F5F5;">
<?php

     include"connect.php" ;
	 $email = $_POST['email'];
	 $x = $_POST['x'];
     $up = $_POST['up'];
     
	
	 
     $sql = "UPDATE `car` SET `amount` = '$up' WHERE `car`.`email` = '$email' AND `car`.`shop_id` = '$x'";      
     $result = mysqli_query($conn, $sql);
	 
	 if($result = true )
	{echo"<Script>swal('更新購物車成功','','success')</Script>";echo '<meta http-equiv=REFRESH CONTENT=1;url=car.php>'; }
    if($result = false )
	{echo"<Script>swal('修改失敗','','error')</Script>";echo '<meta http-equiv=REFRESH CONTENT=1;url=car.php>'; }




?>