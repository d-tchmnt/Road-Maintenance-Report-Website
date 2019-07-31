
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
	<link rel="stylesheet" type="text/css" href="css/menu.css"> 
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

	 
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	<script type='text/javascript' src='menu_jquery.js'></script>
	




<?php

$page= basename($_SERVER['PHP_SELF']);

?>


<nav>
	<ul> <?php
		if ($page=="index.php")echo '<li class="active"><a href="index.php"><span>Αρχική</span></a></li>';
		else echo '<li><a href="index.php"><span>Αρχική</span></a></li>';
		if (isset($_SESSION['logged_in'])){	?>
		<li><a href="profile2.php"><span>Προφίλ</span></a></li>
		<li><a href="create_anaf.php"><span>Δημιουργία Αναφοράς</span></a></li>
			
				
				
				<?php if (isset($_SESSION['admin_stat'])){
						if  ($_SESSION['admin_stat']==1){
						echo '<li><a href="diaxirisi.php">Διαχείριση</a></li>';
						}} 
						
			
		
		 if (isset($_SESSION['admin_stat'])){
				if  ($_SESSION['admin_stat']==1){
                       echo '<li><a href="diax_xristes.php"><span>Διαχείριση χρηστών</span></a></li>';} }
			
			   echo '<li style="float:right"><a id="logout" href="logout.php"><span>Αποσύνδεση</span></a></li>';}
			   else
					   echo '<li style="float:right"><a href="#openModal"><span>Εγγραφή</span></a></li>';	
					?>
	</ul>
<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		
		<p><?php include 'register_form.php';?></p>
		
	</div>
</div>
</nav>



