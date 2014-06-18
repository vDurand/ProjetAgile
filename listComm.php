<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion de pizza</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<!-- IUT Caen - DUT Info (2013-2015) -->
	</head>

	<body>
		<h1>Commande de Pizza</h1>
		<table>
			<tr>
				<td><a id="button" href="ajout_pizza.php">Ajouter une pizza</a></td>
				<td><a id="button" href="commande.php">Commander une pizza</a></td>
				<td><a id="button" href="listComm.php">Liste des commandes</a></td>
				<td><a id="button" href="listPizza.php">Liste des pizza</a></td>
			</tr>
		</table>
		<br/><br/>
		<div id ="list">
		<?php

	if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
		echo '';
	else
		echo 'Erreur';
	
	$reponse = mysqli_query($db, "SELECT * FROM Commander JOIN Pizza USING (PIZ_IdPizza) JOIN Client USING (CLI_IdClient) JOIN Personne USING (PER_Id)");
	
	while ($donnees = mysqli_fetch_assoc($reponse))
	{
		?>	>Pizza : <?php echo $donnees['PIZ_Nom']; ?>
			<br/>
			Prix unitaire : <?php echo $donnees['PIZ_Prix']; ?> &euro;
			<br/>
			Quantité : <?php echo $donnees['COM_Quantite']; ?>
			<br/>
			Prix total : <?php echo $donnees['COM_Quantite']*$donnees['PIZ_Prix']; ?> &euro;
			<br/>
			Client : <?php echo $donnees['PER_Nom']; ?> <?php echo $donnees['PER_Prenom']; ?>
			<br/><br/>
				        	<?php
	}
	mysqli_free_result($reponse);
	?>				</div>			
			</body>
	<footer>
		<div>
			&copy; Projet Agile <?php echo date('Y');?>
		</div>
	</footer>

</html>
