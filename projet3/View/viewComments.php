

	<article id="post">
		<header>
			<?php echo $post->getTitle();  ?>
		</header>
		<p><? echo $post->getContent(); ?></p>
		<footer>
			<?php echo '<time>'.$post->getDate().'</time>' ?>
		</footer>
	</article><!--post-->

	<?php 
	foreach($comments as $comment)
	{?>

	<article class="comments">
		<p><?php echo $comment->getContent() ?></p>
		<footer><?php echo 'publié le'.$comment->getDate().'par '.$user['login']; ?> 
		</footer>

	</article><!--comments-->
	<?php
	} ?>

	


}
