
<form method="post" action="index.php?action=contact&submit=send" >

	<p><label for="name">Nom: </label><input type="text" name="name" id="name" placeholder="votre nom" /></p>
	<p><label for="email">Email: </label><input type="email" name="email" id="email" placeholder="votre email" /></p>
	<p><label for="subject">Objet du message: </label><input type="text" name="subject" id="subject" placeholder="sujet du message" /></p>
	<p><textarea name="content"> Votre message</textarea></p>
	<p><input type="submit" name="submit" value="Envoyer" /></p>
</form>