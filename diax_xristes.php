	<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
<link rel="stylesheet" type="text/css" href="css/tables.css"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<body>
<div class="container">
<div class="content">


<?php
		
		session_start();
		include 'menu.php';
		if (isset($_SESSION['logged_in'])){ //Εάν είμαστε εγγεγραμμένοι χρήστες και εχουμε συνδεθει
			if  ($_SESSION['admin_stat']==1) //εαν ειμαστε admin , εμφανισε τα καταλληλα στοιχεια
			{  
				include 'connect_db.php';
				
	   
			
	
			
			
		
			$query = "SELECT * FROM xristes ";
			$result = $con->query($query);
		
			if(mysqli_num_rows($result) != 0){
			
			echo "<div id='page-wrap' >";
			echo "<table>"; //δημιουργουμε το table, cellpadding:Set the space between the cell wall and the cell content
			echo '<tr>'; //φτιαχνουμε την πρωτη γραμμη του πινακα
			echo '<th>Email</th> <th>Όνομα</th> <th>Επώνυμο</th><th>Τηλέφωνο</th><th style="width:25px;">Eπεξεργασία</th><th style="width:25px;">Διαγραφή</th>'; //δημιουργουμε τα table headers που θα βρισκονται στην πρωτη γραμμη
			echo '</tr>';
			
			
			
	
			while($row = mysqli_fetch_array($result)){ //κανουμε το query που μας εμφανίζει όλα τα mail των χρηστών προς επεξεργασία
			  		      
						
						echo '<tr>';
						echo '<td>' . $row['email'] . '</td>';
						echo '<td>' . $row['onoma'] . '</td>';
						echo '<td>' . $row['epwnymo'] . '</td>';
						echo '<td>' . $row['thlefwno'] . '</td>';
						echo '<td style="text-align:center;"><a href="edit_users.php?xid=' . $row['x_id'] . '"><img src="/images/edit2.png"></img></a></td>'; //δημιουργουμε ενα λινκ που θα μας πηγαινει αυτοματα στην σελιδα επεξεργασιας συγκεκρημενου χρηστη
						echo '<td style="text-align:center;"><a href="delete_users.php?xid=' . $row['x_id'] . '"><img src="/images/fail.png"></img></a></td>'; //ή θα διαγραφει τον συγκεκρημενο χρήστη
						echo '</tr>';						
			}
			echo "</table";			
			}else
			echo "Δεν υπάρχει κάποιος χρήστης";
			}
			else echo "You have no privilege to be here!";
			}
			else {  //Εάν δεν είμαστε εγγεγραμμένοι χρήστες ή δεν έχουμε συνδεθει
			
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		
}

 
			
			
			
           ?>
			</div></div></div>			
</body>                      
	</html>
	
							
					


	
		
				