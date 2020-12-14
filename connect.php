<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$dbname = "db_pstech";
	$conn = mysqli_connect($server,$user,$password);
	
	if(!$conn)
	die("1. ไม่สามารถติดต่อกับ MySQL ได้");
	
	mysqli_select_db($conn,$dbname)
	 or die ("2. ไม่สามารถเลือกใช้งานฐานข้อมูลได้");
	mysqli_query($conn,"SET character_set_results=utf8");
	mysqli_query($conn,"SET character_set_client=utf8");
	mysqli_query($conn,"SET character_set_connection=utf8");
	?>
