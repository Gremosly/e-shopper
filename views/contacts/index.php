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

					<?php if ($result): ?>
						<p style="color:#A2B5CD; font-size:20px;"><b><i>Ваше сообщение отправлено</i></b></p>
					<?php else: ?>
						<div class="login-form"><!--mail form-->
							<h2>Обратная связь</h2>
							
							<form action="#" method="post">
								<label>Ваш E-mail:</label>
								<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
								<label>Сообщение:</label>
								<input type="text" name="text" placeholder="Сообщение" />
								<button type="submit" name="submit" class="btn btn-default" style="width:100%;">Отправить</button>
							</form>
						</div><!--/mail form-->
					<?php endif ?>

				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include ROOT."/views/layouts/footer.php"; ?>