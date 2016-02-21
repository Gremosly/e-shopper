<?php include ROOT."/views/layouts/header.php"; ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 padding right">

					<?php if (isset($errors) && is_array($errors)): ?>
						<ol>
						<?php foreach ($errors as $error): ?>
							<li style="color:#FF4040; font-size:14px; "><i><?php echo $error; ?></i></li>
						<?php endforeach ?>
						</ol>
					<?php endif ?>


					<div class="login-form"><!--login form-->
						<a href="/user/register"><ins>Нет учетной записи? Регистрация</ins></a>
						<h2>Вход на сайт</h2>
						
						<form action="#" method="post">

							<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
							<input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
							<button type="submit" name="submit" class="btn btn-default" style="width:100%;">Вход</button>

						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include ROOT."/views/layouts/footer.php"; ?>