<?php



	class ContactController
	{
		public function actionIndex()
		{
			$mail='sergii.nechaenko@mail.ru';
			$subject='Тема письма';
			$message='';
			
			$email='';
			$text='';
			$result=false;

			if(isset($_POST['submit'])){

				$email=$_POST['email'];
				$text=$_POST['text'];
			
				$message=$text.'От '.$email;

				$errors=false;

				if (!user::checkEmail($email)){
					$errors[]="Неверный E-mail";
				}


				if (!$errors){
					$result=mail($email, $subject, $text);
					
				}

			}

			require_once(ROOT."/views/contacts/index.php");

			return true;
		}
	}


?>