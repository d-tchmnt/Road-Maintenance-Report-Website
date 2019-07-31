<!DOCTYPE html>
<meta charset="UTF-8">
<html>
</body>

	<?php
	
	include 'connect_db.php';
	include 'home_link.html';
	
	if (isset($_GET['xid']) && is_numeric($_GET['xid'])) //ελεγχουμε εαν το id του χρηστη βρισκεται στην διευθυνση και εαν ειναι εγκυρο
		{
		$id = $_GET['xid'];
	
	if (!empty($_POST['email'])) //εαν το email δεν ειναι κενο, τοποθετησε το στην βδ
		mysqli_query($con,"UPDATE xristes SET email='" . $_POST['email'] . "' WHERE x_id= '" . $id ."' ");
		
	
		mysqli_query($con,"UPDATE xristes SET onoma='" . $_POST['new_name'] . "' WHERE x_id= '" . $id ."' ");
			
	
		mysqli_query($con,"UPDATE xristes SET epwnymo='" . $_POST['new_surname'] . "'  WHERE x_id= '" . $id ."' ");
		
	
		mysqli_query($con,"UPDATE xristes SET thlefwno='" . $_POST['new_phone'] . "'  WHERE x_id= '" . $id ."' ");
	
			   
		mysqli_query($con,"UPDATE xristes SET password='" . $_POST['new_pass'] . "'  WHERE x_id= '" . $id ."' ");
				
				echo "Οι αλλαγές αποθηκεύτηκαν επιτυχώς!";
				header("Location: diax_xristes.php");
				}
	
	
	?>
	</body>
	</html>