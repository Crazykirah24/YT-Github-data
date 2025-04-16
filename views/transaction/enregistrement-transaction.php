<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaction</title>
</head>
<body>
	<center>
		<form action="" method="POSt">
			<h2>Transaction</h2>
			<table>
				<tr>
					<td>Expediteur : </td>
					<td><input type="text" name="sai_expediteur"></td>
				</tr>
				<tr>
					<td>Destinataire : </td>
					<td><input type="text" name="sai_destinataire"></td>
				</tr>
				<tr>
					<td>Montant : </td>
					<td><input type="number" min="0" name="sai_montant"></td>
				</tr>
				<tr>
					<td>Code de confirmation : </td>
					<td><input type="text" name="sai_code"></td>
				</tr>
			</table>
			<br>
			<button name="btn-valider">Valider</button>
		</form>
	</center>
</body>
</html>