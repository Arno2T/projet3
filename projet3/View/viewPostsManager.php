<p><a href="index.php?action=a2t-admin&module=new"> Ajouter un nouvel article </a></p>

	<table class="table">
		
			<tr>
				<th>Titre</th>
				<th>Catégorie</th>
				<th>Date</th>
				<th>Supprimer</th>
			</tr>
	<?php
	foreach ($posts as $post) 
	{?>
		
		<tr>
			<td><?php echo '<a href="index.php?action=a2t-admin&module=Posts&id='.$post['id'].'">'?><?php echo $post['title']; ?></a></td>
			<td><?php echo $post['category']; ?></td>
			<td> <?php echo $post['date_post']; ?></td>
			<td><?php echo '<a href="index.php?action=a2t-admin&module=Posts&id='.$post['id'].'&submit=delete">'?> Supprimer l'article </a></td>
		</tr>
	<?php
	}?>
		
	</table>

	
	
