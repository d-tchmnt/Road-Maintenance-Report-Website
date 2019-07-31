<!DOCTYPE html>
<meta charset="UTF-8">
<?xml version="1.0" encoding="utf-8"?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/css_all.css"> 
	</head>
	<div id="x2">
<div id="x1">
		<?php
		echo '<div id="mydiv">';
		include 'connect_db.php';
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		} 
			$num1=0; // synolo anaforwn, to mhdenizoume, sthn periptwsh pou den yparxoun anafores k to result epistrepsei false
			$result = mysqli_query($con,"SELECT * FROM anafores");
			while($row = mysqli_fetch_array($result)) {
						$num1 = mysqli_num_rows($result);
						}
			$num2=0; // synolo epilymenwn anaforwn, to mhdenizoume, sthn periptwsh pou den yparxoun anafores k to result epistrepsei false
			$result = mysqli_query($con,"SELECT * FROM epil_anaf");
			
			while($row = mysqli_fetch_array($result)) {
						$num2 = mysqli_num_rows($result);
						}
						
						
			$result = mysqli_query($con,"SELECT anafores.upload_date, epil_anaf.epil_time
														   FROM anafores
														   JOIN epil_anaf
														   ON epil_anaf.a_id=anafores.a_id"); //ypologizoume ton meso xrono epilyshs anaforas
														   
			$arithmos_epil_anaf = mysqli_num_rows($result); //briskoume poses einai oi epilymenes anafores
			$mxe=0; //orizoume mia metavlhth gia ton meso xrono epilyshs
			
			while($row = mysqli_fetch_array($result)) {
			
			$z=strtotime($row['upload_date']);
			$y=strtotime($row['epil_time']);
			$mxe=$mxe+$y-$z;
			
			
		
			}
			if ($arithmos_epil_anaf!=0)
			$mxe=ceil($mxe/	$arithmos_epil_anaf/60);
			else $mxe=0;
			?>
						
			
			<table id="stats" cellpadding="10">
			
			
			<tr><td style="text-align:left">Σύνολο: <?php echo $num1; ?> | </td> 
			<td style="text-align:right">Ανοιχτές  : <?php  $sum = $num1 - $num2;
			echo $sum; ?> | </td> 
			<td style="text-align:left">Επιλυμένες :
			<?php  echo $num2; ?> |
		</td> 
			<td style="text-align:left">Μέσος χρόνος επίλυσης :
			<?php echo  $mxe; echo 'λεπτά';?>
			</td> </tr>
			
		
			

		
	
	
			
			</table></div>
		
	</div>	
	</div>		
		
</html>	
		
		
		
		
						
		
	