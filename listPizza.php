<?php  
    include('bandeau.php');
?>
<div id="corps">
	<h1>Pizza</h1>
	<br/><br/>
			<div id ="list">
			<?php
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
		
		$reponse = mysqli_query($db, "SELECT * FROM Pizza");
		
		while ($donnees = mysqli_fetch_assoc($reponse))
		{
			if($donnees['PIZ_Valide']==1){
			?>	>Nom pizza : <?php echo $donnees['PIZ_Nom']; ?>
				<br/>
				Prix pizza : <?php echo $donnees['PIZ_Prix']; ?> &euro;
				<br/>
				<form method="post" action="modif_pizza.php">
				<input type="hidden" name="num" value="<?php echo $donnees['PIZ_IdPizza']; ?>">
				<input type="submit" value="Modifier" />
				</form>
				<br/><br/>
					        	<?php
			}
		}
		mysqli_free_result($reponse);
		?>				</div>		
</div>
<?php  
  include('footer.php');
?>