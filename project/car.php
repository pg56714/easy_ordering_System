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
	.myclass{
        letter-spacing:5px;/*字间距*/
        color: red;
        font-weight:bold;
        font-size:46px;
    }
     
    
    @keyframes blink{
    0%{opacity: 1;}
      
    100%{opacity: 0;} 
   } 

   @-webkit-keyframes blink {
    0% { opacity: 1; }
    100% { opacity: 0; }
   }
   @-moz-keyframes blink {
    0% { opacity: 1; }
    100% { opacity: 0; }
   }
   @-ms-keyframes blink {
    0% {opacity: 1; } 
    100% { opacity: 0;}
   }
   @-o-keyframes blink {
    0% { opacity: 1; }
    100% { opacity: 0; }
   }
   
   .blink{
    color: blue;
    font-size:46px;
    animation: blink 1s linear infinite;  
   
    -webkit-animation: blink 1s linear infinite;
    -moz-animation: blink 1s linear infinite;
    -ms-animation: blink 1s linear infinite;
    -o-animation: blink 1s linear infinite;
    }

	.t2{color:black;font-family:Microsoft JhengHei;font-size:26px;text-align:center; border-radius:20px;}
	.tt{color:black;font-family:Microsoft JhengHei;font-size:40px;text-shadow: 0px 0px 4px #000000;}
	.t3{color:#003377;font-family:Microsoft JhengHei;font-size:20px;text-align:center;border-radius:8px;font-weight:bold;}
    .t4{color:#0000E3;font-family:Microsoft JhengHei;font-size:30px;text-align:center;border-radius:8px;font-weight:bold;}
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
                <a class="navbar-brand" href="index.php">北商線上點餐系統</a>
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
			
			

   <p class = "t2">
   <body style="background-color:#F5F5F5;">


 <form name="form" method="post" action="carsent.php">
<?php 
    include"connect.php" ;

    $sql = "SELECT * FROM `car` where `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $a = mysqli_num_rows($result);

    //如果購物車有商品，則顯示
    if($a>0){
		
    //抓日期,時間 
     date_default_timezone_set('Asia/Taipei');
     $date = date("Ymd");             // 20200627
	 $time = date("H:i"); 

	//訂單編號
	$masnum = $date.rand(100000,999999);
	
	
	echo"
	<input type ='hidden' name='date' value='$date'></input>
	<input type ='hidden' name='time' value='$time'></input>
	<input type ='hidden' name='masnum' value='$masnum'></input>
	";
	

    echo"<table width='80%'  align='center' class='tablehover sortable'>";
    echo"
    <thead class = 't2'>
       <tr class = 't2 sortable' valign='top'>
         <th >商品名稱</th>
         <th>照片</th>
         <th>單價</th>
         <th>數量</th>
         <th>合計</th>
         <th>功能</th>
       </tr>
    </thead>";
	
   while($row = mysqli_fetch_array($result)) {
	 
	 echo"
	   <input type ='hidden' name='shop_id[]' value='$row[shop_id]' ></input>
	   <input type ='hidden' name='amount[]' value='$row[amount]' ></input>
	   ";
       $sqli="SELECT * FROM  `shop` WHERE  `shop_id` = $row[shop_id]";
       $s = mysqli_query($conn,$sqli);
      while($ra = mysqli_fetch_array($s)){
		  
       //判斷購物車商品筆數
	   //$aaa ="SELECT car.userid,shop.shop from car 
       //LEFT JOIN shop ON car.shop=shop.shop AND car.userid='$email' GROUP BY car.userid, shop.shop HAVING count(*)>1";
       //$aaa2 = mysqli_query($conn, $aaa);
       //計算購物車商品筆數
       //$aaanum= mysqli_num_rows($aaa2); 
	   
       
        //計算金額
	    $total = $ra['dollar'] *$row['amount'] ;
	    echo"<tbody class = 't3 sortable' >";
     
		echo
		"<tr>
		   
           <td>$ra[name]</td>
           <td> 
		       <button type='button'>
		          <img src='upload/$ra[photo]' alt='無照片' width='200'     
		          height='150' onclick=location.href='./upload/$ra[photo]' >
		       </button>
		   </td>
           <td>$$ra[dollar]</td>
	       <td>$row[amount]</td>
	       <td>$total 元</td>
	       <td>
		     <input onclick=location='carupdate.php?x=$row[shop_id]' value='編輯數量' type='button' /></input>
	         <input onclick=location='cardelete.php?x=$row[id]' value='刪除餐點' type='button' /></input>
		 
		
		   </td>
		</tr>
		  
		";
	                       
   }
}	

        //合計列計算

	
		
		//查數量,總價
		$amount ="
		 select email,sum(amount) as 合計,shop_id
         from car
         where email='$email' 
         group by email ";
		 
		$amount2 = mysqli_query($conn,$amount);
		$amount3=mysqli_fetch_assoc($amount2);
		
		
	    //inner join 算合計金額
		$dollar = "SELECT sum(shop.dollar*car.amount) as 合計 FROM car INNER JOIN shop ON car.shop_id=shop.shop_id AND car.email='$email'";

		$dollar2 = mysqli_query($conn,$dollar);
		$dollar3=mysqli_fetch_assoc($dollar2);
		
		
		
		
        echo"
		<tr>
		     <td COLSPAN=6>
			    <center>		     -------------------------------------------------------------------------------------------------------------------- 
			   </center>
			 </td>
		</tr>
	    <tr>";
		     //跨欄置中
	    echo"
         	 <td COLSPAN=2>
			 <center>您的餐點預訂清單如上，共 <font color='red'>$a </font>種餐點
			 </center>
			 </td>
			 <td>合計共:</td>
			 <td> $amount3[合計]份</td>
			 <td> $dollar3[合計]元</td>
             <td>
			 
			 <button class='btn4 btn t2 btn-outline-danger btn-lg' type='submit' onClick=\"if(confirm('確定要送出訂單嗎？')) return';else return false;\">送出訂單</button>
			
			 
			 </td>
		</tr>
	  </table>
	   
	   
	   <br/><br/>
	   

	";
	}
	//購物車沒商品的話
	if($a<1){
		
	echo"
	<table width='80%'  align='center' class='tablehover sortable'>
	  <tbody class = 'blink' >
	    <tr>
	      <td align='center'>
		    您的購物車目前沒有餐點，心動不如馬上選購！
		  </td>
	    </tr>
	</table>
	<br/><br/><br/><br/>
	";	
		
		
	
	}	
	

?> 


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