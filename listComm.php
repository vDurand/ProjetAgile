<?php  
    include('bandeau.php');
?>
<div id="corps">
	<h1>Commande de Pizza</h1>
	<br/><br/>
			<div id ="list">
			<?php
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
			
		$orderIdd=addslashes($_POST["orderId"]);	
		if ($orderIdd!="") {
			$query1 = "UPDATE `Agile`.`Order` SET `ORD_Paid` = '1' WHERE `Order`.`ORD_Id` = $orderIdd;";
			$sql1 = mysqli_query($db, $query1);
			$errr1=mysqli_error($db);
			if ($sql1) {
				echo "Commande payée";
			}
		}	
			
		
		$reponse = mysqli_query($db, "SELECT * FROM Agile.Order JOIN Client USING(CLI_IdClient) JOIN Personne USING(PER_Id) ORDER BY ORD_Id DESC");
		
		while ($donnees = mysqli_fetch_assoc($reponse))
		{
			if ($donnees['ORD_Paid']!=1) {
				
			?><fieldset style="margin-top:1%;">
				<legend  align="left"> Client : <?php echo $donnees['PER_Nom']; ?> <?php echo $donnees['PER_Prenom']; ?></legend>
				<br/><br/>
				<?php
				$order = $donnees['ORD_Id'];
				$reponse2 = mysqli_query($db, "SELECT * FROM Commander JOIN Pizza USING(PIZ_IdPizza) WHERE ORD_Id=$order");
				
				$i=0;
				
				while ($donnees2 = mysqli_fetch_assoc($reponse2))
				{
				 ?>
				Pizza : <?php echo $donnees2['PIZ_Nom']; ?>
				<br/>
				Prix unitaire : <?php echo $donnees2['PIZ_Prix']; ?> &euro;
				<br/>
				Quantité : <?php echo $donnees2['COM_Quantite']; ?>
				<br/>
				Prix total : <?php echo $donnees2['COM_Quantite']*$donnees2['PIZ_Prix']; $totaux[$i]=$donnees2['COM_Quantite']*$donnees2['PIZ_Prix']; $i++;?> &euro;
				<br/><br/>
					        	<?php
					        	}
					        	$res=0;
					        for($j=0;$j<$i;$j++) {
					        	$res+=$totaux[$j];
					        }
					        	?>
					        	<b>Total global : <?php echo $res; ?> &euro;</b>
					        	<br/><br/>
					        	<i>Etat : 
					        	<?php
					        	if ($donnees['ORD_Pret']==1) {
					        	?>
					        		Prete
					        		<form method="post" action="">
					        		<input type="hidden" name="orderId" value="<?php echo $donnees['ORD_Id']; ?>">
					        		<input type="submit" value="Payer" />
					        		</form>
					        		</br>
					        	<?php
					        	}
					        	else {
					        	?>
					        		En attente
					        		<form method="post" action="">
					        		<input type="hidden" name="orderId" value="<?php echo $donnees['ORD_Id']; ?>">
					        		<input type="submit" value="Payer" />
					        		</form>
					        		</br>
					        	<?php
					        	}
			?></i><br/></fieldset><?php
				}	        	
		}
		mysqli_free_result($reponse);
		?>				
		</div>
</div>
<?php  
  include('footer.php');
?>