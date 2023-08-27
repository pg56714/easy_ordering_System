<?php
header('Content-type: text/html; charset=utf-8');

include "inc/class/Car.class.php";
session_start();

 

$MyCart = new Cart();

 
$Myitems = $MyCart->getAllItems();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的購物車</title>

<link href="css/styleMask.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/MyCar.js"></script>
</head>

<body>

<div class="right_main">
<div class="product">
<div class="product_b_body">
<form id="myform" action="OrderForm.php" method="post"
	onsubmit="return checkForm();">
<div class="shopping">
<div class="shopping_body">
<table width="100%" border="0" cellpadding="6" cellspacing="0"
	id="mytable">
	<tr>
		<td width="43%" class="shopping_w1"
			style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">商品名稱</td>
		<td width="21%" class="shopping_w1"
			style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">價
		格</td>
		<td width="21%" class="shopping_w1"
			style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">數
		量</td>
		<td width="15%" style="border-bottom: 1px solid #d2d2d2;">
		<table width="96" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="70%" align="center" valign="middle"><!--  <input name="Submit" type="submit" class="shopping_bt" style="cursor: pointer;" value="刪 除" />--></td>
				<td width="30%" align="center" valign="middle"></td>
			</tr>
		</table>
		</td>
	</tr>
	<?php

	$checkcount = 0;
	if ($Myitems)
	{
		foreach ($Myitems as $key => $Myitem)
		{
			$checkcount ++;
			$background  = $checkcount%2==1?"bgcolor=\"#e7e7e7\"":"";
			//var_export($Myitem);
			?>
	<tr id="item_<?php echo $Myitem->_sn;?>">
		<td <?php echo $background;?>><input type="hidden"
			name="item<?php echo $Myitem->_sn;?>"
			value="<?php echo $Myitem->_sn;?>"></input> <?php echo $Myitem->_name; ?></td>
		<td <?php echo $background;?>><?php echo $Myitem->_price; ?>元</td>
		<td <?php echo $background;?>><select
			name="Quity<?php echo $Myitem->_sn;?>" class="shopping_down"
			onchange="amount();">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select></td>
		<td <?php echo $background;?>>
		<table width="96" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="70%" align="center" valign="middle"><input
					name="button<?php echo $Myitem->_sn; ?>" type="button"
					class="shopping_bt" style="cursor: pointer;"
					onclick="del(<?php echo $Myitem->_sn; ?>);" value="刪 除" /></td>
				<td width="30%" align="center" valign="middle"></td>
			</tr>
		</table>
		</td>
	</tr>
	<?php
		}
	}
	else{
		?>
	<tr>
		<td bgcolor="#e7e7e7" colspan="4">目前無任何購物資料</td>
	</tr>
	<?php
	}
	?>
</table>

</div>
</div>
<table  border="0" cellpadding="5" cellspacing="0"
	style="margin-top: 10px;">
	<tr>
		<td colspan="2" align="right">總金額：<span class="shopping_w2"
			id="amount">0</span>元</td>
	</tr>

</table>
<script type="text/javascript">amount();</script>

<table  border="0" cellpadding="0" cellspacing="0"
	style="margin-top: 10px;">
	<tr>
		<td align="right"><input name="Submit2" type="submit"
			class="shopping_bt1" style="cursor: pointer;" value="下一步" /></td>
	</tr>
</table>
</form>
</div>
</div>
</div>
</body>
</html>
