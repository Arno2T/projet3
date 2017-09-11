
	<article id="post">
		<header>
			<h2><?php echo $post['title']  ?></h2>
		</header>
		<p><? echo $post['content'] ?></p>
		<footer class="date">
			<?php echo '<em>publié le <time>'.$post['date_post'].'</time></em>' ?>
		</footer>
	</article><!--post-->
	<hr />

	<?php 
	foreach($comments as $comment)
	{?>
	

	<div class="container">
	  <div class="row">
		<article id="comment">
			<p><?php echo $comment['content'] ?></p>
			<footer><em><?php echo 'publié le '.$comment['date_com'].' par '.$comment['login'].'<br />'; ?></em> 
			<form method="post" action=<?php echo '"index.php?action=comment&id='.$post['id'].'&idComment='.$comment['id'].'&submit=report"'?>>
				<input type="hidden" name="idPost" value="<?php echo $post['id'] ;?>" />
				<input type="submit" value="Signaler">
			</form>
			</footer>
			<hr />
		</article>
		</div>
	</div>
	
	<?php
	} ?>


	<form method="post" action="index.php?action=comment&id=<?php echo $post['id'] ;?>" >
		<p><label>Pseudo: </label><input id="login" name="login" type="text" value=<?php echo $_SESSION['login']; ?> required /></p>
		<p><label>Commentaire: </label><textarea id="comment" name="content" required>Votre commentaire</textarea></p>
		<p><input type="submit" value="Commenter" /></p>
		<p><input type="hidden" name="idPost" value="<?php echo $post['id'] ;?>" /></p>
		<p><input type="hidden" name="idUser" value="<?php echo $_SESSION['id'] ;?>" /></p>
	</form>
	



