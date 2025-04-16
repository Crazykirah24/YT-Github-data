<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Media Logique</title>
</head>
<body>
	<center><h1>Media</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		Selectionnez une photo :
		<select name="sai_rechercher">
			<?php if (!empty($ListeMedia)) {
				foreach ($ListeMedia as $key => $value) {
			?>
			<option value="<?php echo $value['id']; ?>"><?php echo $value['nom']; ?></option>	
				<?php }} ?>
		</select>
		<button name="btn-rechercher">Rechercher</button>
		<br><br>
		<table>
			<tr>
				<td>ID :</td>
				<td> <input type="text" name="sai_fichier" value="<?php echo $id ?>"> :</td>
			</tr>
			<tr>
				<td>Photo :</td>
				<td> <input type="file" name="sai_fichier"> :</td>
			</tr>
			<?php if (!empty($sol)) {
				?>
			<tr>
				<td>Image : </td>
				<td><img src="data:<?php echo $extension; ?>;base64,<?php echo base64_encode($piece_jointe); ?>"></td>
			</tr>
			<?php } ?>
		</table>
		<br>
		<button name="btn-ajouter">Ajouter</button>
		<button name="btn-modifier">Modifier</button>
		<button name="btn-supprimer">Supprimer</button>
		<button name="btn-liste">Liste des produits</button>
	</form>
	</center>
</body>
</html>