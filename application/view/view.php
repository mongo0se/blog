<?php 
	$this->render('common/meta'); 
	$this->render('common/header');
?>

<div class="container">
	
	<!-- hero banner -->
	<div class="row">	
		<div class="jumbotron">
			<!-- Post Title -->
			<h1><?= $post['title'] ?></h1>
		</div>
	</div>
	
	<!-- summary -->
	<div class="row">
		<i><?= $post['summary'] ?></i>
	</div>
	
	<!-- body -->
	<div class="row">
		<?= $post['body'] ?>
	</div>
</div>

