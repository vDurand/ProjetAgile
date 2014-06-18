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
		
		<?php

	if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
		echo '';
	else
		echo 'Erreur';

	$name=strtoupper(addslashes($_POST["name"]));
	$price=($_POST["price"]);

	$query = "INSERT INTO Pizza (PIZ_Nom, PIZ_Prix) VALUES ('$name', '$price')";

  	$sql = mysqli_query($db, $query);
  	$errr=mysqli_error($db);

  	if($sql){
	        echo '<div id="good">     
	            <label>Pizza ajouté avec succès</label>
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