
	<div class="page2">Ανοιχτές αναφορές</div>
	<div >
<div >


		<?php
		include 'connect_db.php';
		
		

	
	
		?>
		
		
		<div id="page-wrap" >
		<?php
		  
				$query="SELECT * FROM katigories_anaf"; //βρες ολες τις κατηγορεις αναφορων
				$result = $con->query($query);
				if (mysqli_num_rows($result)==0){echo'<div id="whitee">'; echo 'Δεν υπάρχουν κατηγορίες αναφορών!'; echo'</div>';}else {
				echo '<div id="anoixt_anaf" class="tabs">';
				echo '<ul class="tab-links">';
				$counter=1;
				while($row = mysqli_fetch_array($result))  //για καθε κατηγορια αναφορας
				{
						if ($counter==1) $kid= $row['k_id'];
						echo "<li><a href='diaxirisi.php?k_id=". $row['k_id'] . "'>";
						echo $row['onoma_kat'];
						echo '</a></li>';	
						$counter++;						
					
						

				} //teleiwnei h while ths katigorias
				
				echo '</ul></div>';
				if (isset($_GET['k_id']))
					$kid=$_GET['k_id'];
					
					$query="SELECT * 
								FROM anafores 
								JOIN katigories_anaf
								ON katigories_anaf.k_id=anafores.k_id
								WHERE anafores.k_id='$kid' AND anafores.epilithike='0'
								ORDER BY anafores.upload_date DESC"; 
					$result = $con->query($query);
					if (!$result) {printf("Error: %s\n", mysqli_error($con));
											exit();
}
					$numberOfRows = mysqli_num_rows($result);// βρισκουμε τον αριθμο των γραμμων του ερωτηματος που κανουμε, για αν υπολογισουμε τις σελιδες
					if ($numberOfRows!=0)
						{
					
						if (isset($_GET['page'])) //εαν στο url βρισκομαστε σε καποια συγκεκρημενη σελιδα, δηλαδη εμαφνιζεται συγκεκρημενη 5αδα αναφορων, αποθηκευσε το στο page
						$page = $_GET['page'];
						else $page = 1;
						
						$resultsPerPage = 5;//αποτελεσματα που θελουμε να εχουμε ανα σελιδα
						$startResults = ($page - 1) * $resultsPerPage;//για να βρουμε απο ποια 5αδα θα ξεκινησουν να εμφανιζονται τα αποτελεσματα
						
						$totalPages = ceil($numberOfRows / $resultsPerPage);
						
						$query="SELECT * 
									FROM anafores 
									JOIN katigories_anaf
									ON katigories_anaf.k_id=anafores.k_id
									WHERE anafores.k_id='$kid' AND anafores.epilithike=0
									ORDER BY anafores.upload_date DESC
									LIMIT $startResults, $resultsPerPage"; //βρες ολες τις κατηγορεις αναφορων
									$result = $con->query($query);
						?>
						
						<table ><!--dhmiourgoume to table, cellpadding:Set the space between the cell wall and the cell content -->
						<thead>
						<tr><!--dhmiourgoume thn nea grammi tou pinaka, table row  -->
						<th>Όνομα</th><th>Κατηγορία</th> <th>Ημερομηνία</th> <!--δημιουργουμε τα table headers που θα βρισκονται στην πρωτη γραμμη-->
						</tr>
						</thead>
						<tbody>
						<?php
							
						while($row = mysqli_fetch_array($result))  //για καθε κατηγορια αναφορας
							{
							
							?>
			
								<tr>
							
								<td>
								<a href="show_anaf.php?a_id=<?php echo $row['a_id'];?> ">
								<?php echo  $row['onoma_anaf']; ?>
								</a>
							
								</td>
							
								<td>
								<?php echo  $row['onoma_kat']; ?>
								</td>
							
								<td>
								<?php echo  $row['upload_date']; ?>
								</td>					
									
								</tr>
								<?php
								}
								?>
								</tbody>
								</table>
							<div id="arithmosselidas" style="float:center;">
							<a href="diaxirisi.php?k_id=<?php echo $kid ?>&page=1">First</a>&nbsp
							<?php 
							if($page > 1)
							
								echo '<<a href="diaxirisi.php?k_id='.$kid.'&page='.($page - 1).'">Back</a>';
							
							for($i = 1; $i <= $totalPages; $i++){
								if($i == $page)
									echo '<strong>'.$i.'</strong>';
								else
									echo '<a href="diaxirisi.php?k_id='.$kid.'&page='.$i.'">'.$i.'</a>';
							}
							echo '</div></div>';
				
						} //ean den exoume anafores se afth thn katigoria 
						else echo 'Δεν έχετε καταχωρήσει αναφορές σε αυτή την κατηγορία!';
					 //teleiwnei h if, ean exoume klikarei kapoia katigoria
					 }
			
		?>
	
	
	
	
		</div>
		</div>
		</div>
