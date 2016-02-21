<?php 


	class Cart
	{
		
		public static function addProduct($id, $howMany = 1)
		{
			$id=intval($id);

			$productsInCart=array();

			if (isset($_SESSION["products"])) {
				$productsInCart=$_SESSION["products"];
			}

			if (array_key_exists($id, $productsInCart)) {
				$productsInCart["$id"]+=$howMany;
			}else{
				$productsInCart["$id"]=$howMany;
			}

			$_SESSION['products']=$productsInCart;
		} 



		public static function countItems()
		{
			$productsInCart=array();
			$i=0;

			if (isset($_SESSION["products"])) 
			{
				$productsInCart=$_SESSION["products"];
				foreach ($productsInCart as $id => $countItem) {
					$i+=$countItem;	
				}
			}

			return $i;
		}

		public static function getProducts()
		{
			if (isset($_SESSION["products"])) 
			{
				return $_SESSION["products"];
			}else{return false;}
		}

		public static function getTotalPrice($products)
		{
			$total=0;
			$productsInCart=self::getProducts();
			if ($productsInCart) {
				foreach ($products as $item) {
					$total+=$item['price']*$productsInCart[$item['id']];
				}
			}

			return $total;
			
		}
	}


