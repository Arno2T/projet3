<?php


	foreach($posts as $post)
	{ ?>
	    <article>
	    	<?php echo '<h2><a href="index.php?action=Posts&id='.$post->getId().'">'.$post->getTitle().'</a></h2>';
	    	      echo '<p>'.$post->getResume().'</p>';
	    	      echo  '<p class="date"><em>publié le <time>'.$post->getDate().'</time></em></p>'; ?>
	    </article>
	<?php
	} ?>