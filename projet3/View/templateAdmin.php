<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE-edge" />
		<meta name="viewport" content="width-device-width, initial-scale-1" />

		<title> Jean Forteroche </title>

		<!-- Bootstrap core CSS -->
		<link href="Content/assets/css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="Content/assets/css/style.css" rel="stylesheet">
	</head>
	<body>

	<!--Static navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button> 
		      <a class="navbar-brand" href="index.php"> Jean Forteroche</a>
		    </div><!--navbar-header-->
		    
		      <div class="navbar-collapse collapse">
		      	 
			    <ul class="nav navbar-nav navbar-right">
			  	  <li class="active"><a href="index.php">Accueil</a></li>
				  <li><a href="index.php?action=Posts">Episodes</a></li>
				  <li><a href="index.php?action=Actualities">Actualités</a></li>
				  <li><a href="index.php?action=contact">Contact</a></li>
				
			    </ul>
			  </div><!--/.nav-collapse -->
		  </div><!-- Container-->
		</div><!--navbae fixed-top-->

		  <div id="headerwrap">
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-lg-6 col-lg-offset-3">
			    			<h4>Les récits de</h4>
			    			<h1>Jean Forteroche</h1>
			    			<h4>Lisez, commentez, participez !</h4>
			    		</div>
			    	</div><!--/row-->
			    </div> <!--container-->
			</div> <!--headerwrap-->
			<hr />
		
			<ul>
				<li><a href="index.php?action=a2t-admin">Accueil</a></li>
				<li><a href="index.php?action=a2t-admin&module=Posts">Articles</a></li>
				<li><a href="index.php?action=a2t-admin&module=moderate">Modération</a></li>
				<li><a href="index.php?action=a2t-admin&module=users">Utilisateurs</a></li>
			</ul>
			<hr />

		<div>
			<?php echo $content ?>
		</div>
		<hr />
		<div id="footerwrap">
			<div class="container">
				<div class="row centered">
					<div class="col-lg-2 col-lg-offset-4">
					<?php echo $_SESSION['adminLink']; ?>	 
					</div>
					<div class="col-lg-2">
						<a href="index.php?action=logout">Déconnexion</a>
					</div>
				</div>
				<div class="row">
					<p> </p>
				</div>
				<div class="row centered">
				<p>Site créé à partir du thème <strong><a href="http://blacktie.co/demo/instant/">Instant</a></strong></p>
				</div>
			</div><!--container-->
		</div> <!--footerwrap-->



<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="Content/assets/js/bootstrap.min.js"></script> 
	</body>
</html>