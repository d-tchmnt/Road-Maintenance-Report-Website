﻿<!DOCTYPE html>
<meta charset="UTF-8">
<html>
</body>

	<?php
	
	include 'connect_db.php';
	include 'home_link.html';
	
	if (isset($_GET['xid']) && is_numeric($_GET['xid'])) //��������� ��� �� id ��� ������ ��������� ���� ��������� ��� ��� ����� ������
		{
		$id = $_GET['xid'];
	
	if (!empty($_POST['email'])) //��� �� email ��� ����� ����, ���������� �� ���� ��
		mysqli_query($con,"UPDATE xristes SET email='" . $_POST['email'] . "' WHERE x_id= '" . $id ."' ");
		
	
		mysqli_query($con,"UPDATE xristes SET onoma='" . $_POST['new_name'] . "' WHERE x_id= '" . $id ."' ");
			
	
		mysqli_query($con,"UPDATE xristes SET epwnymo='" . $_POST['new_surname'] . "'  WHERE x_id= '" . $id ."' ");
		
	
		mysqli_query($con,"UPDATE xristes SET thlefwno='" . $_POST['new_phone'] . "'  WHERE x_id= '" . $id ."' ");
	
			   
		mysqli_query($con,"UPDATE xristes SET password='" . $_POST['new_pass'] . "'  WHERE x_id= '" . $id ."' ");
				
				echo "�� ������� ������������� ��������!";
				header("Location: diax_xristes.php");
				}
	
	
	?>
	</body>
	</html>