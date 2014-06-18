<?php  
    include('bandeau.php');
?>
<div id="corps">
	<h1>Ajout de pizza</h1>
	<br/><br/>
				<form method="post" action="post_pizza.php">
				<p>
				<label for="name">Nom : </label><input required name="name" type="text" id="name" /><br />
				<label for="price">Prix : </label><input required type="text" name="price" id="price" />
				</p>
				<table>
				<tr><td><input type="submit" value="Ajouter" /></td>
				<td><input type="reset" value="Reset"></td></tr></table></form>
</div>
<?php  
  include('footer.php');
?>