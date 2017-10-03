<article id="post">
		
		<?php foreach($posts as $post)
			{?>
		<header>
			<h2><?php echo $post->getTitle();?></h2>
		</header>
		<p><? echo $post->getContent(); ?></p>
		<footer class="date">
			<?php echo '<em>publié le <time>'.$post->getDate().'</time></em>' ?>
		</footer>
		<?php } ?>
	</article><!--post-->
	<hr />

	<?php 
	foreach($comments as $comment)
	{?>
	

	<div class="container">
	  <div class="row">
		<article id="comment">
			<p><?php echo $comment->getContent();?></p>
			<footer><em><?php echo 'publié le '.$comment->getDate().' par '.$comment->getLogin().'<br />'; ?></em> 
			<form method="post" action=<?php echo '"index.php?action=comment&id='.$post->getId().'&idComment='.$comment->getId().'&submit=report"'?>>
				<input type="hidden" name="idPost" value="<?php echo $post->getId() ;?>" />
				<input type="submit" value="Signaler">
			</form>
			</footer>
			<hr />
		</article>
		</div>
	</div>
	
	<?php
	} ?>
		<p>Pour laisser un commentaire, veuillez vous <a href="index.php?action=connexion">identifier</a></p>
	