<?php session_start();?>
<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	
	//上傳圖片------------------------------------------------------------------
	if (isset($_POST['upload'])) {
  
		$filename = $_FILES["uploadfile"]["name"];
		$tempname = $_FILES["uploadfile"]["tmp_name"];    
		$folder = "upload/".$filename;

		$sql = "INSERT INTO `shop` (`res_id`,`name`,`dollar`,`photo`) VALUES ('$_POST[res_id]','$_POST[name]','$_POST[dollar]','$filename')";
		//$sql = "INSERT INTO `testphoto` (photo) VALUES ('$filename')";
  
		mysqli_query($conn, $sql);
          
		if (move_uploaded_file($tempname, $folder))  {
			echo "<script>alert('新增成功');location.href='shop_search.php';</script>";
		}else{
			echo "<script>alert('新增失敗');location.href='shop_search.php';</script>";
		
		}
	}
	//--------------------------------------------------------------------------
?>