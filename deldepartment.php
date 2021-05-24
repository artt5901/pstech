<?php
	include "connect.php";
	$d_id = $_POST['d_id'];
	
	if($d_id != 0){
			$sql = "select d_id from branch where d_id = '$d_id'";
			$result = mysqli_query($conn,$sql)
			or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();	
			$total = mysqli_num_rows($result);
			
	if ($total == 0){
	$sql = "DELETE FROM department WHERE d_id = '$d_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showdepartment.php';";
	 echo"</script>";
	}
			echo"<script language=\"javascript\">";
	 			echo"alert('ตาราง Branch มีการใช้งานข้อมูลจากตาราง Department ไม่สามารถลบข้อมูลได้');";
	 			echo"window.history.back();";
	 			echo"</script>";
		}
?>
