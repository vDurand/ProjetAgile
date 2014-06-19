<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion de pizza</title>
		<link rel="stylesheet" type="text/css" href="index.css"/>
		<!-- IUT Caen - DUT Info (2013-2015) -->
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
		<script type='text/javascript'>
		
		function onHover()
		{
		    $("#logo").attr('src', 'http://vdurand.com/Agile/logoHover.png');
		}
		
		function offHover()
		{
		    $("#logo").attr('src', 'http://vdurand.com/Agile/logo.png');
		}
		
		</script>
	</head>

	<body>
	<div id="wrapper" background-color="white">
			<div id="entete">
				<div id="navi">
					<nav>
						<a href="home.php"><img id="logo" src="http://vdurand.com/Agile/logo.png" onmouseover="onHover();" onmouseout="offHover();"></a>
						<ul class="bandeau">
							<li id="champs"><a href="home.php">Accueil</a></li>
							<li id="champs"><a href="listPizza.php">Pizza</a></li>
							<li id="champs"><a href="listComm.php">Commandes</a></li>
	        				<li id="champs"><a href="ajout_pizza.php">Ajouter</a></li>
							<li id="champs"><a href="commande.php">Commander</a></li>
							<li id="champs"><a href="client.php">Client</a></li>
							<li id="champs"><a href="connexion.php">Connexion</a></li>
						</ul>	
					</nav>
				</div>
			</div>
		</div>