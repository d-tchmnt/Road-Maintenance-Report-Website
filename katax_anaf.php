<!DOCTYPE html>
<meta charset="UTF-8">
<html>
	<head>
	</head>
	<body>
		<?php
		include 'connect_db.php';
		
		session_start();
		include 'menu.php';
		if (!isset($_SESSION['logged_in'])){ //Εάν δεν ειμαστε συνδεδεμενοι παραπεμπόμαστε σε φόρμα login/register
				echo '<meta http-equiv="refresh" content="0; url=index.php" />';
			}
		else{ //Εαν είμαστε συνδεδεμένοι
			include 'connect_db.php';
			
			$onoma_k = mysqli_real_escape_string($con, $_POST['selected']);  //αποθηκευσε την κατηγορια αναφορας που θελουμε να δημιουργησουμε
			
			$report_name = mysqli_real_escape_string($con, $_POST['name']);
			$geolocation = mysqli_real_escape_string($con, $_POST['thesh']);
			$description = mysqli_real_escape_string($con, $_POST['perigrafi']);
			
			$result = mysqli_query($con,"SELECT * FROM katigories_anaf WHERE onoma_kat='$onoma_k'");
			
						$result = mysqli_query($con,"SELECT * FROM katigories_anaf WHERE onoma_kat='$onoma_k'");
					while($row = mysqli_fetch_array($result)) {
						$category_id = $row["k_id"];
						
					}	
					echo $category_id;
			
			 
			 $user = $_SESSION['CurrentUser'];
			 
			 $result = mysqli_query($con,"SELECT * FROM xristes WHERE email='$user'");
					while($row = mysqli_fetch_array($result)) {
						$user_id = $row["x_id"];
							
					}
				 $sql = "INSERT INTO anafores 
			 VALUES (DEFAULT,'$category_id ',NULL,'$user_id','$report_name','$geolocation','$description','0',DEFAULT,'NULL','NULL','NULL','NULL')";
			 mysqli_query($con,$sql);
			 $id_anaforas = mysqli_insert_id($con);
		
			
	
/****************************************************/
/****************************************************/
/****************************************************/
/********UPLOADING IMAGES SCRIPT************************/
/****************************************************/
/****************************************************/
$left=0;
for($i=0;$i<count($_FILES['photos']);$i++){
	if(!empty($_FILES['photos']['name'][$i])){
      $left=1;
	}
}

if($left !=1) {//ean exoume anevasei fwtografia


}else{

$pic1='NULL';
$pic2='NULL';
$pic3='NULL';
$pic4='NULL';
define ("MAX_SIZE","5"); 
	function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}


	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
	
		$uploaddir = "uploads/"; //a directory inside
		$piccount=1; //enas counter pou deixnei poia einai h fwtografia pou epeksergazomaste se kathe loopa
		
		foreach ($_FILES['photos']['name'] as $name => $value)
		{
	 
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //pairnoume to extension ths fwtografias pou anevasame, k to metatrepoume se peza grammata
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
         {
	       if ($size < (MAX_SIZE*1024*1024))
	       {
		   $image_name=$id_anaforas.'_'.$piccount.'.'.$ext; //me tis teleies syndeoume diaforetikes metavlites.
		  
		   
		   $newname=$uploaddir.$image_name;
           
			   if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
			   {
			  
			   if ($piccount==1) $pic1=$image_name;
			   else if ($piccount==2) $pic2=$image_name;
			   else if ($piccount==3) $pic3=$image_name;
				else if ($piccount==4) $pic4=$image_name;
			
			 $piccount=$piccount+1; //afksise ton metriti. theloume na afksanei mono ean yparxei epityxhs kataxwrhsh ths fwtografias
		   
	       }
	       else
	       {
	        echo '<span>You have exceeded the size limit! so moving unsuccessful! </span>';
            }

	       }
		   else
		   {
			echo '<span>You have exceeded the size limit!</span>';
          
	       }
       
          }
          else
         { 
	     	echo '<span >Unknown extension!</span>';
           
	     }
           
     }
	 echo '<br />';
	 
	


}
$result= mysqli_query($con,"UPDATE anafores 
									SET pic1='$pic1',
									pic2='$pic2',
									pic3='$pic3',
									pic4='$pic4'
									WHERE a_id='$id_anaforas'");

				}
	
			
	
/****************************************************/
/****************************************************/
/****************************************************/
/********UPLOADING IMAGES SCRIPT************************/
/****************************************************/
/****************************************************/



			
			
			
			
header("Location: index.php");
			 
	
			 }
			
			?>
			</body>
			</html>
