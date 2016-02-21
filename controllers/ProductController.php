<?php

	

	class ProductController
	{
		

		public function actionView($id)
		{
			$categories=array();
			$categories=category::getCategoriesList();

			
			$product=product::getProductById($id);
			
			require_once(ROOT."/views/product/view.php");

			return true;
		}
	}


?>