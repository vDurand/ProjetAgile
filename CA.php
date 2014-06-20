<?php  
    include('bandeau.php');
?>
<div id="corps">
	<h1>Chiffre d'affaire :</h1>
<?php
if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
		/*$sql="SELECT PER_Pseudo, PER_Mdp FROM Personne WHERE PER_Pseudo='$pseudo'";
		
		
		$req = mysqli_query($db, $sql); //or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

		$data = mysqli_fetch_assoc($req);*/
?>
</div>
<?php  
  include('footer.php');
?>