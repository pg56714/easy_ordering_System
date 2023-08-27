

<?php
    require("./PHPMailer-master/src/PHPMailer.php");
    require("./PHPMailer-master/src/SMTP.php");
    require("./PHPMailer-master/src/Exception.php");


    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 

    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 1; 
    $mail->Port = 465; //465 or 587

     $mail->SMTPSecure = 'ssl';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);

    //Authentication
    $mail->Username = "hong.qy.2000@gmail.com";
    $mail->Password = "Hqy105534142";

    //Set Params
    $mail->SetFrom("hong.qy.2000@gmail.com");
    $mail->AddAddress("hungqiyao891209@gmail.com");
    $mail->Subject = "Test";
	$mail->SMTPAutoTLS = false;
    $mail->Body = "hello";


     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "<font class = 't2'> 驗證碼已寄至 <font color='blue'>$to_email</font></font>";
		
		 echo "</br></br><button class='btn4 btn t2 btn-outline-danger btn-lg' type='submit'>前往驗證郵件</button>";
		echo"</br></br></br></br></br></br>";
     }
?>