<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
<link rel="stylesheet" type="text/css" href="css/tables.css"> 
<body>
<div class="container">
<div class="content">

	<?php
		session_start();
		include 'menu.php';
		
	if (isset($_SESSION['logged_in'])){ //ean eimaste syndedemenoi
			if  ($_SESSION['admin_stat']==1) //ean eimaste admin
			{  
				include 'connect_db.php';
				if (isset($_GET['xid']) && is_numeric($_GET['xid'])) //ελεγχουμε εαν το id του χρηστη βρισκεται στην διευθυνση και εαν ειναι εγκυρο
					{
					$id = $_GET['xid'];
					
					$query = "SELECT * FROM xristes WHERE x_id='$id'";
					$result = $con->query($query);
		
		
					$row = mysqli_fetch_array($result); //epeidh epeksergazomaste ta stoixeia enos sygkekrhmenou xrhsth, den xreiazetai na valoume while
		
		
						$email=$row['email'];  
					$onoma=$row['onoma'];
						$password=$row['password'];
						$epwnymo=$row['epwnymo'];
					$thlefwno=$row['thlefwno'];
	
	
		?>
		
					<div id="page-wrap" >
					<table border='1' cellpadding='10'>
					
					
					
					
		
						<form id="f1" action='update_users.php?xid=<?php echo  $row['x_id'] ?>' method='POST'>
			
						<tr>
						<th>ID</th><td><?php echo  $row['x_id'] ?></td></tr>
						<tr>
						<th>Email</th> <td><input type="email" name="email" value="<?php echo $email ?>"></td></tr>
						<tr>
						<th>Password</th><td> <input type="password" name="new_pass" value="<?php echo $password ?>"></td></tr>
						<tr>
						<th>First Name</th> <td> <input type="text" name="new_name" value="<?php echo $onoma ?>"></td></tr>
						<tr>
						<th>Last Name</th> <td><input type="text" name="new_surname" value="<?php echo $epwnymo ?>"></td></tr>
						<tr>
						<th>Phone</th><td> <input type="tel" name="new_phone" value="<?php echo $thlefwno ?>"></td></tr>
						
						</form>
						<tr>
						<th>Submit | Reset | Delete</th>
						<td style="float:center";><button form="f1" type="submit" style=" cursor: pointer; border: 0; background: transparent">
						<img src="/images/tick.png" width="17" height="17" alt="submit" />
						</button>
						<button form="f1" type="reset" style=" cursor: pointer; border: 0; background: transparent">
						<img src="/images/refresh1.png" width="17" height="17" alt="submit" />
						</button>	<button form="f2" type="submit" style=" cursor: pointer; border: 0; background: transparent">
						<img src="/images/fail.png" width="17" height="17" alt="submit" />
						</button></td>
						
						<form id="f2" action="delete_users.php?xid=<?php echo $row['x_id'] ?>" method="POST">
						</form>
						
					
						</tr>
						<br />	
						</table>	
						<?php
					
				
			         
		} else echo 'ΞΟΟ€Ο‚!ΞΞ¬Ο„ΞΉ Ο€Ξ®Ξ³Ξµ ΟƒΟ„ΟΞ±Ξ²Ξ¬!';
		} else echo "You have no previlage to be here!";
		}
		else  //ean den exoume kanei login
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		
		
		
		
		
?>
</div></div></div>
</body>
		</html>
