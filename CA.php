<?php  
    include('bandeau.php');
?>
<div id="change"></div>
<div id="corps">
	<h1>Chiffre d'affaire :</h1>
<?php
if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
		$sql="SELECT DISTINCT date(ORD_Fin) FROM `Order` WHERE ORD_Fin != '' order by date(ORD_Fin) asc;";
		$req = mysqli_query($db, $sql); //or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($data = mysqli_fetch_assoc($req)){
			if($data['date(ORD_Fin)'] != "0000-00-00")
				echo "Chiffre d'affaire du: ".$data['date(ORD_Fin)']." =<br>";
		}
?>
</div>
<script>document.getElementById('change').innerHTML('15 euros');</script>
<?php  
  include('footer.php');
?>