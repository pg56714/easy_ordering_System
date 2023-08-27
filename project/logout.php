<?php session_start()?>
<script type="text/javascript" src="mod/sweetalert.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//將session清空
unset($_SESSION['email']);
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>