<?php 
	$this->render('common/meta'); 
	$this->render('common/header');
?>

<div class="container">
	
	<!-- hero banner -->
	<div class="row">	
		<div class="jumbotron">
			<h1><?= TITLE ?></h1>
			
			<p class="lead">
				Contact Info
			</p>
		</div>
	</div>
	
	<!-- results -->
	<div class="row">
		<p>		
		<?php foreach($contactInfo as $key => $value): ?>
			<b><?= $key ?>:</b> <?= $value ?><br />
		<?php endforeach; ?>
		</p>
	</div>
</div>

