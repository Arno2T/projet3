<?php

foreach ($posts as $post) 
{?>
<article>
	<h2><?php echo $post['title']; ?></h2>
	<p><?php echo $post['content']; ?></p>
	
</article>
	
<?php
}
?>



