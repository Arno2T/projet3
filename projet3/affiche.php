<?php

$db= new PDO('mysql: host=localhost; dbname=p3_blog; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

$req= $db->prepare('SELECT login, password FROM Users WHERE login=:login');
$req->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
$req->execute();
$data=$req->fetch();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Affiche</title>
</head>
<body>
	<form method="post" action="">
	<input type="text" name="login" placeholder="login" />
	<input type="submit" name="Valider">
	</form>

	<?php 
		echo $data['login'].' = '.$data['password'];
	?>

</body>
</html>


