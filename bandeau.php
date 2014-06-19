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
		<?php
			session_start();
			/*if(isset($_SESSION['user']))
				/*echo $_SESSION['nom'];
				echo $_SESSION['prenom'];
				if($_SESSION['user'] == "Clients")
					//echo $_SESSION['pts'];
			else
				echo "false"*/
		?>
	<div id="wrapper" background-color="white">
			<div id="entete">
				<div id="navi">
					<nav>
						<a href="home.php"><img id="logo" src="http://vdurand.com/Agile/logo.png" onmouseover="onHover();" onmouseout="offHover();"></a>
						<ul class="bandeau">
							<?php
								function affiche_pour($user, $bouton){
									if($_SESSION['user'] == $user)
										echo $bouton;
								}
							?>
							<li id="champs"><a href="home.php">Accueil</a></li>
							<li id="champs"><a href="listPizza.php">Pizzas</a></li>
							<? /*affiche_pour("Clients", "<li id=champs><a href=listPizza.php>Pizzas</a></li>");*/?>
							<? affiche_pour("Patron", "<li id=champs><a href=listPizza.php>Pizzas</a></li>");?>
							<? affiche_pour("Employer", "<li id=champs><a href=commande.php>Commander</a></li>");?>
							<? affiche_pour("Patron", "<li id=champs><a href=commande.php>Commander</a></li>");?>
							<? affiche_pour("Clients", "<li id=champs><a href=commandeClient.php>Commander</a></li>");?>
							<?affiche_pour("Patron", "<li id=champs><a href=ajout_pizza.php>Ajouter pizzas</a></li>");?>
	        				<?affiche_pour("Pizzaiolo", "<li id=champs><a href=listComm2.php>Liste commandes</a></li>");?>
							<? affiche_pour("Employer", "<li id=champs><a href=listComm.php>Liste commandes</a></li>");?>
							<? affiche_pour("Patron", "<li id=champs><a href=listComm.php>Liste commandes</a></li>");?>
							<? if(!isset($_SESSION['user'])){?>
								<li id="champs"><a href="connexion.php">Connexion</a></li>
								<?}
								else{?>
								<li id="champs"><a href="deco.php">Déconnexion</a></li>
								<?}?>
						</ul>
						
					</nav>
					
				</div>
			</div>
			<!--<div id="info">
							<? 
								/*echo $_SESSION['nom'];
								?> <br> <?
								echo $_SESSION['prenom'];
								?> <br> <?
								if($_SESSION['user'] == "Clients")
								echo $_SESSION['pts'];*/
							?>
						</div>-->
		</div>