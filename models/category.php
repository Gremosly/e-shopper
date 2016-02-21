<?php

	class category
	{

		public static function getCategoriesList()
		{
			$db=Db::getConnection();
	

			$CategoriesList=array();

			$result=$db->query('SELECT * '
				.'FROM category '
				.'ORDER BY sort_order DESC '
				.'LIMIT 10');
		
			$i=0;

			while($row = $result->fetch()){
				$CategoriesList[$i]['id']=$row['id'];
				$CategoriesList[$i]['name']=$row['name'];
				$CategoriesList[$i]['sort_order']=$row['sort_order'];
				$CategoriesList[$i]['status']=$row['status'];
				$i++;
			}
			return $CategoriesList;
		}

	}