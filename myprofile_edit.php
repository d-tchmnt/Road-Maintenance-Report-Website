<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
	<head>
	</head>
	<body>
		<?php
		include 'connect_db.php';		
		session_start();	
		include 'menu.php';
		
			if (!empty($_POST['new_pass']) AND $_POST['new_pass']==$_POST['new_pass2']) {
				
				mysqli_query($con,"UPDATE xristes SET onoma='" . $_POST['new_name'] . "' WHERE email= '" . $_SESSION['CurrentUser'] ."' ");
			
				
				mysqli_query($con,"UPDATE xristes SET epwnymo='" . $_POST['new_surname'] . "' WHERE email= '" . $_SESSION['CurrentUser'] ."' ");
		
			
				mysqli_query($con,"UPDATE xristes SET thlefwno='" . $_POST['new_phone'] . "' WHERE email= '" . $_SESSION['CurrentUser'] ."' ");
				if (!empty($_POST['new_pass'])) //Εαν το πεδιο του νέου κωδικού δεν ειναι άδειο, τότε στην συνθήκη στη γραμμη 8, η πρωτη συνθήκη γίνεται false
											   // και η 2η TRUE, οπότε έχουμε κωδικό, και είναι ίδιος και στις 2 περιπτώσεις, οπότε μπορεί να γίνε το update
				
				$pwd = $_POST['new_pass'];
				$pwd_hash = crypt($pwd);
				
				mysqli_query($con,"UPDATE xristes SET password='$pwd_hash' WHERE email= '" . $_SESSION['CurrentUser'] ."' ");
				echo "<script type=\"text/javascript\">";
				echo "	alert('Οι αλλαγές αποθηκεύτηκαν με επιτυχία!');";
				echo "	</script>" ;
				header("Location: index.php");
				
				}
				else { 
				
				
				echo "<script type=\"text/javascript\">";
				echo "	alert('Παρακαλώ συμπληρώστε σωστά τα απαραίτητα πεδία');";
				echo "	</script>" ;
				echo '<meta http-equiv="Refresh" content="2; url=profile2.php" />';
				
				}	

				
		?>
		</body>
	</html>