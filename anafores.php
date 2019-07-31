
		<?php
		include 'connect_db.php';
		if (isset($_SESSION['logged_in'])){ //Ean eimaste syndedemenoi
			
						
		
			//kanoume to query sth vash dedomenwn, me inner join, wste na enwthoun oi pinakes pou exoun tomh, k left join 
			//gia tis anafores pou exoun epilythei k exoun extra sthlh to sxolio diaxeiristh			
			$query = "SELECT xristes.email,anafores.a_id,anafores.onoma_anaf,  anafores.epilithike, epil_anaf.sxolio_diax 
			FROM xristes 
			INNER JOIN anafores 
			ON xristes.x_id=anafores.x_id 
			LEFT JOIN epil_anaf 
			ON anafores.a_id=epil_anaf.a_id 
			WHERE xristes.email='" . $_SESSION['CurrentUser'] . "'";
						
			
			$result = $con->query($query);
			if (isset($_GET['page'])) //εαν στο url βρισκομαστε σε καποια συγκεκρημενη σελιδα, δηλαδη εμαφνιζεται συγκεκρημενη 5αδα αναφορων, αποθηκευσε το στο page
				$page = $_GET['page'];
				else $page = 1;
				
				$resultsPerPage = 5;//αποτελεσματα που θελουμε να εχουμε ανα σελιδα
				$startResults = ($page - 1) * $resultsPerPage;//για να βρουμε απο ποια 5αδα θα ξεκινησουν να εμφανιζονται τα αποτελεσματα
				$numberOfRows = mysqli_num_rows($result);// βρισκουμε τον αριθμο των γραμμων του ερωτηματος που κανουμε, για αν υπολογισουμε τις σελιδες
				$totalPages = ceil($numberOfRows / $resultsPerPage);
				
				$query1 = "SELECT xristes.email,anafores.a_id,anafores.onoma_anaf,  anafores.epilithike, epil_anaf.sxolio_diax 
				FROM xristes 
				INNER JOIN anafores 
				ON xristes.x_id=anafores.x_id 
				LEFT JOIN epil_anaf 
				ON anafores.a_id=epil_anaf.a_id 
				WHERE xristes.email='" . $_SESSION['CurrentUser'] ."'
				ORDER BY anafores.upload_date DESC
				LIMIT $startResults, $resultsPerPage";
			
			$result = $con->query($query1);
			
			//error checking, ean h result den epistrepsei times k gyrisei false"; 
			if(mysqli_num_rows($result)== 0){ echo'<div id="whitee">'; echo "Δεν έχετε καταχωρήσει κάποια αναφορά!"; echo'</div>';}
		else{
		
		?>
			<div id="page-wrap" >
			<table class="table-curved">
			<caption class="caption">Οι αναφορές μου</caption>
			<thead><!--dhmiourgoume to table, cellpadding:Set the space between the cell wall and the cell content -->
			<tr><!--dhmiourgoume thn nea grammi tou pinaka, table row  -->
			<th>Όνομα</th><th style="width:25px;">Επιλύθηκε</th> <th>Σχόλια Διαχειριστών</th> <!--δημιουργουμε τα table headers που θα βρισκονται στην πρωτη γραμμη-->
			</tr>
			</thead>
			<tbody>
		<?php
			while($row = mysqli_fetch_array($result)) {
			
			?>
			

			
				<tr>
			
				<td >
				<a href="show_anaf.php?a_id=<?php echo $row['a_id'];?> " style="text-decoration:none;">
				<?php echo  $row['onoma_anaf']; ?>
				</a>
			
				</td>
			
				<td style="text-align:center;">
				<?php 
				if($row['epilithike'] == 0)
				echo  '<img src="/images/fail.png">';
				else
				echo  '<img src="/images/tick.png">'; ?>
				</td>
			
				<td>
				<?php echo  $row['sxolio_diax']; ?>
				</td>					
					
				</tr>
				<?php
				}
				?>
				</tbody>
				</table>
				<div id="arithmosselidas" style="float:center;">
				<a href="?page=1">First</a>&nbsp
				<?php 
				if($page > 1)
				
					echo '<a href="?page='.($page - 1).'">Back</a>';
				
				for($i = 1; $i <= $totalPages; $i++){
					if($i == $page)
						echo '<strong>'.$i.'</strong>';
					else
						echo '<a href="?page='.$i.'">'.$i.'</a>';
				}
				echo '</div>';
			}
		
		
			
			
		}		
	
		?>
		</div></div>
