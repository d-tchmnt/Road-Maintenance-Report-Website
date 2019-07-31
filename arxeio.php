

	<div class="page2">Επιλυμένες αναφορές</div>
	<div >
<div >
<?php
		
		
		 	
				include 'connect_db.php';
			
			
				
				//echo '<div class = pinakas_anaforon>';
				// to x_id stis anafores antiprosopevei ton xristi pou anevase thn anafora, enw to x_id stis epilymenes anafores antiprosopevei ton admin pou thn epilyse
				$query="SELECT xristes.email,anafores.onoma_anaf,epil_anaf.sxolio_diax,anafores.a_id
						FROM epil_anaf
						JOIN xristes
						ON xristes.x_id=epil_anaf.x_id
						JOIN anafores
						ON anafores.a_id=epil_anaf.a_id
						";
						
				$result = $con->query($query);	
					if (mysqli_num_rows($result)!=0) 
				{
				?>
				<div id="page-wrap">
				<table> 
				<thead>
				<tr>
				<th>Όνομα Αναφοράς</th><th>Επιλύθηκε από</th> <th>Σχόλιo </th> 
				</tr>
				</thead>
				<tbody>
				<?php
				
				while ($row = mysqli_fetch_array($result)){
				?>
					<tr> 
					<td><a href="show_anaf.php?a_id= <?php echo $row["a_id"];  ?>">
						<?php echo $row['onoma_anaf']; ?> </a>
					</td>
					
					<td>
					<?php  echo $row['email']; ?>
					</td>
					
					<td>
					<?php echo $row['sxolio_diax']; ?>
					</td>
					
					</tr> <?php
				}
				?>
				</tbody>
				</table>
				</div>
				<?php
				}
				else{echo'<div id="whitee">'; echo "Δεν υπάρχουν επιλυμένες αναφορές!"; echo'</div>';}
				
				
	?>
</div>
</div>
