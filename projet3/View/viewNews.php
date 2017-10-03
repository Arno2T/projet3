<?php

foreach ($posts as $post)
{?> 
	
			<article>
			<h1><?php echo $post->getTitle(); ?></h1>
			
				<p><?php echo $post->getContent();?></p>
				<date><?php echo '<p class="date"><em>'.$post->getDate().'</em></p>';?> </date>
			
		</article>
		
<?php
}
?>