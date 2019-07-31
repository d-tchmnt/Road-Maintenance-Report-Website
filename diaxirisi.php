<!DOCTYPE html>
<meta charset="UTF-8">
<html>
	<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function() {
           $.ajaxSetup({ cache: false }); 
setInterval(

function() {
     $('#mydiv').load('countStatistics.php #stats');
    } , 5000);  });
    
</script>

	</head>
		<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
	<link rel="stylesheet" type="text/css" href="css/tables.css">
	<body>
	<div class="container">
<div class="content">

		<?php
		include 'connect_db.php';
		session_start();
		include 'menu.php';
		
		if (isset($_SESSION['logged_in'])){ //ean exoume kanei login
						if  ($_SESSION['admin_stat']==1){//ean eisai admin
						
						
						include 'anoixt_anaf.php';
						include 'arxeio.php';
						include 'cat_anaf.php';
						
						}//an den eisai admin
						else echo "You have no previlage to be here!"; //ean den eimaste admin
						} //an den eisai syndedemenos
						else echo '<meta http-equiv="refresh" content="0; url=index.php" />';?>
						
						</div>
						</div>
						</body>
						</html>