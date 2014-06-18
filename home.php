<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion de pizza</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<!-- IUT Caen - DUT Info (2013-2015) -->
	</head>

	<body>
		<h1>Pizza</h1>
		<div id = "button"> 
			<a href="ajout_pizza.php">Ajouter une pizza</a>
		</div>
		<br/><br/>
		<div id ="list">
		<?php

	if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
		echo '';
	else
		echo 'Erreur';
	
	$reponse = mysqli_query($db, "SELECT * FROM Pizza");
	
	while ($donnees = mysqli_fetch_assoc($reponse))
	{
		if($donnees['PIZ_Valide']==1){
		?>	>Nom pizza : <?php echo $donnees['PIZ_Nom']; ?>
			<br/>
			Prix pizza : <?php echo $donnees['PIZ_Prix']; ?> &euro;
			<br/>
			<form method="post" action="modif_pizza.php">
			<input type="hidden" name="num" value="<?php echo $donnees['PIZ_IdPizza']; ?>">
			<input type="submit" value="Modifier" />
			</form>
			<br/><br/>
				        	<?php
		}
	}
	mysqli_free_result($reponse);
	?>				</div>			
			</body>
	<footer>
		<div>
			&copy; Projet Agile <?php echo date('Y');?>
		</div>
		<form method="post" action="home.php">
			<input type="submit" value="Retour à l'acceuil" />
		</form>
	</footer>

</html>
