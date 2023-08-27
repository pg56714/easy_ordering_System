<?php
   $to = "adam@www.stormconsultancy.co.uk";
   $from = $_POST['email'];
   $subject = $_POST['subject'];
   $body = $_POST['body'];
 
   $headers = "From: $from\r\n";
   $headers .= "Reply-to: $from\r\n";
 
   // send mail
   if (mail($to,$subject,$body,$headers)){
     echo "Message sent successfully";
   }else{
     echo "Error: Sending your message failed";
   }
?>