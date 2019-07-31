<!DOCTYPE html>
<meta charset="UTF-8">
<html>

	<head>
	<style>


</style>
<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
	</head>
	<body >
	<div class="container">
	<div class="content">

	<?php 
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		} 
	include 'menu.php';
	?>
	

	
	

		<?php
		
		
		
		if (isset($_SESSION['logged_in'])){ //εαν είμαστε συνδεδεμένοι
			
			
			$query = "SELECT * FROM xristes WHERE email= '" . $_SESSION['CurrentUser'] ."'"; //χρησιμοποιουμε τις τελειες, γιατι διαφορετικα τα αυτακια του ορισματος του current user κλεινουν τα προηγουμενα
			
			$result = $con->query($query);
			$row = $result->fetch_array();
			
			$onoma=$row['onoma']; //αφου κανουμε το query στην βάση δεδομένων, αποθηκεύουμε τα τρεχοντα στοιχεία του χρηστη σε μεταβλητες, ωστε να τα εμφανίσουμε
			$password=$row['password'];
			$epwnymo=$row['epwnymo'];
			$thlefwno=$row['thlefwno'];
		    
	        
			
			
		
			
			
			?>
			<div class="page2"><?php echo "Επεξεργαστείτε το προφίλ σας, " .  $_SESSION['CurrentUser']; ""	;?></div>
			<div id="edit_prof">
			<form id="f1" action='myprofile_edit.php' method='POST'>
				
				
			<table style="float:left; color:white;"><!--δημιουργουμε το table χωρις borders με στοίχιση αριστερά -->
				
				
			<tr><!--φτιαχνουμε μια μια τις γραμμές του πίνακα, και το κάθε κελί τις καθε μίας -->
			<td>Password</td> 
			<td> <input class="edit_prof_input" type="password" name="new_pass" placeholder="Πληκτρολογήστε νέο κωδικό"></td>
			</tr>
				
				
			<tr>
			<td>R/ Password</td>
			<td><input class="edit_prof_input" type="password" name="new_pass2" placeholder="Επιβεβαίωση κωδικού" ></td>
			</tr>
				
			<tr>
			<td>Όνομα</td>
			<td> <input class="edit_prof_input" type="text" name="new_name"  value="<?php echo $onoma?>" placeholder="Όνομα" > </td>
			</tr>
				
			<tr>
			<td>Επώνυμο</td> 
			<td><input class="edit_prof_input" type="text" name="new_surname" value="<?php echo $epwnymo ?>"placeholder="Επώνυμο" ></td>
			</tr>
				
			<tr>
			<td>Τηλέφωνο</td>
			<td> <input class="edit_prof_input" type="tel" name="new_phone" value="<?php echo $thlefwno  ?>"placeholder="Τηλέφωνο"></td>
			</tr>
			</form>  
			
				<tr >
				<td></td>
			<td class="fr"><button form="f1" type="reset" style="cursor: pointer; border: 0; background: transparent">
			<img src="/images/refresh1.png" width="16" height="16" alt="submit" />
			</button></td>
			</tr>
			<tr>
			<td></td>
			<td  style="text-align:center;"><button form="f1" type="submit" style="color:white; cursor: pointer; border: 0; background: transparent">
			<img src="/images/tickk.png" width="48" height="48" alt="submit" /><br>Επιβεβαίωση
			</button></td>
			</tr>
			</table>
			
				
				
				
			       <!--  //η φορμα για τα reset/submit βγαίνει στο κέντρο need fix plox -->
			
			
			
			<?php
			
			
		}
			else {echo '<meta http-equiv="refresh" content="0; url=index.php" />';
			
			}
		?>
		</div></div></div>
	</body>
</html>
	
	
	
		




	
