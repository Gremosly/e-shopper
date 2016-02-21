<?php

	

	class UserController
	{

		public function actionRegister()
		{
			$name='';
			$email='';
			$password='';
			$resultRegistration=false;

			if(isset($_POST['submit'])){
				$name=$_POST['name'];
				$email=$_POST['email'];
				$password=$_POST['password'];
			

				$errors=false;

				if (!user::checkName($name)){
					$errors[]="Имя не должно быть короче 2-х символов";
				}

				if (!user::checkPassword($password)){					
					$errors[]="Пароль не должен быть короче 6-ти символов";
				}

				if (!user::checkEmail($email)){
					$errors[]="Неверный E-mail";
				}

				if (user::checkEmailExists($email)){
					$errors[]="Такой E-mail уже зарегистрирован";
				}

				if (!$errors){
					$resultRegistration=user::register($name,$password,$email);
				}

			}

			require_once(ROOT."/views/user/register.php");

			return true;
		}


		public function actionLogin()
		{
			
			$email='';
			$password='';
			

			if(isset($_POST['submit'])){
				$email=$_POST['email'];
				$password=$_POST['password'];

		
				$errors=false;

				if (!user::checkPassword($password)){					
					$errors[]="Пароль не должен быть короче 6-ти символов";
				}

				if (!user::checkEmail($email)){
					$errors[]="Неверный E-mail";
				}


				$userId=user::checkUserData($email,$password);

				if ($userId == false) {
					$errors[]="Неверный логин или пароль";
				}else{
					user::auth($userId);
					
					header("Location: /cabinet/");
				}

			}


			require_once(ROOT."/views/user/login.php");

			return true;
		}

		public function actionLogout()
		{
			
			unset($_SESSION["user"]);
			header("Location: /");
		}


	}


?>