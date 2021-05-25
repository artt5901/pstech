<?php
	include "connect.php";
	$classroom_id = $_POST['classroom_id'];
	
	if($classroom_id != 0){
			$sql = "select classroom_id from grade where classroom_id = '$classroom_id'";
			$result = mysqli_query($conn,$sql)
			or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();	
			$total = mysqli_num_rows($result);
			
	if ($total == 0){
	$sql = "DELETE FROM classroom WHERE classroom_id = '$classroom_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showclassroom.php';";
	 echo"</script>";
	}
			echo"<script language=\"javascript\">";
	 			echo"alert('ตาราง Grade มีการใช้งานข้อมูลจากตาราง Classroom ไม่สามารถลบข้อมูลได้');";
	 			echo"window.history.back();";
	 			echo"</script>";
		}
?>