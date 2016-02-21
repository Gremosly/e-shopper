<?php
	class CartController
	{
		public function actionIndex()
		{
			$categories=array();
			$categories=category::getCategoriesList();

			$productsInCart=false;
			$productsInCart=Cart::getProducts();

			if ($productsInCart) {
				$productsIds=array_keys($productsInCart);
				$products=product::getProductsByIds($productsIds);

				$totalPrice=Cart::getTotalPrice($products);
			}

			require_once(ROOT."/views/cart/index.php");

			return true;
		}

		public function actionAdd($id)
		{
			if(isset($_POST['submit'])){
				Cart::addProduct($id,$_POST['count']);
			}else{
				Cart::addProduct($id,1);
			}
			

			$referer=$_SERVER["HTTP_REFERER"];

			header("Location: $referer");
		}

		public function actionAddAjax($id)
		{
			Cart::addProduct($id);
			echo Cart::countItems();
			return true;
		}
		
	}


?>