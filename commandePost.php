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
		<h1> <a href="home.php">Pizza</a></h1>
		
		<?php

	if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
		echo '';
	else
		echo 'Erreur';

	$pizza=addslashes($_POST["pizza"]);
	$number=addslashes($_POST["number"]);
	$client=addslashes($_POST["client"]);

	$query = "INSERT INTO Commander (CLI_IdClient, PIZ_IdPizza, COM_Quantite) VALUES ('$client', '$pizza', '$number')";

  	$sql = mysqli_query($db, $query);
  	$errr=mysqli_error($db);

  	if($sql){
	        echo '<div id="good">     
	            <label>Pizza commandée avec succès</label>
	            </div>';
		?>									
			<br/><br/>
				        	<?php
	
	}
	mysqli_free_result($reponse);
	?>							
			</body>
	<footer>
		<div>
			&copy; Projet Agile <?php echo date('Y');?>
		</div>
	</footer>

</html>