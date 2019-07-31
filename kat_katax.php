<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<body>

	<?php
	
	
	session_start();
	if (!isset($_SESSION['logged_in'])){ //Εάν δεν ειμαστε συνδεδεμενοι παραπεμπόμαστε σε φόρμα login/register
			echo " <script type=\"text/javascript\">";
			echo "	alert('Πρέπει να έχετε κάνει log-in πρώτα!');";
			echo "	</script>" ;
			include 'index.php';
			}
		else{ //Εαν είμαστε συνδεδεμένοι
		include 'connect_db.php';
		if(isset($_POST['onoma_kat'])) {
        $n = trim($_POST['onoma_kat']);
     }
        if(empty($n) or !isset($_POST['onoma_kat'])) {
            $errors[] = "Please give a name";
        }
		
		$sql = "INSERT INTO katigories_anaf VALUES (DEFAULT,'$n')";
		mysqli_query($con,$sql);
		
				
				
		header("Location: diaxirisi.php");
	}
	
	?>
	</body>
	</html>