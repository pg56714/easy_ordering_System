<?php
if(!isset($_SESSION)){session_start();}	//開啟 SESSION
if (isset($_POST['action'])) {
  if (isset($_POST['data'])){$data=$_POST['data'];}else{$data='';}
  switch ($_POST['action']){
    case "chkvcode":
    /*ajax chkvcode*/
      if(!empty($_SESSION['check_word'])){  //判斷此兩個變數是否為空
        if($_SESSION['check_word'] == $data){
          echo "OK";
        }else{
          echo "驗證碼錯誤";
        }
      }else{
        echo "驗證碼錯誤";
      }
      break;
  }
}
?>