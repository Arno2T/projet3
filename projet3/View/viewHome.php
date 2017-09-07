<?php

foreach ($posts as $post) 
{?>

	<div class="container">
		<div class="row centered mt mb">
			<div class="col-lg-12">
			<h1><?php echo $post['title']; ?></h1>
			</div>
			<div class="col-lg-12">
			<p><?php echo $post['content']; ?></p>
			</div>
		</div><!--row-->
	</div><!--container-->

	
<?php
}
?>



