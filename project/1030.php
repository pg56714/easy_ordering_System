<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="zh-tw" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<form action="" id="reg_form" method="POST">
		<p>驗證碼:( 點擊圖片可以更換驗證碼)<br></p>
		<img id="imgcode" src="imgcode.php" onclick="refresh_code()" /><br>
		 <p><input type="text" name="vcode" value="" placeholder="輸入上方圖形驗證碼" class="form-control form-control-user reg_vcode" id="reg_vcode"><span class="vcode_hint"></span> </p>
		 <button type="button" class="red_button form-btn">送出</button>
	</form>
<script type="text/javascript">
//javascript
function refresh_code(){ 
    document.getElementById("imgcode").src="imgcode.php"; 
} 
var vcode_Boolean = false;
//偵測輸入
$('.reg_vcode').blur(function(){
  if ((/^[a-zA-Z0-9_-]{4,4}$/).test($(".reg_vcode").val())){//判定輸入值
    var acode=document.getElementById("reg_vcode").value;
    $.ajax({
	  type:"POST", 
	  url:"ajax.php", 
	  data:"data="+acode+"&action=chkvcode", 
	  cache:false,
	  success:function(data){ 
	  //回傳資料
	    if(data == 'OK'){
		  $('.vcode_hint').html(" ✔ ").css("color","green");
		  $('.reg_vcode').css("border","1px solid green");
		  vcode_Boolean = true;
		}else{
		  $('.vcode_hint').html(" × 驗證錯誤").css("color","red");
		  $('.reg_vcode').css("border","1px solid red");
		  vcode_Boolean = false;
		}
	  }
      }); 
  }else {
    $('.vcode_hint').html(" × 驗證錯誤").css("color","red");
	$('.reg_vcode').css("border","1px solid red");
    vcode_Boolean = false;
  }
});
// click
$('.red_button').click(function(){
  if(vcode_Boolean == true){
    document.getElementById("reg_form").submit();
  }else {
    alert("請確認資料輸入正確");
  }
});
</script>
</body>
</html>                      