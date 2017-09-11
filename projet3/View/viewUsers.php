
<table class="table">
		<tr>
			<th>Login</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Rôle</th>
		</tr>
		<?php
	foreach ($users as $user) 
	{?>
		
		<tr>
			<td><?php echo '<a href="index.php?action=a2t-admin&module=users&id='.$user['id'].'">'?><?php echo $user['login']; ?></a></td>
			<td><?php echo $user['firstName']; ?></td>
			<td> <?php echo $user['lastName']; ?></td>
			<td> <?php echo $user['email']; ?></td>
			<td> <?php echo $user['role']; ?></td>
			<td><?php echo '<a class="delete" href="index.php?action=a2t-admin&module=users&id='.$user['id'].'&submit=delete">'?>Supprimer l'utilisateur</a></td>
		</tr>
	<?php
	}?>
	</table>