

	<article id="post">
		<header>
			<?php echo $post['title']  ?>
		</header>
		<p><? echo $post['content'] ?></p>
		<footer>
			<?php echo '<time>'.$post['date_post'].'</time>' ?>
		</footer>
	</article><!--post-->

	<?php 
	foreach($comments as $comment)
	{?>

	<article class="comments">
		<p><?php echo $comment['content'] ?></p>
		<footer><?php echo 'publié le'.$comment['date_com'].'par '.$user['login']; ?> 
		</footer>

	</article><!--comments-->
	<?php
	} ?>

	


}
