<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>

<script>
	$(document).ready(function(){
		$('#checkbox1').change(function(){
			$("#autoUpdate").toggle(this.checked);
			 

		});
	});
</script>

</head>

<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
<body>
<div class="container">
<div class="content">


	<?php
		session_start();
		
		if (isset($_SESSION['logged_in'])){ // Ean exoume kanei login

				include 'connect_db.php';
				include 'menu.php';
				if (isset($_GET['a_id']) && is_numeric($_GET['a_id'])) //ean exoume thesei to a_id se forma get, kai ean einai arithmos, tote
					{
					$id = $_GET['a_id'];
					
							
						//kanoume to query gia na vroume ola ta stoixeia ths anaforas, me join se 2 pinakes, 
						//opou to id ths anaforas tha to paroume apo to url, pou dwthike mesw ths methodou GET
						$query = "SELECT anafores.*,katigories_anaf.* 
						FROM anafores 
						JOIN katigories_anaf 
						ON  katigories_anaf.k_id=anafores.k_id 
						WHERE anafores.a_id='$id' ";
						
						
						$result = $con->query($query);
						
						$row = $result->fetch_assoc();
						
						//error checking, εαν δεν βρει κάποιο αποτελεσμα,h result πιστρέφει FALSE."; 
						if ($result==FALSE)
							echo 'Δεν έχετε δημιουργήσει αναφορές!';
						else{
						echo ' <div  class="map2">';
						include 'map_anaf.php';
						echo '</div>';
						 $a_id=$row["a_id"]; //apothikevoume to id ths anaforas kai to an epilithike gia na to xrhsimopoihsoume parakatw gia tin anazhthsh ths eikonas
							$epilithike=$row["epilithike"];
					?><div >
							<table style="color:white;" border='1' cellpadding='10'>
					
							<tr><th>ID</th>			
							<td><?php echo  $row["a_id"] ?> </td></tr>
							
					
							<tr><th>Όνομα</th>
							<td><?php echo  $row["onoma_anaf"] ?> </td></tr>	
					
							<tr><th>Κατηγορία</th>
							<td><?php echo  $row["onoma_kat"] ?> </td></tr>
					
							<tr><th>Γεωγραφική Θέση</th>
							<td><?php echo  $row["geogr_thesi"] ?> </td></tr>
						
							<tr><th>Περιγραφή</th>
							<td><?php echo  $row["perigr_xristi"] ?> </td></tr>
					
							<tr><th>Eπιλύθηκε</th>
							<td><?php 
								if($row['epilithike'] == 0)
								echo  '<img src="/images/fail.png">';
								else
								echo  '<img src="/images/tick.png">'; ?>
							</td></tr>
							
							
					
							<tr><th>Ανεβάστηκε</th>
							<td><?php echo  $row["upload_date"] ?> </td></tr>
							
							
							<?php 		//kanoume to query sthn vash dedomenwn gia na doume ean exoume eikones syndedemenes me afthn thn anafora
							
											$sql="SELECT pic1,pic2,pic3,pic4 
												  FROM anafores
												  WHERE a_id='$a_id'";
						
										$result = $con->query($sql);
										$row = mysqli_fetch_array($result);
										
										//ean yparxei h prwth eikona, thn emfanizoume se ena keli. ean den yparxei, kleinei o pinakas. akolouthws, gia kathe eikona pou yparxei, elegxetai ean yparxei epomenh, mexri na elegksoume k tis 4 eikones
										
										if ($row['pic1']!='NULL')
										{
										
												  ?>
												  <tr>
												  <th>
												   Εικόνες
												  </th>
												 
												  <td>
												 	<a href="uploads/<?php echo $row['pic1']?>"><img src="uploads/<?php echo $row['pic1']?>"  width="60" height="60"></a>
												  
												  
												  <?php
												  
												  if ($row['pic2']!='NULL')
												  {
												  
															?>
												  
														
														<a href="uploads/<?php echo $row['pic2']?>"><img src="uploads/<?php echo $row['pic2']?>"  width="60" height="60"></a>
														
												  
														<?php
												  
														 if ($row['pic3']!='NULL')
														{
												  
																?>
														
																<a href="uploads/<?php echo $row['pic3']?>"><img src="uploads/<?php echo $row['pic3']?>"  width="60" height="60"></a>
															
															
																<?php
												  
															 if ($row['pic4']!='NULL'){
												  
																	?>
																
																
																	<a href="uploads/<?php echo $row['pic4']?>"><img src="uploads/<?php echo $row['pic4']?>"  width="60" height="60"></a>
																</td>

<tr>


															<?php
																}
														}
													}
										}?>
												  
												  
							</table>
							</div>
							<?php
							
							if ($_SESSION['admin_stat']==1 && $epilithike==0){
							?>
							<div id="checkbox1"><form><input type="checkbox" name="epilythike" ><font color="white">Επιλύθηκε</font></form></div>
							
							<div id="autoUpdate" style="display:none;" >
							<form id="f1" action="epil_anaf.php?aid=<?php echo $a_id ?>" method="POST">
							</form>
							
							<textarea form="f1" class="creat_anaf_input" form="f1"; type="text" style="width:230px;"  name="sxolio" placeholder="Προσθέστε ένα σχόλιο" required></textarea></div>
							<input form="f1" type="Submit" value="Καταχώρηση">
							<?php
							
							}
						}	
						
						
					
				}
				else echo "Προεκυψε κάποιο λάθος! Προσπαθήστε ξανά!";
		}
		else { echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}
		
	?>
</div></div>
	</body>
	</html>