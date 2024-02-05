<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <head>
	<style>
.t3{
	color:#003377;
	font-family:Microsoft JhengHei;
	font-size:20px;text-align:center;
	border-radius:8px;
	font-weight:bold;
}
td tr:hover {
  background-color: #FAFAFA;
}
.btn1 {
  background-color:#DFFFDF;
  font-size:16px;

}
.btn2 {
  background-color:#C4E1FF;
  font-size:16px;
}
.btn3 {
  background-color:#FF9797;
  font-size:16px;
}
.btn4 {
  background-color:#FFFF82;
  font-size:16px;
}
.btn5 {
  background-color:#CAFFFF;
  font-size:16px;
}
.btn6 {
  background-color:#FFDCB9;
  font-size:16px;
}
.btn7 {
  background-color:#FF7575;
  font-size:16px;
}
.btn8 {
  background-color:#66B3FF;
  font-size:16px;
}
#myTable tr:hover td:not(:first-child){
    background: #D2E9FF	;
}
#input[type="button"]:hover{
 background:#FBFBFF;
}
.sm:hover {
  box-shadow: 0 6px 8px 0 }
</style>
		<script>
			function page(){
				var p=document.getElementById("page").value;
				aa(p);
			}
            function upd(id){
                $.ajax({
                    type:'POST',
                    url: 'staff_upd.php',
                    data: {
                        id:id
                    },
                    success: function(result){
                        $("#ext_upd").html(result);
                        document.getElementById("bg").style.display = 'block';
                        document.getElementById("ext_upd").style.display = 'block';
                    }
                });
		    }

            function del(id){
                var statu = confirm("刪除是不可恢復的，你確認要刪除嗎？");
                if(!statu){
                    return false; 
                } 
                $.ajax({
                    type:'POST',
                    url: 'staff_del.php',
                    data: {
                        id:id
                    },
                    success: function(result){
                        $("#ext_upd").html(result);
                        
                    }
                });
            }

            function hide_extension(){
			    document.getElementById("bg").style.display = 'none';
			    document.getElementById("ext_upd").style.display = 'none';
		    }
		</script>
    </head>

    <body >
        <header>
            <center>
                <div id="bg" class='bg' onclick='hide_extension();'></div>
					<div id="ext_upd" style="display: none;" class='show' ></div>
                        <section  id="banner">
							
                            <?php 
                                include "connect.php";
                                $name=$_GET['res_name_search'];
                                $select="SELECT * FROM `restaurant` where 1=1";
                                if($name!=""){
                                    $select.=" and `res_name` LIKE '%".$name."%'";
                                }
                                $select.=" GROUP BY `res_id` order by `res_id` asc";
                                //echo $select;
                                $ret=mysqli_query($conn,$select);
                                $num=mysqli_num_rows($ret);
                                if($num=='0'){
                                    echo "<font style='color:red; Font-size:48px;font-family:微軟正黑體 Light;text-shadow: rgb(136, 136, 136) 2px 2px 2px;'>無員工資料!</font>";
                                }else{
                                    $data_nums = mysqli_num_rows($ret); //統計總比數
                                    $per = 10; //每頁顯示項目數量
                                    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
                                    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                                        $page=1; //則在此設定起始頁數
                                    } else {
                                        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
                                    }
                                    $start = ($page-1)*$per; //每一頁開始的資料序號       
                                    $ret = mysqli_query($conn,$select.' LIMIT '.$start.', '.$per) or die("Error");
                                                
                                    echo"
                                        <table  style='box-shadow:3px 3px 5px 6px #cccccc;' width='80%' class='t3'  align='center' border='2'>";
                                            
                                    echo "
									    <thead>
                                        <tr >
											<th>編號</th>
                                            <th>姓名</th>
                                            <th>操作</th>
                                        </tr></thead>";
                                            
                                    While($row=mysqli_fetch_assoc($ret)){
                                        echo"
										<tbody id='myTable'><tr>
											<td>$row[res_id]</td>
                                            <td>$row[res_name]</td>
                                            <td>
												<input class='btn btn-outline-primary' type='button' value='修改' onclick='upd($row[res_id]);'>								
												<input type='button'class='btn btn-outline-danger' value='刪除' onclick='del($row[res_id]);'></input>
											</td>";
                                        echo"</tr></tbody>";
                                    };
                                            
                                    echo"</table></br>";
                                                
                                    //分頁頁碼
                                    echo "
                                        <div id='data_page'>
                                        <div class='select' style='width:120px;margin-top:15px;'>
                                            <select id='page' style='padding-left:30px;' class='select1' onchange='page();'>
                                        ";
                                        $q=0;
                                        for($i=1;$i<=$pages;$i++){
                                        if($i==$page){
                                            echo "<option value='$i' selected>第".$i."頁</option>";
                                        }else{
                                            echo "<option value='$i'>第".$i."頁</option>";
                                             $q=$i;
                                            }
                                        }
                                        echo "
                                            </select>
                                            </div>
                                            </div>
                                        ";
                                    echo "<font size='4px' color='#000'>共計 $data_nums 筆</font>";
                                }
                            ?>
                            </br>
                        </section>
            </center>
        </header>

    </body>
</html>
