<!DOCTYPE html>
<meta charset="UTF-8">

<html>
	<head>
<script src="jquery-1.11.1.min.js"></script>
	<script>
  
  onload = function() {
   document.myform.thesh.onfocus = function(){ this.blur(); };
  }
 </script>
	<style>


	</style>
	</head>

	<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
	<body>
	<div class="container">
<div class="content">
	
		<?php
		session_start();
		if (!isset($_SESSION['logged_in'])){ //Εάν δεν ειμαστε συνδεδεμενοι παραπεμπόμαστε σε φόρμα login/register
			?>	<meta http-equiv="refresh" content="0; url=index.php" /> <?php 
			
			}
		else{ //Εαν είμαστε συνδεδεμένοι
			include 'connect_db.php';
			
			
			
			
			
			
			include 'menu.php';
		
			
			echo '<div class="map_create">';
			include 'map.php';
			echo '</div> ';			
			$result = mysqli_query($con,"SELECT * 
										 FROM katigories_anaf ");
			echo '<div  id="cr_an">';
				
				?>
				
				
				
				<table id="cr_table" cellpadding="10" ><!--δημιουργουμε το table χωρις borders με στοίχιση αριστερά-->
				<caption class="caption">Δημιουργήστε μια αναφορά</caption>
				<form id="f1" action= "katax_anaf.php" method="POST" enctype="multipart/form-data" name="myform" > 
				
				<tr> <!--//φτιαχνουμε μια μια τις γραμμές του πίνακα, και το κάθε κελί τις καθε μίας-->
				<td> Κατηγορία Αναφοράς</td> 
				
				<?php	
					if (!$result) echo "Δεν έχετε δημιουργήσει αναφορές!";
					else{ //εαν υπάρχουν κατηγορίες αναφορών
						
						echo '<td> <select id="select" name="selected" required>';   //δημιουργησε την dropdown λίστα, οπου πρέπει ο χρηστης να διαλεξει την κατηγορια της αναφορας του
						echo'	<option value="">Επιλέξτε κατηγορία</option>';
						while($row = mysqli_fetch_array($result)) {
						
						echo'	<option>' . $row["onoma_kat"] . '</option>';	
						
						
					}		
				echo '</select></td>';
				echo '</tr>';
				}?>
				
				
				<tr>
					<td>Όνομα</td>
					<td><input  class="creat_anaf_input" type="text" name="name" placeholder="Όνομα αναφοράς" required></td>
				</tr>
				
				<tr>
					<td>Γεωγραφική Θέση</td>
					<td> <input class="creat_anaf_input" type="text"  id="geocode" name="thesh" value="" placeholder="Τοποθετήστε τον marker στον χάρτη" required></td><!--// gps automata-->
				</tr>
				</form>
				
				<tr>
					<td>Περιγραφή</td>
						<td><textarea class="creat_anaf_input" form="f1"; type="text" style="width:230px; height:150px;" name="perigrafi" placeholder="  Περιγραφή της αναφοράς" required></textarea></td>
				</tr>
				
				<tr>
				<td><input form="f1" id="image-input" name="photos[]" type="file" accept="image/gif, image/jpeg,image/png,image/jpg,image/x-png"  multiple/>	</td>
				<td ><div class="preview-area" id = "preview-area1" style="width:240px; height:60;"></div></td>
				</tr>

				<tr>
				<td>
				</td>
				<td style="padding:2%;text-align:center;">
				<button form="f1" type="submit" style="color:white; cursor: pointer; border: 0; background: transparent">
			<img src="/images/grenn.png" width="64" height="64" alt="submit" /><br>Καταχώρηση
			</button>
				</td>
				</tr>
				
				</table>
				
				
			<?php	
			}
		?>


		</div>


		
<!-- 
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	SCRIPT GIA ANEVASMA EIKONWN

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
-->		


<script type="text/javascript">

		$('#image-input').bind('change', function() {
					
					$( ".hello" ).remove();
					
					var fileList = this.files;
					var anyWindow = window.URL || window.webkitURL;
					
					
					if(fileList.length > 4){
														$("#image-input").val('');
														alert('Μπορείτε να ανεβάσετε μέχρι 4 εικόνες');
													
						}
					
					else{
														for(var i = 0; i < fileList.length; i++){
															if(fileList[i].size > 1024 * 1024 * 5){
																var bool = 0;
																break;}
															else{
																var bool = 1;}
							}
					if(bool == 1 ){
														for(var i = 0; i < fileList.length; i++){
																		var objectUrl = anyWindow.createObjectURL(fileList[i]);
																		$('.preview-area').append('<img class="hello" style="border-radius: 10px; width: 60px; height: 60px;" src="' + objectUrl + '"   />');
																		window.URL.revokeObjectURL(fileList);  
														}
				}
				else
				{
				
				$("#image-input").val('');	
				alert('Οι εικόνες πρέπει να έχουν μέγεθος μέχρι 5Mb');
				
			
				}
			
			}
			
			

			
			});

</script>
		
		
	</div></div>	
	</body>
</html>