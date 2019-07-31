<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'connect_db.php';

    
	if (!empty($_POST['email']) && !empty($_POST['password'])){ //εαν εχουμε δώσει στοιχεία για να γίνει login
		$email=$_POST["email"];
		$password=$_POST["password"]; // o kwdikos pou exei steilei o wanna be connected user
	
		$query = "SELECT * FROM xristes WHERE email='$email'";
		$result = $con->query($query);
		$row = $result->fetch_array();
		
		$hashed = $row["password"]; //swstos kwdikos apo vash dedomenwn
		$pwd = crypt($password,$hashed);
		
		
	
			if ($row['email']!=$email OR $hashed != $pwd){
				echo " <script type=\"text/javascript\">";
				echo "	alert('Λάθος στοιχεία');";
				echo "	</script>" ;
				
				header('Location: index.php');
					
				}
			else {
			
			
			$_SESSION['CurrentUser']=$email;
			
			$_SESSION['admin_stat']=$row['admin'];
			$_SESSION['logged_in']=true;
			
			header('Location: index.php');
		
			}
	}
	else { 
		
		header('Location: index.php');
		
	}
	
			?>
	</body>
	</html>