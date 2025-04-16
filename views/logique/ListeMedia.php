<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Liste-Media</title>
</head>
<body>
	<center>
		<h1>Liste des Produits</h1>
		<table border="1" width="500px">
			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Photo</th>

			</tr>
			<?php if (!empty($logique)) {
				foreach ($logique as $key => $value) {
					 $imageBase64 = base64_encode($value['photo']); // Convertir en base64
                
                $imageSrc = "data:image;base64,$imageBase64"; // Générer l'URL de l'image
				?>
				<tr>
					<td><?php echo $value['id']; ?></td>
					<td><?php echo $value['nom']; ?></td>
					<td><?php echo "<img src='data: $imageSrc'>"; ?></td>
				</tr>
				<?php }} ?>
		</table>
	</center>
</body>
</html>