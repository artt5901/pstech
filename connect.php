<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$dbname = "db_pstech";
	$conn = mysqli_connect($server,$user,$password); //เป็นการเชื่อมต่อ เซฺิฟเวอร์ ชื่อผู้ใช้ รหัสผ่าน
	
	if(!$conn)
	die("1. ไม่สามารถติดต่อกับ MySQL ได้");
	
	mysqli_select_db($conn,$dbname)
	 or die ("2. ไม่สามารถเลือกใช้งานฐานข้อมูลได้");
	mysqli_query($conn,"SET character_set_results=utf8");
	mysqli_query($conn,"SET character_set_client=utf8");
	mysqli_query($conn,"SET character_set_connection=utf8");

	ini_set('memory_limit', '-1');
	?>
	
