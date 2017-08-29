
	<article id="post">
		<header>
			<h2><?php echo $post['title']  ?></h2>
		</header>
		<p><? echo $post['content'] ?></p>
		<footer>
			<?php echo '<time>'.$post['date_post'].'</time>' ?>
		</footer>
	</article><!--post-->
	<hr />

	<?php 
	foreach($comments as $comment)
	{?>

	<article class="comments">
		<p><?php echo $comment['content'] ?></p>
		<footer><?php echo 'publié le '.$comment['date_com'].' par '.$comment['login'].'<br />'; ?> 
		<a href=<?php echo '"index.php?action=comment&id='.$comment['id'].'&submit=report"'?>>Signaler ce commentaire</a>
		</footer>

	</article><!--comments-->
	<?php
	} ?>


	<form method="post" action="index.php?action=comment&id=<?php echo $post['id'] ;?>" >
		<p><label>Pseudo: </label><input id="login" name="login" type="text" value=<?php echo $_SESSION['login']; ?> required /></p>
		<p><label>Commentaire: </label><textarea id="comment" name="content" required>Votre commentaire</textarea></p>
		<p><input type="submit" value="Commenter" /></p>
		<p><input type="hidden" name="idPost" value="<?php echo $post['id'] ;?>" />
		<p><input type="hidden" name="idUser" value="<?php echo $_SESSION['id'] ;?>" />
	</form>


