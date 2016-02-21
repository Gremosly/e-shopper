<?php include ROOT."/views/layouts/header.php"; ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				
				<div class="col-sm-4 col-sm-offset-4 padding right">

					<?php if ($resultRegistration): ?>
						<p style="color:#A2B5CD; font-size:20px;"><b><i>Регистрация прошла успешно</i></b></p>
						<a href="/user/login"><ins>Войти на сайт</ins></a>
					<?php else: ?>

					<?php if (isset($errors) && is_array($errors)): ?>
						<ol>
						<?php foreach ($errors as $error): ?>
							<li style="color:#FF4040; font-size:14px; "><i><?php echo $error; ?></i></li>
						<?php endforeach ?>
						</ol>
					<?php endif ?>

					<div class="signup-form"><!--sign up form-->
						<h2>Регистрация на сайте</h2>
						<form action="#" method="post">
							<input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
							<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
							<input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
							<button type="submit" name="submit" class="btn btn-default" style="width:100%;">Регистрация</button>
						</form>
					</div><!--/sign up form-->
					<br/>
					<br/>

					<?php endif ?>

				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include ROOT."/views/layouts/footer.php"; ?>