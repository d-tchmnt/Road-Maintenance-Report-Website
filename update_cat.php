<!DOCTYPE html>
<html>
<body>
<meta charset="UTF-8">

	<?php
	
	include 'connect_db.php';
	include 'home_link.html';
	
	if (isset($_GET['kid']) && is_numeric($_GET['kid'])) //Ean  to kid yparxei k einai noumero
		{
		$id = $_GET['kid'];
	}
		mysqli_query($con,"UPDATE katigories_anaf SET onoma_kat='" . $_POST['new_cat_name'] . "' WHERE k_id= '" . $id ."' ");
		
	
				
				
				header("Location: diaxirisi.php");
	
	
	?>
	</body>
	</html>