<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<!-- Fixed navbar -->
<nav class="navbar navbar-default">
  <div class="container">
	<div class="navbar-header">
	  <a class="navbar-brand" href="<?= PATH ?>"><?= TITLE ?></a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="<?= PATH ?>">Home</a></li>
		<li><a href="<?= PATH ?>/contact">Contact</a></li>
		<?php if(isset($user)): ?>
			<li><a href="<?= PATH ?>/login/end">Log Out</a></li>
		<?php else: ?>
			<li><a href="<?= PATH ?>/login">Log In</a></li>
		<?php endif; ?>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>
