<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
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
#mytable {
	width: 80%;
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
        
        <!-- Masthead-->
    <body>
        <header>
            <center>
                <div id="bg" class='bg' onclick='hide_extension();'></div>
					<div id="ext_upd" style="display: none;" class='show'></div>
                        <section  id="banner">
							
							<?php
								include "connect.php";
                                $name=$_GET['name_search'];
								$state=$_GET['state_search'];
                                $select = "SELECT * FROM `master_list` as mas inner join `restaurant` as res on mas.res_id = res.res_id where mas.state != 0 and mas.state != 1 and mas.state != 2";
                                if($name!=""){
                                    $select.=" and mas.email LIKE '%".$name."%'";
                                }
								if($state!=""){
                                    $select.=" and mas.state = '$state'";
                                }
                                $select.=" GROUP BY mas.mas_id order by mas.state,mas.date,mas.time asc";
                                //echo $select;
                                $ret=mysqli_query($conn,$select);
                                $num=mysqli_num_rows($ret);
                                if($num=='0'){
                                    echo "<font style='color:red; Font-size:48px;font-family:微軟正黑體 Light;text-shadow: rgb(136, 136, 136) 2px 2px 2px;'>無此訂單!</font>";
                                }else{
                                    $data_nums = mysqli_num_rows($ret); //統計總比數
                                    $per = 10; //每頁顯示項目數量
                                    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
                                    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                                        $page=1; //則在此設定起始頁數
                                    } else {
                                        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
                                    }
                                    $start = ($page-1)*$per; //每一頁開始的資料序號       
                                    $ret = mysqli_query($conn,$select.' LIMIT '.$start.', '.$per) or die("Error");
                                                
                                    echo"
                                        <table  width='80%'  id='mytable' border='2'>";
                                            
                                    echo "
                                        <tr align='center'>
											<th>訂單編號</th>
											<th>負責員工</th>
											<th>顧客信箱(帳號)</th>
											<th>下單日期</th>
											<th>下單時間</th>
											<th>狀態</th>
											<th>訂單明細</th>
                                        </tr>";
                                            
                                    While($row=mysqli_fetch_assoc($ret)){
                                        echo"<tr align='center'>
											<td>$row[mas_id]</td>
											<td align='center'>";

											if($row["res_id"]==0){ 
												echo "<font style='color:#ff9900;'>待分配</font>"; 
											}else{ 
												echo "$row[res_id]$row[res_name]";
											}
											echo"</td>
											<td>$row[email]</td>
											<td>$row[date]</td>
											<td>$row[time]</td>
											<td align='center'>";

											if($row["state"]==3){

												echo "<font style='color:#ff9900;'>完成訂單</font>";

											}elseif($row["state"]==4){

												echo "<font style='color:#FF0000;'>店家已取消</font>";

											}

											echo"</td>
											<td>
												<input type='button' class='btn btn-outline-primary btn-lg' value='訂單明細' onclick='sel($row[mas_id]);'></input>
											</td>
										</tr>";
                                    };
                                            
                                    echo"</table></br>";
                                                
                                    //分頁頁碼
                                    echo "
                                        <div id='data_page'>
                                        <div class='select' style='width:120px;margin-top:15px;'>
                                            <select id='page' style='padding-left:30px;' class='select1' onchange='page();'>
                                        ";
                                        $q=0;
                                        for($i=1;$i<=$pages;$i++){
                                        if($i==$page){
                                            echo "<option value='$i' selected>第".$i."頁</option>";
                                        }else{
                                            echo "<option value='$i'>第".$i."頁</option>";
                                             $q=$i;
                                            }
                                        }
                                        echo "
                                            </select>
                                            </div>
                                            </div>
                                        ";
                                    echo "<font size='4px' color='#000'>共計 $data_nums 筆</font>";
                                }
							?>
                            </br>
                        </section>
            </center>
        </header>

    </body>
</html>
