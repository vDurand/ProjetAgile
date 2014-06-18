<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion de pizza</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<!-- IUT Caen - DUT Info (2013-2015) -->
	</head>

	<body>
	
		<h1>Ajout de pizza</h1>
		<br/>
<table>
	<tr>
		<td><a id="button" href="ajout_pizza.php">Ajouter une pizza</a></td>
		<td><a id="button" href="commande.php">Commander une pizza</a></td>
		<td><a id="button" href="listComm.php">Liste des commandes</a></td>
		<td><a id="button" href="listPizza.php">Liste des pizza</a></td>
	</tr>
</table>
<br/><br/>
			<form method="post" action="post_pizza.php">
			<fieldset>
			<p>
			<label for="name">Nom : </label><input required name="name" type="text" id="name" /><br />
			<label for="price">Prix : </label><input required type="text" name="price" id="price" />
			</p>
			</fieldset>
			<table>
			<tr><td><input type="submit" value="Ajouter" /></td>
			<td><input type="reset" value="Reset"></td></tr></table></form>
	
						
			</body>
	<footer>
		<div>
			Projet Agile <?php echo date('Y');?>
		</div>
	</footer>

</html>