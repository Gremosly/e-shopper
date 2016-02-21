<?php
	
	class CabinetController
	{
		public function actionIndex()
		{
			$userId=user::checkLogged();

			$user=user::getUserById($userId);

			require_once(ROOT."/views/cabinet/index.php");

			return true;
		}
	

		public function actionEdit()
		{
			$userId=user::checkLogged();

			$user=user::getUserById($userId);

			$name=$user['name'];
			$password=$user['password'];

			$resultEdition=false;

			if(isset($_POST['submit'])){
				$name=$_POST['name'];
				$password=$_POST['password'];
			

				$errors=false;

				if (!user::checkName($name)){
					$errors[]="Имя не должно быть короче 2-х символов";
				}

				if (!user::checkPassword($password)){					
					$errors[]="Пароль не должен быть короче 6-ти символов";
				}

				if ($errors == false){
					$resultEdition=user::edit($userId,$name,$password);
				}

			}

			require_once(ROOT."/views/cabinet/edit.php");

			return true;
		}

	}
?>