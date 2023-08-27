<?php
// 商品項目類別
class CartItem
{
	var $_sn;
	var $_name;
	var $_price;
	var $_quantity;
	var $_brief;
	var $_spec;
	var $_sub_total;

	function CartItem($_sn, $_name, $_price, $_quantity, $_brief, $_spec)
	{
		$this->_init();

		$this->_sn = $_sn;
		$this->_name = $_name;
		$this->_price = $_price;
		$this->_quantity = $_quantity;
		$this->_brief = $_brief;
		$this->_spec = $_spec;
		 
		$this->_calc();
	}

	// 更新商品項目的數量
	function updateItem($quantity)
	{
		$this->_quantity = $quantity;
		$this->_calc();
	}

	// 取得該項商品的價格小計
	function getSubTotal()
	{
		return $this->_sub_total;
	}

	// 取得該項商品的資訊
	function getItem()
	{
		$item = array();

		$item['sn'] = $this->_sn;
		$item['name'] = $this->_name;
		$item['price'] = $this->_price;
		$item['quantity'] = $this->_quantity;
		$item['brief'] = $this->_brief;
		$item['spec'] = $this->_spec;
		$item['sub_total'] = $this->_sub_total;

		return $item;
	}

	function _init()
	{
		$_sn = "";
		$_name = "";
		$_price = 0;
		$_quantity = 0;
		$_brief = "";
		$_spec = "";
		$_sub_total = 0;
	}

	// 計算該項商品的小計價格
	function _calc()
	{
		$this->_sub_total = $this->_quantity * $this->_price;
	}

}

// 購物車主類別
class Cart
{
	var $_items = array();
	var $_total = 0;

	function Cart()
	{
		$this->_init();
	}

	// 新增一項商品
	function addItem($sn, $name, $price, $quantity, $brief, $spec)
	{
		if (!is_object($this->_items[$sn]))
		{
			$this->_items[$sn] = new CartItem($sn, $name, $price, $quantity, $brief, $spec);

			$this->_refresh();
			$_SESSION['Cart'] = $this;
		}
	}

	// 更新某項商品的數量
	function updateItem($sn, $quantity)
	{
		if (is_object($this->_items[$sn]))
		{
			$this->_items[$sn]->updateItem($quantity);
			//$_SESSION['Cart']['items'][$sn] = $this->_items[$sn]->getItem();
			$this->_refresh();
			$_SESSION['Cart'] = $this;
		}
	}

	// 移除某項商品
	function removeItem($sn)
	{
		if (is_object($this->_items[$sn]))
		{
			unset ($this->_items[$sn]);
			//unset ($_SESSION['Cart']['items'][$sn]);
			$this->_refresh();
			$_SESSION['Cart'] = $this;
		}
	}

	// 清空購物車
	function clearCart()
	{
		unset ($this->_items);
		unset ($_SESSION['Cart']);
		$this->_init();
	}

	// 取得總價
	function getTotal()
	{
		$this->_refresh();
		return $this->_total;
	}

	// 取得所有的商品項目
	function getAllItems()
	{

		if(count($this->_items))
		{

			return $this->_items;

		}
		else
		{
			return false;
		}
	}

	// 初始化
	function _init()
	{
		// 如果購物車資料已經存在了

		 if(!isset($_SESSION['Cart']))
     	{
        	$this->_items = array();
			$this->_total = 0;
        	$_SESSION['Cart']= $this;
        	//echo 123;
    	 }
   		else
   		{
   			
   			$cart = $_SESSION['Cart'];

   			$this->_items = $cart->_items;
   			$this->_total = $cart->_total;
   			
   			$this->_refresh();
   			
   		}
		
	}

	// 重新計算總價
	function _refresh()
	{
		$this->_total = 0;

		reset ($this->_items);
		foreach ($this->_items as $key => $item)
		{
			$this->_total += $item->getSubTotal();
		}
		reset ($this->_items);

	}
}

?>