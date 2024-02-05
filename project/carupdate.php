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
			
			
<form action="carupdate2.php" method="POST">
   <p class = "t2">
   <body style="background-color:#F5F5F5;">



<?php 
    include"connect.php" ;

    $x = $_GET['x'];
    $sql = "SELECT * FROM `car` where `email` = '$email' and `shop_id` ='$x'";
    $result = mysqli_query($conn, $sql);

    
  



    echo"<table width='80%'  align='center' class='tablehover sortable'>";
    echo"
	
    <thead class = 't2'>
       <tr class = 't2 sortable' valign='top'>
         <th >商品名稱</th>
         <th>照片</th>
         <th>單價</th>
         <th>原有數量</th>
		 <th>編輯數量</th>
         <th>功能</th>
       </tr>
    </thead>";
	
	
   while($row = mysqli_fetch_array($result)) {
	
       $sqli="SELECT * FROM  `shop` WHERE  `shop_id` = $row[shop_id]";
       $s = mysqli_query($conn,$sqli);
      while($ra = mysqli_fetch_array($s)){
		  
      
	  
 
	    echo"<tbody class = 't3 sortable' >";
     
		echo
		"<tr>
		   
           <td>$ra[name]</td>
           <td> 
		       <button>
		          <img src='upload/$ra[photo]' alt='無照片' width='200'     
		          height='150' onclick=location.href='./upload/$ra[photo]' >
		       </button>
		   </td>
           <td>$$ra[dollar]</td>
	       <td>$row[amount]</td>
		   <td>
		        <select  name='up'>";
			if ($row['amount']==1){
				echo"
				<option value='2'> 2 </option>
                <option value='3'> 3 </option>
				<option value='4'> 4 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}
			if ($row['amount']==2){
				echo"
				<option value='1'> 1 </option>
                <option value='3'> 3 </option>
				<option value='4'> 4 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}
			if ($row['amount']==3){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='4'> 4 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}
        	if ($row['amount']==4){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}	    			
		   	if ($row['amount']==5){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}
		  	if ($row['amount']==6){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 5 </option>
				<option value='5'> 5 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}
		    if ($row['amount']==7){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 5 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}
	 	   if ($row['amount']==8){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 5 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}	
           if ($row['amount']==8){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 5 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
                   </select>";
			}	
           if ($row['amount']==9){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 5 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='10'> 10 </option>
                   </select>";
			}	
          if ($row['amount']==10){
				echo"
				<option value='1'> 1 </option>
                <option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 5 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
                   </select>";
			}	  			
            echo"
	       </td>
	       <td>
		     <input value='送出' type='submit' /></input>
	         <input type ='hidden' name='email' value='$email'> 
	           <input type ='hidden' name='x' value='$x'>
		 
		
		   </td>
		</tr>";
	                       
							
	
   }
  }

       echo"</table>
            <br/><br/><br/><br/>";

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