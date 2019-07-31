<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<body>

<?php 
	include 'connect_db.php';
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	
	
	if (isset($_GET['kid']) && is_numeric($_GET['kid'])) //ελεγχουμε εαν το id του χρηστη βρισκεται στην διευθυνση και εαν ειναι εγκυρο
		{
		$id = $_GET['kid'];
		$con->query("DELETE FROM katigories_anaf WHERE k_id = $id");
		$con->query("SET @count = 0;"); 
		$con->query("UPDATE `katigories_anaf` SET `katigories_anaf`.`k_id` = @count:= @count + 1;"); // κανουμε rearrange τον πινακα και βαζουμε τα x_id παλι με τη σειρα
		//printf("Affected rows (DELETE): %d\n", $con->affected_rows);
		 header("Location: diaxirisi.php");
	
		}
	
	
	
	
	
	
	?>
	</body>
	</html>