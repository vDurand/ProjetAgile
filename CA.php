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
		$sql="SELECT date(ORD_Fin) FROM `Order` WHERE ORD_Fin != '' order by date(ORD_Fin) asc;";
		$req = mysqli_query($db, $sql); //or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysqli_fetch_assoc($req);
		if($data['date(ORD_Fin)'] != "0000-00-00")
			echo $data['date(ORD_Fin)']."<br>";
?>
</div>
<?php  
  include('footer.php');
?>