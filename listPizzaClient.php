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
		
		$reponse = mysqli_query($db, "SELECT * FROM Pizza ") ;
		
		while ($donnees = mysqli_fetch_assoc($reponse))
		{
			if($donnees['PIZ_Valide']==1){
			?>	<fieldset style="margin-top:1%;">
				<legend  align="left">Nom pizza : <?php echo $donnees['PIZ_Nom']; ?></legend>
				<br/>
				Prix pizza : <?php echo $donnees['PIZ_Prix']; ?> &euro;
				<br/>
				Ingrédients :
		<?php
			$idpiz = $donnees['PIZ_IdPizza'];
			$reponse2 = mysqli_query($db, "SELECT * FROM Pizza join Composer using(PIZ_IdPizza) join Ingredient using (ING_IdIngredient) 
											where (PIZ_IdPizza) = $idpiz ") ;
			while ($donnees2 = mysqli_fetch_assoc($reponse2))
		{
			?>
				 <?php echo $donnees2['ING_Nom']; ?>
				 ,
				 <?php
				 }
				 ?>
				<br/>
				<!--<form method="post" action="modif_pizza.php">
				<input type="hidden" name="num" value="<?//php echo $donnees['PIZ_IdPizza']; ?>">
				<input type="submit" value="Modifier" />
				</form>-->
				<br/><br/>
					        	<?php
			}
			?></fieldset><?
		}
		
		mysqli_free_result($reponse);
		?>				</div>		
</div>
<?php  
  include('footer.php');
?>