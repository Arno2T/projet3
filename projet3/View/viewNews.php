<?php

foreach ($posts as $post)
{?> 
	<section id="works"></section>
	<div class="container">
		<div class="row centered mt mb">

			<h1><?php echo $post['title'] ?></h1>
			<div class="col-lg-8">
				<p><?php echo $post['content']?></p>
				<date><?php echo $post['date_post']?> </date>
			</div>
		</div><!--row-->
	</div><!--container-->
	


<?php
}
?>