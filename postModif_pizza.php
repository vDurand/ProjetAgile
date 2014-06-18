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
		$num=($_POST["num"]);
		$suppr=($_POST["suppr"]);
		
		
		if ($suppr==1) {
			$query2 = "UPDATE Pizza SET PIZ_Valide = 0 WHERE PIZ_IdPizza = '$num';";
			
			  	$sql2 = mysqli_query($db, $query2);
			  	$errr2=mysqli_error($db);
			  	
			  	if($sql2){
			  	      echo '<div id="good">     
			  	          <label>Pizza supprimée</label>
			  	          </div>';
			  	}
		}
		else {
			$query = "UPDATE Pizza SET PIZ_Nom = '$name', PIZ_Prix = '$price' WHERE PIZ_IdPizza = '$num';";
			
			  	$sql = mysqli_query($db, $query);
			  	$errr=mysqli_error($db);
			
			  	if($sql){
				        echo '<div id="good">     
				            <label>Pizza modifiée avec succès</label>
				            </div>';
	            }
		}
		?>
</div>
<?php  
  include('footer.php');
?>