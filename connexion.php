<html>
	<body>
		<form method="post" action="connexion.php">
			<fieldset>
			<legend>Connexion</legend>
			<p>
			<label for="pseudo">Pseudo : </label><input name="pseudo" type="text" id="pseudo" /><br />
			<label for="password">Mot de Passe : </label><input type="text" name="password" id="password" />
			</p>
			</fieldset>
			<table>
			<tr><td><input type="submit" name="confirmer" value="Connexion" /></td>
			<td><input type="reset" value="Reset"></td></tr></table></form>
			</div>
			</body>
			</html>
		<?php
		
	if(!empty($_POST['confirmer']))
	{
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
		
			
		$pseudo = $_POST['pseudo'];
		$password = $_POST['password'];
		
		$sql="SELECT PER_Pseudo, PER_Mdp FROM Personne WHERE PER_Pseudo='$pseudo'";
		
		
		$req = mysqli_query($db, $sql); //or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

		$data = mysqli_fetch_assoc($req);
		
		// Le login est-il rempli ?//
			// L'utilisateur n'a pas rempli les champs //
			if(empty($_POST['pseudo']) and empty($_POST['password'])) {
				
					echo $message = 'remplissez les champs correspondants';}
			else
			{		
				if(empty($_POST['pseudo'])){
					
					echo $message = 'Veuillez indiquer votre pseudo svp !';}
				 else// Le mot de passe est-il rempli ?
				{				
					if(empty($_POST['password'])){
					
						echo $message = 'Veuillez indiquer votre mot de passe svp !';}
					 else// Le login est-il correct ?
					{				
						if($_POST['pseudo'] != $data['PER_Pseudo']){
						

							echo $message = 'Votre login est faux !';}
						 else// Le mot de passe est-il correct ?
						{				
							if($_POST['password']!== $data['PER_Mdp']){
							
								echo $message = 'Votre mot de passe est faux !';}
						 
						     // On vérifie que son mot de passe est correct

					
				
						 
						else// L'identification a réussi
						
							{ 
								

								//$_SESSION['Melproprio'] = $Melproprio;
								
								if ($_POST['pseudo'] ==  $data['PER_Pseudo'] && $_POST['password'] ==  $data['PER_Mdp'])
								{
									$pseudo= $_POST['pseudo'];
									$sql = "SELECT * FROM Patron JOIN Personne USING(PER_Id) WHERE PER_Pseudo='$pseudo'";
									$req = mysqli_query($db, $sql);
									$data = mysqli_fetch_assoc($req);
									if($data['PER_Id'] != ""){
										echo("Vous êtes le patron");
									}
									$sql = "SELECT * FROM Client JOIN Personne USING(PER_Id) WHERE PER_Pseudo='$pseudo'";
									$req = mysqli_query($db, $sql);
									$data = mysqli_fetch_assoc($req);
									if($data['PER_Id'] != ""){
										echo("Vous êtes le Client");
									}
									$sql = "SELECT * FROM Employer JOIN Personne USING(PER_Id) WHERE PER_Pseudo='$pseudo'";
									$req = mysqli_query($db, $sql);
									$data = mysqli_fetch_assoc($req);
									if($data['PER_Id'] != ""){
										echo("Vous êtes un employer");
									}
									$sql = "SELECT * FROM Pizzaiolo JOIN Personne USING(PER_Id) WHERE PER_Pseudo='$pseudo'";
									$req = mysqli_query($db, $sql);
									$data = mysqli_fetch_assoc($req);
									if($data['PER_Id'] != ""){
										echo("Vous êtes le Pizzaiolo");
									}
								session_start();
								$pseudo = $_SESSION['pseudo'];	
								echo $pseudo;
								echo '<br>bienvenue ';

								}
							}
						}
					}
				}
			}
	}
		?>
	</body>
</html>