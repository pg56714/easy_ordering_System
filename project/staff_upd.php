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
				var id=document.getElementById('res_id').value;
                var ed=document.getElementById('res_name').value;
				if(ed==""){
					alert("請輸入員工姓名");
					return false;
				}else{
					$.ajax({
						type:'POST',
						url: 'staff_upd1.php',
						data:{
							id:id,
							res_name:ed,
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
				location.href = "staff.php";
			}
		</script>
	<body>
	<?php
		include 'connect.php';
		$ret=mysqli_query($conn,"SELECT * FROM `restaurant` where `res_id` = '$_POST[id]';");
		$row=mysqli_fetch_assoc($ret);
		echo"
			<center>
				<table class='blueTable'>
					<tbody>
						<input type='hidden' id='res_id' name='res_id' value='$row[res_id]'>
						<tr>
							<td>員工姓名</td>
							<td>
						        <input id='res_name' name='res_name' value='$row[res_name]'>
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