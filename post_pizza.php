<?php  
    include('bandeau.php');
?>
<div id="corps">
			<?php
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
	
		$name=strtoupper(addslashes($_POST["name"]));
		$price=($_POST["price"]);
	
		$query = "INSERT INTO Pizza (PIZ_Nom, PIZ_Prix) VALUES ('$name', '$price')";
	
	  	$sql = mysqli_query($db, $query);
	  	$errr=mysqli_error($db);
	
	  	if($sql){
		        echo '<div id="good">     
		            <label>Pizza ajouté avec succès</label>
		            </div>';
			?>									
				<br/><br/>
					        	<?php
		
		}
		mysqli_free_result($reponse);
		?>
</div>
<?php  
  include('footer.php');
?>