<!DOCTYPE HTML>
<meta charset="UTF-8">
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/tables.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
<script type="text/javascript" src="js/placeholder.js"></script>

</head>
<?php 
session_start();
include 'connect_db.php';

include 'Mobile_Detect.php';
		$detect = new Mobile_Detect();

		// Check for any mobile device.
		if ($detect->isMobile()){
		  header("Location: mobile/index.php");}
		else{

?>


<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.mysite.com/rss/rss2.xml" /> 


<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>		

<body>



<div class="container">
<div class="content">



	<?php 

	
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		
		include 'menu.php';
   
   
	
	?>
	

	
	<div class="map1">
	<?php
	include 'map_final.php';
	
	?>
	
	
	
	
	</div>
				
<?php	
		include 'countStatistics.php';?>
		
		
<?php
		if (isset($_SESSION['logged_in'])){ //Εάν είμαστε εγγεγραμμένοι χρήστες και εχουμε συνδεθει
	
	
			
			include 'anafores.php';?>
	
<?php
			
		}	
		
		else {  
						
				
			echo '<div id="login_field">';//h forma tou login
			?>
		
		
				<form id="slick-login" action="login.php" method="post"> <!-- h forma xrisomopoieitai gia thn apostolh dedomenwn ston server-->
					
					
					<label for='email' >*E-mail </label><br>
						<input  placeholder ="Email" type="email" name="email"  class="placeholder"/> <br>
						
						
						<label for='password' >Κωδικός </label><br>
						<input  placeholder ="Κωδικός" type="password" name="password" class="placeholder"/> <br>
					
					
					<input type="submit" value="Σύνδεση" />
					
				</form>
	
			
		
			<?php
			echo '</div>';	
		
				
			}?>
			<div id="footer">
	<a href="rss.php" rel="alternate" type="application/rss+xml" ><img src="images/rss.png" alt="rss_feed" ></a>
</div>
<?php
			}?>

	
</div></div>
<script type="text/javascript">
$(document).ready(function() {
											$.ajaxSetup({ cache: false }); 
setInterval(

function() {
					$('#mydiv').load('countStatistics.php #stats');
				}	, 5000);  });
				
</script>

			
	</body>
	
 </html>
 

	

