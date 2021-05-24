<?php
	include "connect.php";
	$p_id = $_POST["p_id"];
	$p_name = $_POST["p_name"];
	$p_detail = $_POST["p_detail"];
	$p_year = $_POST["p_year"];
	$t_id = $_POST["t_id"];
	$s_username = $_POST["s_username"];

	
		$sql = "UPDATE portfolio SET p_name='$p_name',
		 p_detail='$p_detail',
		 p_year='$p_year',
		 t_id='$t_id',
		 s_username='$s_username'
		 WHERE p_id = '$p_id'";
		mysqli_query($conn,$sql)
	 		or die("5. ไม่สามารถประมวลผลคำสั่งได้");
		mysqli_close($conn);
	 	
		echo"<script language=\"javascript\">";
	 	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 	echo"window.location = 'showportfolio.php';";
		echo"</script>";
				
	
?>
