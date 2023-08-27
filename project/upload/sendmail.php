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
                    <!--<ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">美食佳餚</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">關於</a></li>
                      
					    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="test.php">註冊帳號</a></li>

						
                    </ul>
                </div>-->
            </div></nav><br/><br/><br/><br/><br/>
			
			
<form action="check.php" method="post">
<?php
include "connect.php";
require("./PHPMailer-master/src/PHPMailer.php");
require("./PHPMailer-master/src/SMTP.php");
require("./PHPMailer-master/src/Exception.php");

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
//接收

$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$check = rand(1000,9999);




  $query = "SELECT * FROM `customer` WHERE `email` = '$email' or `phone` = '$phone'";
  $res=mysqli_query($conn,$query);
  	if(mysqli_num_rows($res)>0)
    {
  echo"<Script>swal('手機或電子郵件已經註冊過！','','error')</Script>";echo '<meta http-equiv=REFRESH CONTENT=2;url=test.php>'; 
 
  	}
	else {
    

# 設定時區
date_default_timezone_set('Asia/Taipei');

# 取得日期與時間（新時區）
$time = date('Y/m/d');
$today = date('H:i');
echo "<font class = 't2'> $time &nbsp; $today</font></br>";

//儲存資料
echo"
<input type='hidden' name='name' value='$name'></p>
<input type='hidden' name='email' value='$email'></p>
<input type='hidden' name='password' value='$password'></p>
<input type='hidden' name='phone' value='$phone'></p>
<input type='hidden' name='check' value='$check'></p>
";
    //mail
    
	$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 

    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 0; 
    $mail->Port = 465; //465 or 587

    $mail->SMTPSecure = 'ssl';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);

    //Authentication
    $mail->Username = "hong.qy.2000@gmail.com";
    $mail->Password = "Hqy105534142";

    //Set Params
    $mail->SetFrom("hong.qy.2000@gmail.com");
    $mail->AddAddress("$email");
    $mail->Subject = "線上訂餐系統驗證碼通知";
	$mail->SMTPAutoTLS = false;
    $mail->Body = "<font size='4'><font color='blue'><b>$name</b></font> 您好，歡迎您註冊本系統，您的註冊驗證碼為<font color='red'>$check</font>。 <br/>北商線上點餐系統感謝您的支持與使用。</font>";

	
	 if(!$mail->Send()) {
       echo "<font class = 't2'>驗證郵件寄送失敗，請檢查信箱是否正確</font>". $mail->ErrorInfo;
       echo"</br></br></br></br></br></br>";
     } 
	 else {
        echo "<font class = 't2'> 驗證碼已寄至 <font color='blue'>$email</font></font>";
		
		 echo "</br></br><button class='btn4 btn t2 btn-outline-danger btn-lg' type='submit'>前往驗證郵件</button>";
		echo"</br></br></br></br></br></br>";
     }
	
	

    
	
    
	//if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	//if(mail($to_email, $subject, $body, $headers)) 
		
	//{
	//	echo "<font class = 't2'> 驗證碼已寄至 <font color='blue'>$to_email</font></font>";
		
		// echo "</br></br><button class='btn4 btn t2 btn-outline-danger btn-lg' type='submit'>前往驗證郵件</button>";
		//echo"</br></br></br></br></br></br>";
	
	//}// }
	//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
     //echo "<font class = //'t2'>驗證郵件寄送失敗，請檢查信箱是否正確</font>";
    // echo"</br></br></br></br></br></br>";
   
    }
	 
  
?>
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
</form>
</body>
</html>