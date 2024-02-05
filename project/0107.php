<?php
$email = '105534142';
$resu ='';
//檢查 email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo $resu;
}
$result ='$resu';
?>