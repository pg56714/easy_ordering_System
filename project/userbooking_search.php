<?php session_start(); require"name.php";?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <head>
    <title>北商線上點餐系統</title>
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



		<style>
			
			.sm:hover{
                      box-shadow: 0 6px 8px 0 
            }
           .input{
					  padding:4px 12px; 
					  background:#F0F0F0;
					  border:0 none;
					  cursor:pointer;
					  -webkit-border-radius: 5px;
					  border-radius: 5px; 
            }
			.t1{
					  font:30px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
		    }
			
						.fancytable{border:2px;width:100%;border-collapse:collapse;color:#fff;}
			.fancytable td{border:1px solid #504d9a; color:#555555;text-align:center;line-height:28px;font-weight:bold;font-size:18px;}
			.headerrow{ background-color:#6c85b5;font-size: large;border: 1px solid #504d9a;}
			.headerrow td{ color:#000000; text-align:center;font-family: "微軟正黑體";}
			.datarowodd td{background-color:#FFFFFF;}
			.dataroweven td{ background-color:#efefef;}
			.datarowodd td{background-color:#ffffff;font-family: "微軟正黑體";}
			.dataroweven td{ background-color:#efefef;font-family: "微軟正黑體";}
			
			.w3-sidebar {width: 140px;background: #222;height: 100%;}
			table{
				font-size:28px;font-family:serif;
			}
			
			.show{
				display: none;  
				position: absolute;  
				top: 20%;  
				left: 25%;  
				width: 50%;  
				height: 40%;  
				padding: 8px;  
				border: 8px solid #a1a4c5; 
				position:fixed;  
				background-color: #DDDDDD;   
				z-index:1002;  
				overflow: auto;
				//cursor: pointer; 
				//background-image:url(image/cc.jpg);
				background-size:100% 100%
			}
			.bg{
				display: none; 
				position: absolute;
				top: 0%;
				left: 0%;
				width: 200%;
				height: 200%;
				background-color: black;
				z-index:1001;
				-moz-opacity: 0.7;
				opacity:.70;
				filter: alpha(opacity=70);
			}
			#mytable {
	width: 90%;
	padding: 0;
	margin: 0;
}

caption {
	padding: 0 0 5px 0;
	width: 80%;	 
	font: italic 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	text-align: right;
}

th {
	font: bold 26px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #4f6b72;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: center;
	padding: 6px 6px 6px 12px;
	background: #CAE8EA url(images/bg_header.jpg) no-repeat;
}

th.nobg {
	border-top: 0;
	border-left: 0;
	border-right: 1px solid #C1DAD7;
	background: none;
}

td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	padding: 6px 6px 6px 12px;
	color: #4f6b72;
	text-align: center;
}


td.alt {
	background: #F5FAFA;
	color: #797268;
}

th.spec {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #fff url(images/bullet1.gif) no-repeat;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
}

th.specalt {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #f5fafa url(images/bullet2.gif) no-repeat;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #797268;
}
		</style>
        <script src="js/jquery-3.1.1.min.js"></script>
		<script>
			function page(){
				var p=document.getElementById("page").value;
				aa(p);
			}
			function sel(id){
				$.ajax({
					url: 'order_booking.php',
					type: 'post',
					data:{a:id},
					success: function(result){
						$("#ext_upd").html(result);
						document.getElementById("ext_upd").style.display = 'block';
						document.getElementById("bg").style.display = 'block';
					}
				});
			}
            function hide_extension(){
			    document.getElementById("bg").style.display = 'none';
			    document.getElementById("ext_upd").style.display = 'none';
		    }
		</script>
    </head>

    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">北商線上點餐系統</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
						<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"href="logout.php">登出系統</a></li>
					    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" ><?php include"name.php" ; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead bg-white">
        <div>   
            <div class="main">
                <center>
                    <div id="bg" class='bg' onclick='hide_extension();'></div>
					<div id="ext_upd" style="display: none;" class='show'></div>
                        <section  id="banner">
							
							<?php

								include "connect.php";

                                $select = "SELECT * FROM `master_list` as mas left join `restaurant` as res on mas.res_id = res.res_id where mas.state != 3 and mas.state != 4 and mas.email = '$email' GROUP BY mas.mas_id order by mas.state,mas.date,mas.time asc";
                                
								//echo $select;
                                $ret=mysqli_query($conn,$select);
                                $num=mysqli_num_rows($ret);
                                if($num=='0'){
                                    echo "<font style='color:red; Font-size:48px;font-family:微軟正黑體 Light;text-shadow: rgb(136, 136, 136) 2px 2px 2px;'>無此訂單!</font>";
                                }else{
                                                
                                    echo"
                                        <table align='center'  id='mytable' border='2'>";
                                            
                                    echo "
                                        <tr>
											<th>訂單編號</th>
											<th>下單日期</th>
											<th>下單時間</th>
											<th>狀態</th>
											<th>訂單明細</th>
                                        </tr>";
                                            
                                    While($row=mysqli_fetch_assoc($ret)){
                                        echo"<tr>
											<td>$row[mas_id]</td>
											<td>$row[date]</td>
											<td>$row[time]</td>
											<td align='center'>";

											if($row["state"]==0){ 

												echo "<font style='color:#ff9900;'>待確認</font>"; 

											}elseif($row["state"]==1){ 

												echo "<font style='color:#ff9900;'>餐點製作中</font>";

											}elseif($row["state"]==2){

												echo "<font style='color:#ff9900;'>餐點已製作完成，顧客請取餐</font>";

											}

											echo"</td>
											<td>
												<input type='button' class='btn btn-outline-primary btn-lg' value='訂單明細' onclick='sel($row[mas_id]);'></input>
											</td>
										</tr>";
                                    };
                                            
                                    echo"</table></br>";
                                }
							?>
                </center>
            </div>
        </div>
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
