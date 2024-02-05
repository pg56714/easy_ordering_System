<?php
header('Content-type: text/html; charset=utf-8');

include "inc/class/Car.class.php";
session_start();

$MyCart = new Cart();

$Myitems = $MyCart->getAllItems();
//var_export($Myitems);
foreach ($Myitems as $key => $Myitem)
{
	//$item = $Myitem->getItem();
	$q = $_POST['Quity'.$key];
	//echo $q;
	$Myitem->updateItem($q);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的購物車</title>

<link href="css/styleMask.css" rel="stylesheet" type="text/css" />

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
		<td <?php echo $background;?>><?php echo $Myitem->_quantity;?></td>

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

</form>
</div>
</div>
</div>
</body>
</html>
