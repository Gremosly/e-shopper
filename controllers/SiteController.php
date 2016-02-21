<?php



	class SiteController
	{
		public function actionIndex()
		{
			$categories=array();
			$categories=category::getCategoriesList();
			$Latestproducts=array();
			$Latestproducts=product::getProductsList();

			$Latestproducts1=product::divideProductsFor3($Latestproducts,1,product::SHOW_BY_DEFAULT_IN_START_PAGE);
			$Latestproducts2=product::divideProductsFor3($Latestproducts,2,product::SHOW_BY_DEFAULT_IN_START_PAGE);
			$Latestproducts3=product::divideProductsFor3($Latestproducts,3,product::SHOW_BY_DEFAULT_IN_START_PAGE);

			require_once(ROOT."/views/site/index.php");

			return true;
		}

		public function actionUnavailable()
		{
	
			require_once(ROOT."/views/site/unavailable.php");

			return true;
		}
	}


?>