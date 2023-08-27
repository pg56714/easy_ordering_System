<?php session_start();?>
<!DOCTYPE HTML>
<html>
<style>

</style>

	<body>
	<h1 style="color:#000000;">訂單明細</h1>
		<?php
		include 'connect.php';

		$ret=mysqli_query($conn,"SELECT * FROM `booking` as a inner join `master_list` as b on a.`mas_id`=b.`mas_id` inner join `shop` as c on a.`shop_id`=c.`shop_id` where a.`mas_id`='$_POST[a]'");
		$ret1=mysqli_query($conn,"SELECT sum(c.dollar*a.amount) as totaldollar FROM `booking` as a inner join `master_list` as b on a.`mas_id`=b.`mas_id` inner join `shop` as c on a.`shop_id`=c.`shop_id` where a.`mas_id`='$_POST[a]'");
		$ret_num=mysqli_num_rows($ret);
		echo "<table class='blueTable'>
					<tbody>
						<tr>
							<th>餐點名稱</th>
							<th>數量</th>
							<th>價錢</th>
						</tr>";

		if($ret_num==0){

			echo "
						<tr>
							<td colspan='7'>無資料</td>
						</tr>
				";
		}else{
			while($row=mysqli_fetch_assoc($ret)){
				echo "
						<tr>
							<td>$row[name]</td>
							<td>$row[amount]</td>
							<td>$row[dollar]</td>
						</tr>
				";
			}
			while($row1=mysqli_fetch_assoc($ret1)){
				echo "
						<tr>
							<td>總價</td>
							<td colspan='2'>$row1[totaldollar]</td>
						</tr>

				";
			}
		}
		echo "
			</tbody>
			</table>		
			<br>
			<input type='button' class='red' value='返回' onclick='hide();'>
			</center>";		
		?>
		<div id="bg" class='bg' onclick='hide();'></div>
		<div id="ext_upd" style="display: none;" class='show'></div>
	</body>
</html>