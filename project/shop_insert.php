<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<?php
	include('connect.php');
?>
<title>店家首頁</title>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		<style>
.t2{
font:30px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
}
.input{
padding:4px 12px; 
background:white;
border:0 none;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px; 
}
.sm:hover{
box-shadow: 0 6px 8px 0 
}
</style>
    </head>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="restaurant.html">北商線上點餐系統</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="restaurant.html">首頁</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="shop_search.php">回上一頁</a></li>
						<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="logout.php">登出系統</a></li>
					</ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-white">
            <div style="width: 80%; background-color: #F5F5F5; padding: 5px; margin: 0px auto;padding: 15px;box-shadow: 5px 5px 5px 5px grey;">
                <form name="form1" method="post" enctype="multipart/form-data" action="shop_insert1.php">
					<p class='t2'>餐點名稱: <input class="input sm" type="text" id="name" name="name" required></p>
					<p class='t2'>價格: <input class="input sm" type="text" id="dollar" name="dollar" required></p>
					<p class='t2'>請插入圖片: <input class="input sm" type="file" name="uploadfile" required></p>
					<p class='t2'>請選擇員工: 
						<select class="input form-select-lg mb-3 t2" name="res_id" id="res_id"  align="center" required>
							<option value="">請選擇</option>
							<?php
								$select=mysqli_query($conn,"SELECT * FROM `restaurant`");
								while($row=mysqli_fetch_assoc($select)){
								//value抓res_id新增至另一張表
								echo "<option value='{$row['res_id']}'>{$row['res_id']}{$row['res_name']}</option>";}
							?>
						</select>
					</div></p>
					<div align="center">
					<input type="submit" name="upload" class='btn btn-outline-primary btn-lg' value="送出">
				 </div>
				 </form>
            
        </header>


		
      
        <!-- Footer-->
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

        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>北商資訊股份有限公司</small></div>
        </div>
    </body>
</html>
