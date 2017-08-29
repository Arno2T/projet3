<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<title>Inscription</title>
	</head>
	<body>
		<form method="post" action="index.php?action=register">
			<p><label for="login">Pseudo: </label><input type="text" name="login" id="login" required /></p>
			<p><label for="email">Email: </label><input type="text" name="email" id="email" required /></p>
			<p><label for="password">Mot de passe: </label><input type="password" name="password" id="password" required /></p>
			<p><label for="password2">Confirmation mot de passe: </label><input type="password" name="password2" id="password2" required /></p>
			<p><label for="lastName">Nom: </label><input type="text" name="lastName" id="lastName" required/></p>
			<p><label for="firstName">Prénom: </label><input type="text" name="firstName" id="firstName" required /></p>
			<input type="submit" value="Valider" />
		</form>
		<a href="connexion.php">Retour à la connexion</a>
	</body>
</html>