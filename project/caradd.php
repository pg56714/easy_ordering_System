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
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">購物車</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">登出系統</a></li>
					    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" ><?php include"name.php" ; ?></a></li>
                       
            
                      
						
                    </ul>
                </div>
            </div></nav><br/><br/><br/><br/><br/>
			
			
<form name="form" method="post" action="">
<p class = "t2">
<body style="background-color:#F5F5F5;">

<?php 
include"connect.php" ;

if (isset($_GET["x"])){
$x=$_GET["x"];}


$who = "SELECT * FROM `car` where `shop_id` = '$x' and `email`='$email'";
$who2 = mysqli_query($conn, $who);
$who3 = mysqli_num_rows($who2);

if ($who3>'0')
{
	echo"<Script>swal('此餐點已存在購物車中，前往購物車修改數量','','warning')</Script>";echo '<meta http-equiv=REFRESH CONTENT=1;url=car.php>'; 
	//$update = "UPDATE `car` SET `amount`='?' WHERE email = '$email' and shop = '$x'";
    //$update2 = mysqli_query($conn, $update);
	
}


if ($who3=='0'){
$insert = "INSERT INTO `car`(`email`, `shop_id`, `amount`) VALUES ('$email','$x','1')";
$insert2 = mysqli_query($conn, $insert);
if($insert2 == true )
	{echo"<Script>swal('已新增至購物車','','success')</Script>";echo '<meta http-equiv=REFRESH CONTENT=1;url=Product.php>'; }
if($insert2 == false )
	{echo"<Script>swal('已新增至購物車','','error')</Script>";echo '<meta http-equiv=REFRESH CONTENT=1;url=Product.php>'; }
}
?> 
</br>
</br>
</br>
</br>

</form>

<footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            郵遞區號：100  <br />
						台北市中正區濟南路一段321號
                        
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                       </i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">北商資訊股份有限公司</h4>
                        <p class="lead mb-0">
                            創立於2021年，致力協助在地攤販與餐廳，建立整合資訊系統。
                       
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>北商資訊股份有限公司</small></div>
        </div>
</body>
</html>