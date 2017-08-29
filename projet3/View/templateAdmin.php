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
				<li><a href="index.php?action=Actualities">Actualités</a></li>
				<li><a href="index.php?action=contact">Contact</a></li>
			</ul>
			Bienvenue <?php echo $_SESSION['login']; ?>
			<a href="index.php?action=logout">Déconnexion</a>
			<hr />
		</nav>
		<nav>
			<ul>
				<li><a href="index.php?action=a2t-admin">Accueil</a></li>
				<li><a href="index.php?action=a2t-admin&module=Posts">Articles</a></li>
				<li><a href="index.php?action=a2t-admin&module=moderate">Modération</a></li>
				<li><a href="index.php?action=a2t-admin&module=users">Utilisateurs</a></li>
			</ul>
			<hr />
		</nav>

		<div>
			<?php echo $content ?>
		</div>
		<hr />
		<footer>
			<?php echo $_SESSION['adminLink']; ?>
		</footer>

	</body>
</html>