<!DOCTYPE html>
<meta charset="UTF-8">

<head>
<style>
<link rel="stylesheet" type="text/css" href="css/menu.css"> 

</style>

</head>
<?php 
	
	include 'connect_db.php';
	
	?>
	
	<html> <!-- φορμα login -->
		<body>
	
<div id="register_form">
<h2>Φόρμα εγγραφής</h2>
			  <form id='register_form' action="register.php" method="post"> <!-- h forma xrisomopoieitai gia thn apostolh dedomenwn ston server-->
				<label for='email' >*E-mail </label><br>
				<input  placeholder ="enter your email adress"type="email" name="email" /> <br>
				<label for='password' >*Κωδικός : </label><br>
				<input type="password" name="password" /> <br />
				<label for='password2' >*Επαλήθευση κωδικού: </label><br>
				<input type="password" name="password2" /> <br />
				<label for='name' >Όνομα : </label><br>
				<input type="text" name="name" /> <br />
				<label for='surname' >Επώνυμο : </label><br>
				<input type="text" name="surname" /> <br />				
				<label for='phone' >Τηλέφωνο </label><br>
				<input type="tel" name="phone" /> <br />
				<p >Τα πεδία με * είναι υποχρεωτικά</p>
				
				<input id="register_button" type="submit" value="Εγγραφή" />
			
			
			</form>
			</div>
			</body>
	</html>		
