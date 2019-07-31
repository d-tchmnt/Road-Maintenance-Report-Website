
<div class="page2">Kατηγορίες αναφορών</div>
		<?php
		include 'connect_db.php';
		
		?>
		
		<?php
		
				
				
		
			$query = "SELECT * FROM katigories_anaf ";
			$result = $con->query($query);
		
		
		if (mysqli_num_rows($result)!=0) 
				{
				echo '<div id="page-wrap">';
					echo "<table>"; //Dhmiourgoume to table, cellpadding:Set the space between the cell wall and the cell content
					echo '<thead>';
			echo '<tr>'; //Dhmiourgoume thn prwth seira tou table, tr=tablerow
			echo '<th>Όνομα Κατηγορίας</th><th style="width:25px;">Επεξεργασία</th><th style="width:25px;">Διαγραφή</th>'; // Sthn 1h seira tou table, tha exoume me th=tableheaders ta stoixeia pou theloume na emfanisoume
			echo '</tr>';
			echo '</thead>';
	echo '<tbody>';
			while($row = mysqli_fetch_array($result)){ //Kanoume toquery, opou se kathe fetch array pou tha kanei, tha emfanizei kathe fora thn epomenh grammh tou apotelesmatos tou query
			  		      
						
						echo '<tr>';
						
						echo '<td>' . $row['onoma_kat'] . '</td>';
						echo '<td style="text-align:center;"><a href="edit_kat.php?kid=' . $row['k_id'] . '"><img src="images/edit2.png"></img></a></td>'; 
						echo '<td style="text-align:center;"><a href="delete_kat.php?kid=' . $row['k_id'] . '"><img src="images/fail.png"></img></a></td>'; 
						echo '</tr>';
						
								}?>
								<div id="extra-content" >
								<tr>
					
					<td> <input placeholder="Νέα Κατηγορία" form="f1"type="onoma" name="onoma_kat" required></td>
					
					<td style="text-align:center;"><button form="f1" type="submit" style=" cursor: pointer; border: 0; background: transparent">
			<img src="/images/plus.png" width="17" height="17" alt="submit" />
			</button></td>
			<td></td>
					</tr>
					</div>
				<?php
			echo '</tbody>';
			echo "</table>";
			echo '</div>';
			
				} else{  echo'<div id="whitee">'; 'Δεν έχετε κάποια καταχωρήσει κάποια κατηγορία αναφοράς!'; echo'</div>';?>
				<table>
				<tr>
				<form>
				<td>
				<input placeholder="Νέα Κατηγορία" form="f1"type="onoma" name="onoma_kat" required></td>
				<td style="text-align:center;"><button form="f1" type="submit" style=" cursor: pointer; border: 0; background: transparent">
			<img src="/images/plus.png" width="17" height="17" alt="submit" />
			</td></form>
			</tr>
			
				
				
				<?php
				}
				echo '		<form id="f1" action="kat_katax.php" method="POST">
							
						</form>';
						
			
		?>
