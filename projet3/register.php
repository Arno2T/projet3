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

	<div id="connexion">
		<div class="container">
		  <div class="row">
		  	<div class="col-lg-6 col-lg-offset-3">
			<h2>Inscrivez-vous</h2>
			
			<form method="post" action="index.php?action=register">
				<p><label for="login">Pseudo: </label><input type="text" name="login" id="login" required /></p>
				<p><label for="email">Email: </label><input type="text" name="email" id="email" required /></p>
				<p><label for="password">Mot de passe: </label><input type="password" name="password" id="password" required /></p><div id="verif"></div>
				<p><label for="password2">Confirmation mot de passe: </label><input type="password" name="password2" id="password2" required /></p>
				<p><label for="lastName">Nom: </label><input type="text" name="lastName" id="lastName" required/></p>
				<p><label for="firstName">Prénom: </label><input type="text" name="firstName" id="firstName" required /></p>
				<input type="submit" value="Valider" />
			</form>
			<a href="connexion.php">Retour à la connexion</a>
			</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="Content/js/register.js"></script>
	</body>
</html>