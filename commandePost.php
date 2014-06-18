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
	
		$query = "INSERT INTO Commander (CLI_IdClient, PIZ_IdPizza, COM_Quantite) VALUES ('$client', '$pizza', '$number')";
	
	  	$sql = mysqli_query($db, $query);
	  	$errr=mysqli_error($db);
	
	  	if($sql){
		        echo '<div id="good">     
		            <label>Pizza commandée avec succès</label>
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