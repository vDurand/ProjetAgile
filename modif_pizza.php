<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion de pizza</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<!-- IUT Caen - DUT Info (2013-2015) -->
	</head>

	<body>
		<table>
			<tr>
				<td><a id="button" href="ajout_pizza.php">Ajouter une pizza</a></td>
				<td><a id="button" href="commande.php">Commander une pizza</a></td>
				<td><a id="button" href="listComm.php">Liste des commandes</a></td>
				<td><a id="button" href="listPizza.php">Liste des pizza</a></td>
			</tr>
		</table>
		<br/><br/>
		<h1>Modification de pizza</h1>
		<a id="button" href="home.php">Retour Liste Pizza</a>
		<br/><br/>

		<?php

	if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
		echo '';
	else
		echo 'Erreur';

	$num=($_POST["num"]);
	
	$reponse = mysqli_query($db, "SELECT * FROM Pizza WHERE PIZ_IdPizza='$num'");
	
	$donnees = mysqli_fetch_assoc($reponse)
		?>

			<form method="post" action="postModif_pizza.php">
			<fieldset>
			<p>
			<label for="name">Nom : </label><input required name="name" type="text" id="name" value="<?php echo $donnees['PIZ_Nom']; ?>"/><br />
			<label for="price">Prix : </label><input required type="text" name="price" id="price"  value="<?php echo $donnees['PIZ_Prix']; ?>"/><br />
			<input type="hidden" name="num" value="<?php echo $num; ?>">
			<label for="suppr">Supprimer : </label><input type="checkbox" name="suppr" value="1"> 
			</p>
			</fieldset>
			<table>
			<tr><td><input type="submit" value="Modifier" /></td>
			<td><input type="reset" value="Reset"></td></tr></table></form>
	
						
			</body>
	<footer>
		<div>
			Projet Agile <?php echo date('Y');?>
		</div>
	</footer>

</html>