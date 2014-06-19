<?php  
    include('bandeau.php');
?>
<script language="javascript"> 
	function showDiv(elem){
			if(elem.value == 1){
			 document.getElementById('Contact-1').style.display = "";
			 document.getElementById('Contact-List').style.display = "none";
			 document.getElementById('Contact-2').style.display = "";
			 document.getElementById('client').value = "";
			 document.getElementById('checker').value = "0";
			 document.getElementById('exist').value = "0"; 
			}
			else{
			 document.getElementById('Contact-1').style.display = "none";
			 document.getElementById('Contact-List').style.display = "";
			 document.getElementById('Contact-2').style.display = "none";
			 document.getElementById('nomC').value = ""; 
			 document.getElementById('prenomC').value = ""; 
			 document.getElementById('checker').value = "1";
			 document.getElementById('exist').value = "1"; 
			}
	}
	/*function addPizza(){
		document.getElementById('toDuplicate').cloneNode(true);
	}*/
	var i = 1;
	
	function duplicate() {
//	    var original = document.getElementById('duplicater');
//	    var clone = original.cloneNode(true);
//	    original.parentNode.appendChild(clone);
//	    $('#identifiant').load();
		document.getElementById('duplicater' + i).style.display = "";
		i++;
		document.getElementById('duplicater' + i).style.display = "";
		i++;
	}
</script>

<div id="corps">
	<h1>Ajouter une Commande</h1>
	<br/><br/>
				<form method="post" action="commandePost.php" name="commande" formtype="1" colvalue="2">
					<div id="labelCat">
						<table>
							<tr id="Contact-List">
								<td style="text-align: left; width: 150px; white-space: normal;">
									<label>Client :</label>
								</td>
								<td>
									<div class="selectType">
							            <select name="client">
							                  <?php
		                  if($db = MySQLi_connect("localhost","projetAgile",'pizza', 'Agile', 0, '/media/sds1/home/alx22/private/mysql/socket'))
		                  	echo '';
		                  else
		                  	echo 'Erreur';
		                  
							                  
							$reponseBis = mysqli_query($db, "SELECT * FROM Client cl JOIN Personne pe ON cl.PER_Id=pe.PER_Id ORDER BY PER_Nom");
							while ($donneesBis = mysqli_fetch_assoc($reponseBis))
							{
								
							  ?>          <option id="client" value="<?php echo $donneesBis['CLI_IdClient']; ?>"><?php echo strtoupper($donneesBis['PER_Nom']); ?> <?php echo $donneesBis['PER_Prenom']; ?></option>
							                <?php
							                
							}
							mysqli_free_result($reponseBis);
							?>                  
							            </select>
							          </div>
								</td>
							</tr>
							<tr>
								<td>
									<label for="newC">Nouveau Client : </label>
								</td>
								<td>
									<input id="checker" onclick="showDiv(this)" type="checkbox" name="newC" value="1">
									<input type="hidden" id="exist" name="exist" value="1">
								</td>
							</tr>
							<tr style="display:none" id="Contact-1">
								<td>
									<label>Nom :</label>
								</td>
								<td>
									<input id="nomC" maxlength="255" name="nomC" type="text" class="inputC"> 
								</td>
							</tr>
							<tr style="display:none" id="Contact-2">
								<td>
									<label>Prenom :</label>
								</td>
								<td>
									<input id="prenomC" maxlength="255" name="prenomC" type="text" class="inputC"> 
								</td>
							</tr>
							<div id="duplicater">
							<tr>
								<td style="text-align: left; width: 150px;">
									<label>Pizza :</label>
								</td>
								<td>
									<div class="selectType">
			          					<select name="pizza[]">
			          						<option value=""></option>
			          			<?php
	
		
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
									<input id="number" required maxlength="255" name="number[]" type="text" class="inputC"> 
								</td>
							</tr>
							</div>
							<!-- ZONE DUPLICATE -->
							<tr id="duplicater2" style="display:none">
								<td style="text-align: left; width: 150px;">
									<label>Pizza :</label>
								</td>
								<td>
									<div class="selectType">
			          					<select name="pizza[]">
			          						<option value=""></option>
			          			<?php
	
		
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
							<tr id="duplicater1" style="display:none">
								<td style="text-align: left; width: 150px; white-space: normal;">
									<label>Quantité :</label>
								</td>
								<td>
									<input id="number" required maxlength="255" name="number[]" type="text" class="inputC"> 
								</td>
							</tr>
							<tr id="duplicater3" style="display:none">
								<td style="text-align: left; width: 150px;">
									<label>Pizza :</label>
								</td>
								<td>
									<div class="selectType">
			          					<select name="pizza[]">
			          						<option value=""></option>
			          			<?php
	
		
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
							<tr id="duplicater4" style="display:none">
								<td style="text-align: left; width: 150px; white-space: normal;">
									<label>Quantité :</label>
								</td>
								<td>
									<input id="number" required maxlength="255" name="number[]" type="text" class="inputC"> 
								</td>
							</tr>
							<tr id="duplicater5" style="display:none">
								<td style="text-align: left; width: 150px;">
									<label>Pizza :</label>
								</td>
								<td>
									<div class="selectType">
			          					<select name="pizza[]">
			          						<option value=""></option>
			          			<?php
	
		
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
							<tr id="duplicater6" style="display:none">
								<td style="text-align: left; width: 150px; white-space: normal;">
									<label>Quantité :</label>
								</td>
								<td>
									<input id="number" required maxlength="255" name="number[]" type="text" class="inputC"> 
								</td>
							</tr>
							<tr id="duplicater7" style="display:none">
								<td style="text-align: left; width: 150px;">
									<label>Pizza :</label>
								</td>
								<td>
									<div class="selectType">
			          					<select name="pizza[]">
			          						<option value=""></option>
			          			<?php
	
		
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
							<tr id="duplicater8" style="display:none">
								<td style="text-align: left; width: 150px; white-space: normal;">
									<label>Quantité :</label>
								</td>
								<td>
									<input id="number" required maxlength="255" name="number[]" type="text" class="inputC"> 
								</td>
							</tr>
							<!-- END ZONE -->
							<tr>
								<td><input type="button" value="+" onclick="duplicate()"></td>
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