<?php 
	$this->render('common/meta'); 
	$this->render('common/header');
?>

<div class="container">
	
	<!-- hero banner -->
	<div class="row">	
		<div class="jumbotron">
			<!-- title -->
			<?php if (isset($post['id'])): ?>
				<h1>Edit Post #<?= $post['id'] ?></h1>
			<?php else: ?>
				<h1>New Post</h1>
			<?php endif; ?>
		</div>
	</div>
	
	<!-- messages -->
	
	<!-- form -->
	<div class="row">
		<form method="POST" action="<?= PATH . '/posts/save/' . (isset($post['id']) ? $post['id'] : 'new')?>">
			<div class="form-group">
				
				<!-- title -->
				<div class="form-group">
					<label for="title">Title</label>
					<input name="title" id="title" class="form-control" type="text" value="<?= (isset($post['title']) ? $post['title'] : '' ) ?>" />
				</div>

				<!-- body -->
				<div class="form-group">
					<label for="body">Body</label>
					<textarea name="body" id="body" class="form-control"><?= (isset($post['body']) ? $post['body'] : '') ?></textarea>
				</div>

				<!-- submit -->
				<input class="btn btn-primary" type="submit" value="save" />
				
			</div>
		</form>
	</div>
</div>

