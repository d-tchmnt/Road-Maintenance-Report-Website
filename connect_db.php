<meta charset="UTF-8">
	<?php
	
	$con=mysqli_connect("localhost","admin","","test"); // ������� �� ��� Mysql server. ���������� ��� ������� ��� �� ��� ��������� ��� ������� �����
    mysqli_connect_error();
	$con->query('SET CHARACTER SET utf8');
	$con->query('SET COLLATION_CONNECTION=utf8_general_ci');
?>