<?php

	class product
	{
		const SHOW_BY_DEFAULT_IN_START_PAGE = 6;

		const SHOW_BY_DEFAULT_IN_CATEGORIES = 6;

		const SHOW_BY_DEFAULT_IN_CATALOG = 9;

		public static function getProductsList($count = self::SHOW_BY_DEFAULT_IN_START_PAGE)
		{
			$count=intval($count);

			$db=Db::getConnection();
	
			$ProductsList=array();

			$result=$db->query('SELECT * '
				.'FROM products '
				.'WHERE status="1" '
				.'ORDER BY id DESC '
				.'LIMIT '.$count);
		
			$i=0;

			while($row = $result->fetch()){
				$ProductsList[$i]['id']=$row['id'];
				$ProductsList[$i]['name']=$row['name'];
				$ProductsList[$i]['price']=$row['price'];
				$ProductsList[$i]['is_new']=$row['is_new'];
				$ProductsList[$i]['image']=$row['image'];
				$i++;
			}
			return $ProductsList;
		}


		public static function divideProductsFor3($ProductsList,$column,$count)
		{
			$countAll=count($ProductsList);
			$countForCol=ceil($count/3);	
			$i=0;
			$ProductsList1=array();
			$ProductsList2=array();
			$ProductsList3=array();

			while($i<$count){
				if ($i<$countForCol) {
					$ProductsList1[$i]['id']=0;
					$ProductsList1[$i]['name']=0;
					$ProductsList1[$i]['price']=0;
					$ProductsList1[$i]['is_new']=0;
					$ProductsList1[$i]['image']="https://www.yurist-online.net/raznoe/s/pravila-vozvrata-tovara-v-magazin.jpg";
				}elseif ($i<2*$countForCol) {
					$ProductsList2[$i]['id']=0;
					$ProductsList2[$i]['name']=0;
					$ProductsList2[$i]['price']=0;
					$ProductsList2[$i]['is_new']=0;
					$ProductsList2[$i]['image']="https://www.yurist-online.net/raznoe/s/pravila-vozvrata-tovara-v-magazin.jpg";
				}else{
					$ProductsList3[$i]['id']=0;
					$ProductsList3[$i]['name']=0;
					$ProductsList3[$i]['price']=0;
					$ProductsList3[$i]['is_new']=0;
					$ProductsList3[$i]['image']="https://www.yurist-online.net/raznoe/s/pravila-vozvrata-tovara-v-magazin.jpg";
				}	
				$i++;
			}

			$i=0;
			while($i<$countAll){
				if ($i<$countForCol) {
					$ProductsList1[$i]['id']=$ProductsList[$i]['id'];
					$ProductsList1[$i]['name']=$ProductsList[$i]['name'];
					$ProductsList1[$i]['price']=$ProductsList[$i]['price'];
					$ProductsList1[$i]['is_new']=$ProductsList[$i]['is_new'];
					$ProductsList1[$i]['image']=$ProductsList[$i]['image'];
				}elseif ($i<2*$countForCol) {
					$ProductsList2[$i]['id']=$ProductsList[$i]['id'];
					$ProductsList2[$i]['name']=$ProductsList[$i]['name'];
					$ProductsList2[$i]['price']=$ProductsList[$i]['price'];
					$ProductsList2[$i]['is_new']=$ProductsList[$i]['is_new'];
					$ProductsList2[$i]['image']=$ProductsList[$i]['image'];
				}else{
					$ProductsList3[$i]['id']=$ProductsList[$i]['id'];
					$ProductsList3[$i]['name']=$ProductsList[$i]['name'];
					$ProductsList3[$i]['price']=$ProductsList[$i]['price'];
					$ProductsList3[$i]['is_new']=$ProductsList[$i]['is_new'];
					$ProductsList3[$i]['image']=$ProductsList[$i]['image'];
				}	
				$i++;
			}
			if ($column==1) {
				if ($ProductsList1) {return $ProductsList1;}else{return false;}
			}elseif ($column==2) {
				if ($ProductsList2) {return $ProductsList2;}else{return false;}
			}else{
				if ($ProductsList3) {return $ProductsList3;}else{return false;}
			}
			
		}


		public static function getProductsListByPage($page)
		{
			$page=intval($page);

			$offset=($page-1)*self::SHOW_BY_DEFAULT_IN_CATALOG;

			$db=Db::getConnection();
	
			$ProductsList=array();

			$result=$db->query("SELECT * "
					."FROM products "
					."WHERE status='1' "
					."ORDER BY id DESC "
					."LIMIT ".self::SHOW_BY_DEFAULT_IN_CATALOG
					." OFFSET ".$offset
					);
		
			$i=0;

			while($row = $result->fetch()){
				$ProductsList[$i]['id']=$row['id'];
				$ProductsList[$i]['name']=$row['name'];
				$ProductsList[$i]['price']=$row['price'];
				$ProductsList[$i]['is_new']=$row['is_new'];
				$ProductsList[$i]['image']=$row['image'];
				$i++;
			}
			return $ProductsList;
		}

		public static function getProductsListByCategoryId($categoryId = false,$page = 1)
		{
			if($categoryId){

				$page=intval($page);

				$offset=($page-1)*self::SHOW_BY_DEFAULT_IN_CATEGORIES;

				$db=Db::getConnection();
		
				$ProductsList=array();

				$result=$db->query("SELECT * "
					."FROM products "
					."WHERE status='1' AND category_id='$categoryId' "
					."ORDER BY id DESC "
					."LIMIT ".self::SHOW_BY_DEFAULT_IN_CATEGORIES
					." OFFSET ".$offset
					);
			
				$i=0;

				while($row = $result->fetch()){
					$ProductsList[$i]['id']=$row['id'];
					$ProductsList[$i]['name']=$row['name'];
					$ProductsList[$i]['price']=$row['price'];
					$ProductsList[$i]['is_new']=$row['is_new'];
					$ProductsList[$i]['image']=$row['image'];
					$i++;
				}
			}
			return $ProductsList;
		}

		public static function getProductById($productId)
		{
	
			$productId=intval($productId);

			$db=Db::getConnection();
	

			$result=$db->query("SELECT * "
				."FROM products "
				."WHERE id='$productId' "
			);

			$result->setFetchMode(PDO::FETCH_ASSOC);
		
			return $result->fetch();
		}

		public static function getTotalProductsInCategory($categoryId)
		{
	
			$categoryId=intval($categoryId);

			$db=Db::getConnection();
	

			$result=$db->query("SELECT count(id) AS count "
				."FROM products "
				."WHERE status='1' AND "
				."category_id='".$categoryId."'"
			);

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$row = $result->fetch();
		
			return $row['count'];
		}

		public static function getTotalProducts()
		{
	

			$db=Db::getConnection();
	

			$result=$db->query("SELECT count(id) AS count "
				."FROM products "
				."WHERE status='1';"
				);

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$row = $result->fetch();
		
			return $row['count'];
		}

		public static function getProductsByIds($productsIds)
		{			

				$db=Db::getConnection();
		
				$ProductsList=array();

				$idsString=implode(',', $productsIds);

				$result=$db->query("SELECT * "
					."FROM products "
					."WHERE status='1' AND id IN ($idsString);"
					);
			
				$i=0;

				while($row = $result->fetch()){
					$ProductsList[$i]['id']=$row['id'];
					$ProductsList[$i]['name']=$row['name'];
					$ProductsList[$i]['code']=$row['code'];
					$ProductsList[$i]['price']=$row['price'];
					$i++;
				}
			return $ProductsList;
		}


	}


?>