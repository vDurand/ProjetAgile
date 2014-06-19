<?php  
    include('bandeau.php');
?>
<div id="corps">
			<?php
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
				
		$j=0;
		foreach($_POST["number"] AS $num){
			$quantite[$j] = $num;
			$j++;
		}
		$i=0;
		
		$exist=addslashes($_POST["exist"]);
		$client=addslashes($_POST["client"]);
		$nom=addslashes($_POST["nomC"]);
		$prenom=addslashes($_POST["prenomC"]);
		
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
					$client=$donnees2['CLI_IdClient'];
				}
			}
		}
		
		$queryTres = "INSERT INTO Agile.Order (CLI_IdClient) VALUES ($client)";
		$sqlTres = mysqli_query($db, $queryTres);
		$errrTres=mysqli_error($db);
		if ($sqlTres) {
			$reponse4 = mysqli_query($db, "SELECT ORD_Id FROM Agile.Order WHERE CLI_IdClient='$client' ORDER BY ORD_Id DESC LIMIT 1");
			$donnees4 = mysqli_fetch_assoc($reponse4);
			$clef=$donnees4['ORD_Id'];
		}
		
		
		foreach($_POST["pizza"] AS $pizza){
		   $number=$quantite[$i];
		   $i++;
		   
		   $query3 = "INSERT INTO Commander (PIZ_IdPizza, COM_Quantite, ORD_Id) VALUES ('$pizza', '$number', $clef)";
		   $sql3 = mysqli_query($db, $query3);
		   $errr3=mysqli_error($db);
		   if($sql3){
	     		echo '<div id="good">     
	     		    <label>Pizza commandée avec succès</label>
	     		    </div>';
		   }
		}
		   
		   		 /*  else {
		   	$queryTres = "INSERT INTO `Agile`.`Order` (`CLI_IdClient`, `ORD_Id`) VALUES ($client, $numI, $clef)";
		   
		   	$query = "INSERT INTO Commander (PIZ_IdPizza, COM_Quantite) VALUES ('$pizza', '$number')";
		   	
		   	  	$sql = mysqli_query($db, $query);
		   	  	$errr=mysqli_error($db);
		   	
		   	  	if($sql){
		   	  		$reponse3 = mysqli_query($db, "SELECT COM_Id FROM Commander WHERE PIZ_IdPizza='$pizza' AND COM_Quantite='$number' ORDER BY COM_Id DESC LIMIT 1");
		   	  		$donnees3 = mysqli_fetch_assoc($reponse3);
		   	  		$numI=$donnees3['COM_Id'];
		   	  		$queryTres = "INSERT INTO `Agile`.`Order` (`CLI_IdClient`, `COM_Id`, `ORD_Id`) VALUES ($client, $numI, $clef)";
		   	  		
	   	  		  	$sqlTres = mysqli_query($db, $queryTres);
	   	  		  	$errrTres=mysqli_error($db);
	   	  		  	if ($sqlTres) {
	   	  		  		$reponse4 = mysqli_query($db, "SELECT ORD_Id FROM Agile.Order WHERE COM_Id='$numI' ORDER BY COM_Id DESC LIMIT 1");
	   	  		  		$donnees4 = mysqli_fetch_assoc($reponse4);
	   	  		  		$clef=$donnees4['ORD_Id'];
	   	  		  		echo '<div id="good">     
	   	  		  		    <label>Pizza commandée avec succès</label>
	   	  		  		    </div>';
	   	  		 	}
		   	  		  	
		   		}
		   }*/
		   
		
				
			?>
</div>
<?php  
  include('footer.php');
?>