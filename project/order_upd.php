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
				var id=document.getElementById('mas_id').value;
                var ed=document.getElementById('state').value;
				var ed1=document.getElementById('res_id').value;
				if(ed=="" || ed1==""){
					alert("請選擇訂單狀態或負責員工");
					return false;
				}else{
					$.ajax({
						type:'POST',
						url: 'order_upd1.php',
						data:{
							id:id,
							state:ed,
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
				location.href = "restaurant.html";
			}
		</script>
	<body>
		<?php
		include 'connect.php';
		$ret=mysqli_query($conn,"SELECT * FROM `master_list` where `mas_id` = '$_POST[id]';");
		$row=mysqli_fetch_assoc($ret);
		$select=mysqli_query($conn,"SELECT * FROM `restaurant`");
		echo"
			<center>
				<table class='blueTable'>
					<tbody>
						<input type='hidden' id='mas_id' name='mas_id' value='$row[mas_id]'>
						<tr>
						<td>訂單狀態</td>
						<td>
			";
		?>
			<select name="state" id="state"  align="center" required>
				<option value="">請選擇</option>
				<?php
					echo "<option value='1'>狀態1：餐點製作中</option>";
					echo "<option value='2'>狀態2：餐點已製作完成，顧客請取餐</option>";
					echo "<option value='3'>狀態3：完成訂單</option>";
					echo "<option value='4'>狀態4：店家已取消</option>";
				?>
			</select>
		<?php
			echo"
						</td>
						</tr>
						<tr>
						<td>負責員工</td>
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