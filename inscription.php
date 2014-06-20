<? 
	include('bandeau.php');
?>

<div id="corps">
		<form method="post" action="inscription.php">
			<fieldset>
			<legend>Inscription</legend>
			<p>
				<label for="nom">Nom : </label><input name="nom" type="text" id="nom" required/><br />
				<label for="prenom">Prénom : </label><input name="prenom" type="text" id="prenom" required/><br />
				<label for="tel">Téléphone : </label><input name="tel" type="text" id="tel" required/><br />
				<label for="pseudo">Pseudo : </label><input name="pseudo" type="text" id="pseudo" required/><br />
				<label for="password">Mot de Passe : </label><input type="password" name="password" id="password" required/>
			</p>
			
			<table>
				<tr>
					<td>
						<input type="submit" name="confirmer" value="Connexion" />
					</td>
					<td>
						<input type="reset" value="Reset">
					</td>
				</tr>
			</table>
			
			<? if(!empty($_POST['confirmer']))
				{
					if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
						echo '';
					else
						echo 'Erreur';
						
					$nom = $_POST['nom'];
					$prenom = $_POST['prenom'];
					$tel = $_POST['tel'];
					$pseudo = $_POST['pseudo'];
					$password = $_POST['password'];
					if(strlen($tel) == 10){
					
						$sql = "INSERT INTO `Agile`.`Personne` (`PER_Id`, `PER_Nom`, `PER_Prenom`, `PER_Pseudo`, `PER_Mdp`, `PER_Telephone`) VALUES (NULL, '$nom', '$prenom', '$pseudo', '$password', '$tel')";
						$req = mysqli_query($db, $sql);
						
						$sql2 = "SELECT * FROM Personne WHERE PER_Pseudo = '$pseudo' AND PER_Mdp = '$password'";
						$req2 = mysqli_query($db, $sql2);
						
						$data = mysqli_fetch_assoc($req2);
						$id = $data['PER_Id'];
						$sql3 = "INSERT INTO `Agile`.`Client` (`CLI_IdClient`, `CLI_NbPts`, `PER_Id`) VALUES (NULL, '0', '$id')";
						$req = mysqli_query($db, $sql3);
						
						//session_start();
						//$_SESSION['user'] = "Clients";
						//$_SESSION['nom'] = $nom;
						//$_SESSION['prenom'] = $prenom;
						//$_SESSION['pts'] = '0';
				
						echo "Vous êtes bien inscrit, veuillez patientez vous allez  être redirigé.";
						header ("Refresh: 2;URL=home.php");
					}
					else{
						echo "Vous avez entré un mauvais numéro de téléphone.";
					}
					
					
					
				}
					
			?>
			</fieldset>
		</form>
	</div>
<? 
	include('footer.php');
?>