<?php


	foreach($posts as $post)
	{ ?>
	    <article>
	    	<?php echo '<h2><a href="index.php?action=Posts&id='.$post['id'].'">'.$post['title'].'</a></h2>';
	    	      echo '<p>'.substr($post['content'], 0, 500).'</p>';
	    	      echo  '<p class="date"><em>publié le <time>'.$post['date_post'].'</time><em></p>'; ?>
	    </article>
	<?php
	} ?>