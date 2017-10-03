<h3>Données utilisateur</h3>

<p><?php echo $user->getLogin();?></p>
<p><?php echo $user->getEmail()?></p>
<p><?php echo $user->getFirstName();?></p>
<p><?php echo $user->getLastName();?></p>
<p><?php echo $user->getRole()?></p>


<form method="post" action=<?php echo '"index.php?action=a2t-admin&module=users&id='.$user->getId().'&submit=update"'?>>
	<label for="role">Rôle: </label><select name="role" id="role">
		<option value="user">Utilisateur</option>
		<option value="admin">Administrateur</option>
	</select>
	<input type="submit" value="Modifier" />
</form>