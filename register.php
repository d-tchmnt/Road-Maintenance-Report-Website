<!DOCTYPE html>
<meta charset="UTF-8">
<html>
	<head>
	
	</head>
		<link rel="stylesheet" type="text/css" href="menu.css"> 
	<body>

<?php
	include 'connect_db.php';
	if ( $_POST['password'] && $_POST['email']) {
		if ($_POST['password'] == $_POST['password2']) {
			$query = mysqli_query($con,"SELECT email FROM xristes WHERE email='" .$_POST['email']. "' ");
		    if (mysqli_num_rows($query) != 0){
					echo "   <script type=\"text/javascript\">";
					echo "	alert('Είστε ήδη εγγεγραμένος χρήστης');";
					echo "	</script>" ;
					include 'index.php';
			} else {
			
					$pwd = $_POST['password'];
					$pwd_hash = crypt($pwd);
				    mysqli_query($con,"INSERT INTO xristes  VALUES(DEFAULT,'" . $_POST['email'] . "','$pwd_hash','" . $_POST['name'] . "','" . $_POST['surname'] . "','" . $_POST['phone'] . "','0')") ;
					
					include 'index.php';
					echo '<div id="test">';
					echo "Η εγγραφή σας ολοκληρώθηκε επιτυχώς ! Mπορείτε τώρα να κάνετε Login!!";
					echo '</div>';}
				
				
			
								
					
			
		}
		else{
		
		header( 'Location: /#openModal' ) ;
				
					
			
		}
	}
	else {

	header( 'Location: /#openModal' ) ;
	
		
					
			
		}
?>

</body>
</html>