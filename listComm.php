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
		
		$reponse = mysqli_query($db, "SELECT * FROM Commander JOIN Pizza USING (PIZ_IdPizza) JOIN Client USING (CLI_IdClient) JOIN Personne USING (PER_Id)");
		
		while ($donnees = mysqli_fetch_assoc($reponse))
		{
			?>	>Pizza : <?php echo $donnees['PIZ_Nom']; ?>
				<br/>
				Prix unitaire : <?php echo $donnees['PIZ_Prix']; ?> &euro;
				<br/>
				Quantité : <?php echo $donnees['COM_Quantite']; ?>
				<br/>
				Prix total : <?php echo $donnees['COM_Quantite']*$donnees['PIZ_Prix']; ?> &euro;
				<br/>
				Client : <?php echo $donnees['PER_Nom']; ?> <?php echo $donnees['PER_Prenom']; ?>
				<br/><br/>
					        	<?php
		}
		mysqli_free_result($reponse);
		?>				
		</div>
</div>
<?php  
  include('footer.php');
?>