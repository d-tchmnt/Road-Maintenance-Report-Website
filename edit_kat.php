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
		
		if (isset($_SESSION['logged_in'])){ //ean exoume kanei login
			if  ($_SESSION['admin_stat']==1) //ean eimaste admin
			{  
				include 'connect_db.php';
				include 'menu.php';
				if (isset($_GET['kid']) && is_numeric($_GET['kid'])) //ean to kid pou exoume dwsei yparxei k einai noumero
					{
					$id = $_GET['kid'];
		
					echo "<table style='color:white;' border='1' cellpadding='10'>"; //dhmiourgoume to table, cellpadding:Set the space between the cell wall and the cell content
							
					$query = "SELECT * FROM katigories_anaf WHERE k_id='$id'";
					$result = $con->query($query);
		
		
					$row = mysqli_fetch_array($result) ;
		
					$onoma_cat=$row['onoma_kat'];
						

						echo "	<form id='f1' action='update_cat.php?kid=" . $row['k_id'] . "' method='POST'>"; 
			
						echo '<tr>';
						echo '<th>ID</th><td>' . $row['k_id'] . '</td></tr>';
						echo '<tr><th>Onoma</th><td><input type="text" name="new_cat_name" value="' . $onoma_cat . '"></td></tr>';
						echo '</form>';
						?>
						<tr><th>Καταχώρηση</th><td><button form="f1" type="submit" style="color:white; cursor: pointer; border: 0; background: transparent">
			<img src="/images/tick.png" width="17" height="17" alt="submit" />
			</button>
			<tr><th>Επαναφορά</th><td><button form="f1" type="reset" style="color:white; cursor: pointer; border: 0; background: transparent">
			<img src="/images/refresh1.png" width="17" height="17" alt="reset" />
			</button></tr>
			<?php
						
						
						echo '<form id="f2" action="delete_kat.php?kid=' . $row['k_id'] . '" method="POST">';
						echo '</form>';
						?>
						<tr><th>Διαγραφή</th><td><button form="f2" type="delete" style="color:white; cursor: pointer; border: 0; background: transparent">
			<img src="/images/fail.png" width="17" height="17" alt="reset" />
			</button></tr>
						
						<?php
						
						
						echo '<br />';	
						echo '</table>';
				
						
					
				
			         
		}
		} else echo "You have no previlage to be here!"; //ean den eimaste admin
		}
		else {  //ean den exoume syndethei
				echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}
		
		
		
		
		?>
		</div></div>
		
		
		</body>
		</html>