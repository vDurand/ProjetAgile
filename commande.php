<?php  
    include('bandeau.php');
?>
<div id="corps">
	<h1>Ajouter une Commande</h1>
	<br/><br/>
				<form method="post" action="commandePost.php" name="commande" formtype="1" colvalue="2">
					<div id="labelCat">
						<table>
							<tr>
								<td style="text-align: left; width: 150px;">
									<label>Pizza :</label>
								</td>
								<td>
									<div class="selectType">
			          					<select name="pizza">
			          			<?php
	
		if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
			echo '';
		else
			echo 'Erreur';
		
		$reponse = mysqli_query($db, "SELECT * FROM Pizza ORDER BY PIZ_Nom");
		while ($donnees = mysqli_fetch_assoc($reponse))
		{
			if($donnees['PIZ_Valide']==1){
			?>
					        				<option value="<?php echo $donnees['PIZ_IdPizza']; ?>"><?php echo $donnees['PIZ_Nom']; ?>, <?php echo $donnees['PIZ_Prix']; ?> &euro;</option>
					        	<?php
					        	}
		}
		mysqli_free_result($reponse);
		?>									
					    				</select>
					    			</div>
					    		</td>
							</tr>
							<tr>
								<td style="text-align: left; width: 150px; white-space: normal;">
									<label>Quantité :</label>
								</td>
								<td>
									<input id="number" required maxlength="255" name="number" type="text" class="inputC"> 
								</td>
							</tr>
							<tr>
								<td style="text-align: left; width: 150px; white-space: normal;">
									<label>Client :</label>
								</td>
								<td>
									<div class="selectType">
							            <select name="client">
							                  <?php
							$reponseBis = mysqli_query($db, "SELECT * FROM Client cl JOIN Personne pe ON cl.PER_Id=pe.PER_Id ORDER BY PER_Nom");
							while ($donneesBis = mysqli_fetch_assoc($reponseBis))
							{
								
							  ?>          <option value="<?php echo $donneesBis['CLI_IdClient']; ?>"><?php echo strtoupper($donneesBis['PER_Nom']); ?> <?php echo $donneesBis['PER_Prenom']; ?></option>
							                <?php
							                
							}
							mysqli_free_result($reponseBis);
							?>                  
							            </select>
							          </div>
								</td>
							</tr>
						</table>
					</div>
					<br/>
					<div>
						<table>
						<tr>
							<td>
								<span>
									<input name="submit" type="submit" value="Ajouter" class="buttonC">&nbsp;&nbsp; 
									<input name="reset" type="reset" value="Annuler" class="buttonC">
								</span>
							</td>
						</tr>
					</table>
					</div>
				</form>
	
</div>
<?php  
  include('footer.php');
?>