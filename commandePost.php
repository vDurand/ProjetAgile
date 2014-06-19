<?php  
    include('bandeau.php');
?>
<div id="corps">
			<?php
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
	
		$pizza=addslashes($_POST["pizza"]);
		$number=addslashes($_POST["number"]);
		$client=addslashes($_POST["client"]);
		$nom=addslashes($_POST["nomC"]);
		$prenom=addslashes($_POST["prenomC"]);
		$exist=addslashes($_POST["exist"]);
		
		if ($exist=="0") {
			$query1 = "INSERT INTO Personne (PER_Nom, PER_Prenom) VALUES ('$nom', '$prenom')";
			$sql1 = mysqli_query($db, $query1);
			$errr1=mysqli_error($db);
			if ($sql1) {
				$reponse = mysqli_query($db, "SELECT PER_Id FROM Personne WHERE PER_Nom='$nom' AND PER_Prenom='$prenom' ORDER BY PER_Id DESC LIMIT 1");
				$donnees = mysqli_fetch_assoc($reponse);
				$numP = $donnees['PER_Id'];
				
				$query2 = "INSERT INTO Client (PER_Id) VALUES ('$numP')";
				$sql2 = mysqli_query($db, $query2);
				$errr2=mysqli_error($db);
				if ($sql2) {
					$reponse2 = mysqli_query($db, "SELECT * FROM Client WHERE PER_Id='$numP' ORDER BY CLI_IdClient DESC LIMIT 1");
					$donnees2 = mysqli_fetch_assoc($reponse2);
					$numC=$donnees2['CLI_IdClient'];
					
					$query3 = "INSERT INTO Commander (CLI_IdClient, PIZ_IdPizza, COM_Quantite) VALUES ('$numC', '$pizza', '$number')";
					$sql3 = mysqli_query($db, $query3);
					$errr3=mysqli_error($db);
					if($sql3){
					        echo '<div id="good">
					        	<label>Client ajouté avec succès</label>     
					            <label>Pizza commandée avec succès</label>
					            </div>';
					}
				}
			}
		}
		else {
			$query = "INSERT INTO Commander (CLI_IdClient, PIZ_IdPizza, COM_Quantite) VALUES ('$client', '$pizza', '$number')";
			
			  	$sql = mysqli_query($db, $query);
			  	$errr=mysqli_error($db);
			
			  	if($sql){
				        echo '<div id="good">     
				            <label>Pizza commandée avec succès</label>
				            </div>';
				}
		}
		
			?>									
				<br/><br/>
					        	<?php
		
		
		mysqli_free_result($reponse);
		?>
</div>
<?php  
  include('footer.php');
?>