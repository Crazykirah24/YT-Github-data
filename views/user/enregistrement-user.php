<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Saisie d'utilisateur</title>
</head>
<body>
	<center>
		<h1>Saisie d'utilisateur</h1>
		<form action="" method="POST">
			Saisir matricule : <input type="text" name="sai_rechercher"><button name="btn-rechercher">Rechercher</button><br><br>
					
			<table>
				<tr>
					<td>Matricule :</td>
					<td><input type="text" name="sai_matricule" value="<?php echo $matricule; ?>"></td>
				</tr>
				<tr>
					<td>Nom :</td>
					<td><input type="text" name="sai_nom" value="<?php echo $nom; ?>"></td>
				</tr>
				<tr>
					<td>Prenom :</td>
					<td><input type="text" name="sai_prenom" value="<?php echo $prenom; ?>"></td>
				</tr>
				<tr>
					<td>Login :</td>
					<td><input type="text" name="sai_login" value="<?php echo $login; ?>"></td>
				</tr>
				<tr>
					<td>Mdp :</td>
					<td><input type="password" name="sai_mdp" value="<?php echo $mdp; ?>"></td>
				</tr>
				<tr>
					<td>Téléphone :</td>
					<td><input type="text" name="sai_telephone" value="<?php echo $telephone; ?>"></td>
				</tr>
				<tr>
					<td>Utilisateur :</td>
					<td><input type="text" name="sai_user" value="<?php echo $nomUtilisateur; ?>"></td>
				</tr>
			</table>
			<button name="btn-ajouter">Ajouter</button>
			<button name="btn-modifier">Modifier</button>
			<button name="btn-supprimer">Supprimer</button>
		</form>
	</center>
</body>
</html>