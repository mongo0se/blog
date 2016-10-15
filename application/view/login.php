<?php 
	$this->render('common/meta'); 
	$this->render('common/header');
?>

<div class="container">

	<!-- title -->
	<h1>Admin Login Page</h1>

	<!-- errors -->
	<?php if (isset($errors)): ?>
	<div class="row">
		<div class="alert alert-danger">
			<ul>			
			<?php foreach ($errors as $error): ?>
				<li><?= $error ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php endif; ?>

	<!-- results -->
	<div class="row">
		<form method="POST" action="<?= PATH ?>/login/login">

			<!-- username -->
			<div class="form-group">
				<label for="username">Username</label>
				<input name="username" id="username" class="form-control" type="text" />
			</div>

			<!-- password -->
			<div class="form-group">
				<label for="password">Password</label>
				<input name="password" id="password" class="form-control" type="password" />
			</div>

			<!-- submit -->
			<input class="btn btn-primary" type="submit" value="login" />
		</form>
	</div>
</div>

