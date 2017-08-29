<!DOCTYPE html>
<html>
	<head>
		<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
		  <script src="https://cloud.tinymce.com/stable/plugins.min.js?apiKey=9qp6br4dhr9gb9lz23gqopdxb7m1wdc4ef02mvjfvwitqw4g"></script>
		  <script>
  			tinymce.init({
    		selector: '#textarea'
  			});
  		</script>
	</head>
	<body>
	
<form method="post" action=<?php echo '"index.php?action=a2t-admin&module='.$module.$id.'&submit=publish"'?> >
	
	<p><label for="title">Titre de l'article: </label><input type="text" name="title" id="title" value="<?php echo $title; ?>" required/></p>
	<p><label for="content">Texte de l'article: <br /></label><textarea id="textarea" name="content" required > <?php echo $content; ?></textarea></p>
	<p><label for="category">Dans quelle catégorie souhaitez-vous publier votre article?</label></p>
	<p><select name="category" id="category">
		<option value="Accueil"> Accueil </option>
		<option value="Episode"> Episodes </option>
		<option value="Actualites"> Actualités</option>
	</select> </p>
	<input type="submit" value="Publier" />
</form>

</body>