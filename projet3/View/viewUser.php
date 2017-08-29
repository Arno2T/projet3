<h3>Données utilisateur</h3>

<p><?php echo $user['login']?></p>
<p><?php echo $user['email']?></p>
<p><?php echo $user['firstName']?></p>
<p><?php echo $user['lastName']?></p>
<p><?php echo $user['role']?></p>


<form method="post" action=<?php echo '"index.php?action=a2t-admin&module=users&id='.$user['id'].'&submit=update"'?>>
	<label for="role">Rôle: </label><select name="role" id="role">
		<option value="user">Utilisateur</option>
		<option value="admin">Administrateur</option>
	</select>
	<input type="submit" value="Modifier" />
</form>