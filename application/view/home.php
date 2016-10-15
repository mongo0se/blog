<?php 
	$this->render('common/meta'); 
	$this->render('common/header');
?>

<div class="container">
	
	<!-- hero banner -->
	<div class="row">	
		<div class="jumbotron">
			
			<!-- Project Title -->
			<h1><?= TITLE ?></h1>
			
			<!-- Message to logged in user -->
			<?php if (isset($user)): ?>
				<p class="lead">Logged in as <?= $user['email'] ?></p>
				<p>Click post titles to edit them.</p>
			<?php endif; ?>
		</div>
	</div>
	
	<!-- Add Post Button -->
	<?php if (isset($user)): ?>
	<div class="row">
		<a href="<?= PATH . '/posts/edit' ?>" class="btn btn-primary">Add Post</a>
	</div>
	<?php endif; ?>
	
	<!-- results -->
	<div class="row">
		<table class="table table-striped">
		<?php foreach($posts as $post): ?>
			<tr>
				<!--id -->
				<td><?= $post['id'] ?></td>
					
				<!-- title -->
				<td>
					<?php if (isset($user)): ?>
						<!-- Edit Link -->
						<a href="<?= PATH . '/posts/edit/' . $post['id'] ?>">
							<?= $post['title'] ?>
						</a>
					<?php else: ?>
						<!-- View Link -->
						<a href="<?= PATH . '/posts/view/' . $post['id'] ?>">
							<?= $post['title'] ?>
						</a>
					<?php endif; ?>
				</td>

				<!-- body (first 100 chars) -->
				<td><?= (strlen($post['body']) > 50) ? substr($post['body'], 0, 97) . '...' : $post['body'] ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
	
	<!-- pagination next -->
	<?php if ($pageSize < $total && $currentPage != ($totalPages-1)): ?>
		<a href="<?= PATH ?>/home/page/<?= $currentPage + 1 ?>" class="btn btn-default">next</a>
	<?php endif; ?>
	
	<!-- pagination previous -->
	<?php if ($pageSize < $total && $currentPage != 0): ?>
		<a href="<?= PATH ?>/home/page/<?= $currentPage - 1 ?>" class="btn btn-default">previous</a>
	<?php endif; ?>
	
</div>

