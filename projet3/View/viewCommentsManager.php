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
		<td><?php echo $comment['content'];?></td>
		<td><?php echo $comment['date_com']; ?></td>
		<td><?php echo $comment['login']; ?></td>
		<td><?php echo$comment['moderate'];?></td>
		<td><?php echo '<a class="delete" href="index.php?action=a2t-admin&module=moderate&id='.$comment['id'].'&submit=delete">Supprimer le commentaire</a>'?></td>
	</tr>
	<?php
	}?>

</table>