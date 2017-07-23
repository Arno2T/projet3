<?php

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title> Jean Forteroche </title>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="index.php?action=Posts">Episodes</a></li>
				<li><a href="#">Actualités</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<hr />
		</nav>
		<div id="content">
		<?php echo $content; ?>
		</div><!--content-->

	</body>
</html>