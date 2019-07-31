<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<body>

<?php 
	include 'connect_db.php';
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	
	
	if (isset($_GET['xid']) && is_numeric($_GET['xid'])) //ελεγχουμε εαν το id του χρηστη βρισκεται στην διευθυνση και εαν ειναι εγκυρο
		{
		$id = $_GET['xid'];
		$con->query("DELETE FROM xristes WHERE x_id = $id");
		//printf("Affected rows (DELETE): %d\n", $con->affected_rows);
		 header("Location: diax_xristes.php");
	
		}
	
	
	
	
	
	
	?>
</body>
</html>