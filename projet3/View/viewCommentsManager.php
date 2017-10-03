<table class="table">
	<tr>
		<th>Commentaires</th>
		<th>Date</th>
		<th>Pseudo</th>
		<th>Signalement</th>
		<th>Supprimer</th>
	</tr>
	<?php 
	foreach ($comments as $comment) 
	{?>
	<tr>
		<td><?php echo $comment->getContent();?></td>
		<td><?php echo $comment->getDate(); ?></td>
		<td><?php echo $comment->getLogin(); ?></td>
		<td><?php echo $comment->getModerate();?></td>
		<td><?php echo '<a class="delete" href="index.php?action=a2t-admin&module=moderate&id='.$comment->getId().'&submit=delete">Supprimer le commentaire</a>'?></td>
	</tr>
	<?php
	}?>

</table>