<?php
	include "connect.php";
	

	$p_name = $_POST["p_name"];
	$p_detail = $_POST["p_detail"];
	$p_year = $_POST["p_year"];
	$t_id = $_POST["t_id"];
	$s_username = $_POST["s_username"];
	
	if($s_username){
		$check = "SELECT s_username FROM student WHERE s_username = '$s_username' "; 
		$result1 = mysqli_query($conn, $check) or die(mysqli_error());
		$num = mysqli_num_rows($result1);
		if($num == 1){
			$sql = "INSERT INTO portfolio (p_name, p_detail, p_year, t_id, s_username) 
				VALUES ('$p_name', '$p_detail', '$p_year', '$t_id', '$s_username')";
		mysqli_query($conn,$sql)
	 		or die("5. ไม่สามารถประมวลผลคำสั่งได้");
		mysqli_close($conn);
	 	
		echo"<script language=\"javascript\">";
	 	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 	echo"window.location = 'showportfolio.php';";
	 	echo"</script>";
		}else{
			echo"<script language=\"javascript\">";
	 		echo"alert('กรุณาตรวจสอบ รหัสนักศึกษาให้ถูกต้อง');";
	 		echo "window.history.back();";
	 		echo"</script>";
		}
	}	
?>
