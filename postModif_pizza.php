<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion de pizza</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<!-- IUT Caen - DUT Info (2013-2015) -->
	</head>

	<body>
	
		<h1> <a href="home.php">Pizza</a></h1>
		<table>
			<tr>
				<td><a id="button" href="ajout_pizza.php">Ajouter une pizza</a></td>
				<td><a id="button" href="commande.php">Commander une pizza</a></td>
				<td><a id="button" href="listComm.php">Liste des commandes</a></td>
				<td><a id="button" href="listPizza.php">Liste des pizza</a></td>
			</tr>
		</table>
		<br/><br/>
		<?php

	if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
		echo '';
	else
		echo 'Erreur';

	$name=strtoupper(addslashes($_POST["name"]));
	$price=($_POST["price"]);
	$num=($_POST["num"]);
	$suppr=($_POST["suppr"]);
	
	
	if ($suppr==1) {
		$query2 = "UPDATE Pizza SET PIZ_Valide = 0 WHERE PIZ_IdPizza = '$num';";
		
		  	$sql2 = mysqli_query($db, $query2);
		  	$errr2=mysqli_error($db);
		  	
		  	if($sql2){
		  	      echo '<div id="good">     
		  	          <label>Pizza supprimée</label>
		  	          </div>';
		  	}
	}
	else {
		$query = "UPDATE Pizza SET PIZ_Nom = '$name', PIZ_Prix = '$price' WHERE PIZ_IdPizza = '$num';";
		
		  	$sql = mysqli_query($db, $query);
		  	$errr=mysqli_error($db);
		
		  	if($sql){
			        echo '<div id="good">     
			            <label>Pizza modifiée avec succès</label>
			            </div>';
            }
	}
	?>			<br/><br/>				
			</body>
	<footer>
		<div>
			&copy; Projet Agile <?php echo date('Y');?>
		</div>
	</footer>

</html>