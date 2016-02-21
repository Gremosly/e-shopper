<?php include ROOT."/views/layouts/header.php"; ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 padding right">

					<?php if ($resultEdition): ?>
						<p style="color:#A2B5CD; font-size:20px;"><b><i>Данные отредактированы</i></b></p>
					<?php else: ?>

					<?php if (isset($errors) && is_array($errors)): ?>
						<ol>
						<?php foreach ($errors as $error): ?>
							<li style="color:#FF4040; font-size:14px; "><i><?php echo $error; ?></i></li>
						<?php endforeach ?>
						</ol>
					<?php endif ?>


					<div class="login-form"><!--login form-->
						<h2>Изменение данных</h2>
						<form action="#" method="post">
							<label for="name" style="font-weight:normal; color:#807e7a;">Имя</label>
							<input id="name" type="text" name="name" value="<?php echo $name; ?>"/>
							<label for="password"style="font-weight:normal; color:#807e7a;">Пароль</label>
							<input id="password" type="password" name="password" value="<?php echo $password; ?>"/>
							<input type="submit" name="submit" class="btn btn-default" value="Изменить">

						</form>
					</div><!--/login form-->

					<?php endif ?>


				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include ROOT."/views/layouts/footer.php"; ?>