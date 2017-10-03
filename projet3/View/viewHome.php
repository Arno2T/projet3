<?php

foreach ($posts as $post) 
{?>

	<div class="container">
		<div class="row centered mt mb">
			<div class="col-lg-12">
			<h1><?php echo $post->getTitle(); ?></h1>
			</div>
			<div class="col-lg-12">
			<p><?php echo $post->getContent(); ?></p>
			</div>
		</div><!--row-->
	</div><!--container-->

	
<?php
}
?>



