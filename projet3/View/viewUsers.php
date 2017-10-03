
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
			<td><?php echo '<a href="index.php?action=a2t-admin&module=users&id='.$user->getId().'">'?><?php echo $user->getLogin(); ?></a></td>
			<td><?php echo $user->getFirstName(); ?></td>
			<td> <?php echo $user->getLastName(); ?></td>
			<td> <?php echo $user->getEmail(); ?></td>
			<td> <?php echo $user->getRole(); ?></td>
			<td><?php echo '<a class="delete" href="index.php?action=a2t-admin&module=users&id='.$user->getId().'&submit=delete">'?>Supprimer l'utilisateur</a></td>
		</tr>
	<?php
	}?>
	</table>