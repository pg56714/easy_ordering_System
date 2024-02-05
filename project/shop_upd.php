<?php session_start();?>
<!DOCTYPE HTML>
<html>
<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #C4C4C4;
  width: 50%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 4px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 18px;
  font-weight: bold;
  color: #333333;
}
table.blueTable td:nth-child(even) {
  background: #DFECF4;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
	<script>
			function upd1(){
				var id=document.getElementById('shop_id').value;
                var ed=document.getElementById('dollar').value;
				var ed1=document.getElementById('res_id').value;
				if(ed=="" || ed1==""){
					alert("請輸入價錢或請選擇維護員工");
					return false;
				}else{
					$.ajax({
						type:'POST',
						url: 'shop_upd1.php',
						data:{
							id:id,
							dollar:ed,
							res_id:ed1
						},
						success: function(result){
							hide();
							finish();
						}
					})
				}
			}		
			function hide(){
				document.getElementById("bg").style.display = 'none';
				document.getElementById("ext_upd").style.display = 'none';
			}
			
			function finish(){
				/*$.ajax({url: "extension.php", 
					success: function(result){
						$("#main").html(result);
					}
				});*/
				location.href = "shop_search.php";
			}
		</script>
	<body>
		<?php
		include 'connect.php';
		$ret=mysqli_query($conn,"SELECT * FROM `shop` where `shop_id` = '$_POST[id]';");
		$row=mysqli_fetch_assoc($ret);
		$select=mysqli_query($conn,"SELECT * FROM `restaurant`");
		echo"
			<center>
				<table class='blueTable'>
					<tbody>
						<input type='hidden' id='shop_id' name='shop_id' value='$row[shop_id]'>
						<tr>
							<td Width='35%' >餐點名稱</td>
							<td>$row[name]</td>
						</tr>
						<tr>
							<td>價錢</td>
							<td>
						        <input id='dollar' name='dollar' value='$row[dollar]'>
					        </td>
						</tr>
						<tr>
						<td>維護員工</td>
						<td>
			";
		?>
			<select name="res_id" id="res_id"  align="center" required>
				<option value="">請選擇</option>
				<?php
					while($row1=mysqli_fetch_assoc($select)){
						echo "<option value='{$row1['res_id']}'>{$row1['res_id']}{$row1['res_name']}</option>";
					}
				?>
			</select>
		<?php
			echo"
						</td>
						</tr>
					</tbody>
				</table>
						<td>
							<input type='button' id='bg' class='green' value='確定' onclick='upd1()'>
							&nbsp&nbsp
							<input type='button' id='bg' class='red' value='關閉' onclick='hide();'>
						</td>
			</center>";		
		?>
		<div id="bg" class='bg' onclick='hide();'></div>
		<div id="ext_upd" style="display: none;" class='show'></div>
	</body>
</html>