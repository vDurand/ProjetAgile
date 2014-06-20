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
				<form method="post" action="commandePost.php" name="commande" formtype="1" colvalue="1">
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
													
												$sql = "SELECT * FROM Client JOIN Personne USING(PER_Id) WHERE PER_Nom = '$_SESSION[nom]' AND PER_Prenom = '$_SESSION[prenom]'";
												$req = mysqli_query($db, $sql);
												$data = mysqli_fetch_assoc($req);	
												  ?>          
												  <option id="client" value="<?php echo $data['CLI_IdClient']; ?>"><?php echo strtoupper($_SESSION['nom']); ?> <?php echo $_SESSION['prenom']; ?></option>          
							            </select>
							          </div>
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
									<input id="number"   maxlength="255" name="number[]" type="text" class="inputC"> 
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
									<input id="number"   maxlength="255" name="number[]" type="text" class="inputC"> 
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
									<input id="number"   maxlength="255" name="number[]" type="text" class="inputC"> 
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
									<input id="number"   maxlength="255" name="number[]" type="text" class="inputC"> 
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
									<input id="number"   maxlength="255" name="number[]" type="text" class="inputC"> 
								</td>
							</tr>
							<!-- END ZONE -->
							<tr>
								<td><input type="button" value="+" onclick="duplicate()"></td>
							</tr>
							<tr>
								<td><label>Note :</label></td>
								<td><textarea name="comment"></textarea></td>
							</tr>
							<tr>
								<td><label>Date voulue :</label></td>
								<td><input maxlength="255" name="datt" type="datetime-local" class="inputC"></td>
							</tr>
						</table>
					</div>
					<br/>
					<div>
						<table>
						<tr>
							<td>
								<span>
									<input id="nomC" maxlength="255" name="nomC" type="hidden" value="" class="inputC">
									<input id="prenomC" maxlength="255" name="prenomC" type="hidden" value="" class="inputC"> 
									<input type="hidden" name="exist" value="1">
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