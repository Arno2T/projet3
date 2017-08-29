<?php

foreach ($posts as $post)
{?> 
	<article>
		<h2><?php echo $post['title'] ?></h2>
		<p><?php echo $post['content']?></p>
		<date><?php echo $post['date_post']?> </date>
	</article>


<?php
}
?>