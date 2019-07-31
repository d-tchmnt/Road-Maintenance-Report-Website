<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<body>

	<?php
	
	include 'connect_db.php';
	include 'menu.php';
	session_start();
	
	if (isset($_GET['aid']) && is_numeric($_GET['aid'])) //ean to aid exei tethei k einai noumero
		{
			$id = $_GET['aid'];
			$sxolio=NULL;
			if (isset($_POST['sxolio'])) $sxolio=$_POST['sxolio'];
			
	
			$query = mysqli_query($con,"SELECT x_id FROM xristes WHERE email='" . $_SESSION['CurrentUser'] . "' ");
			$row = mysqli_fetch_array($query);
			$xid=$row['x_id'];
			mysqli_query($con,"UPDATE anafores SET epilithike='1' WHERE a_id= '" . $id ."' ");
		
			mysqli_query($con,"INSERT INTO epil_anaf  VALUES(DEFAULT,'" . $xid . "','" . $id . "', DEFAULT, '" . $sxolio . "')") ;


		
	
				
				
	header("Location: diaxirisi.php");
	}else echo 'Ούπς! Κάτι πήγε στραβά, ξαναπροσπαθήστε!';
	
	?>
	</body>
	</html>