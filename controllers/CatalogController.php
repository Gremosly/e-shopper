<?php

	

	class CatalogController
	{
		public function actionIndex($page = 1)
		{
			$categories=array();
			$categories=category::getCategoriesList();
			$products=array();
			$products=product::getProductsListByPage($page);

			$products1=product::divideProductsFor3($products,1,product::SHOW_BY_DEFAULT_IN_CATALOG);
			$products2=product::divideProductsFor3($products,2,product::SHOW_BY_DEFAULT_IN_CATALOG);
			$products3=product::divideProductsFor3($products,3,product::SHOW_BY_DEFAULT_IN_CATALOG);

			$total=product::getTotalProducts();

			$pagination=new Pagination($total,$page,product::SHOW_BY_DEFAULT_IN_CATALOG,"page-");

			require_once(ROOT."/views/catalog/index.php");

			return true;
		}

		public function actionCategory($categoryId,$page = 1)
		{


			$categories=array();
			$categories=category::getCategoriesList();
			$CategoryProducts=array();
			$CategoryProducts=product::getProductsListByCategoryId($categoryId,$page);

			$CategoryProducts1=product::divideProductsFor3($CategoryProducts,1,product::SHOW_BY_DEFAULT_IN_CATEGORIES);
			$CategoryProducts2=product::divideProductsFor3($CategoryProducts,2,product::SHOW_BY_DEFAULT_IN_CATEGORIES);
			$CategoryProducts3=product::divideProductsFor3($CategoryProducts,3,product::SHOW_BY_DEFAULT_IN_CATEGORIES);

			$total=product::getTotalProductsInCategory($categoryId);

			$pagination=new Pagination($total,$page,product::SHOW_BY_DEFAULT_IN_CATEGORIES,"page-");

			require_once(ROOT."/views/catalog/category.php");

			return true;
		}
	}


?>