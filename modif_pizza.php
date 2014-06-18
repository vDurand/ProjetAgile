<?php  
    include('bandeau.php');
?>
<div id="corps">
	<h1>Modification de pizza</h1>
	<br/><br/>
			<?php
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
	
		$num=($_POST["num"]);
		
		$reponse = mysqli_query($db, "SELECT * FROM Pizza WHERE PIZ_IdPizza='$num'");
		
		$donnees = mysqli_fetch_assoc($reponse)
			?>
	
				<form method="post" action="postModif_pizza.php">
				<fieldset>
				<p>
				<label for="name">Nom : </label><input required name="name" type="text" id="name" value="<?php echo $donnees['PIZ_Nom']; ?>"/><br />
				<label for="price">Prix : </label><input required type="text" name="price" id="price"  value="<?php echo $donnees['PIZ_Prix']; ?>"/><br />
				<input type="hidden" name="num" value="<?php echo $num; ?>">
				<label for="suppr">Supprimer : </label><input type="checkbox" name="suppr" value="1"> 
				</p>
				</fieldset>
				<table>
				<tr><td><input type="submit" value="Modifier" /></td>
				<td><input type="reset" value="Reset"></td></tr></table></form>
	
</div>
<?php  
  include('footer.php');
?>