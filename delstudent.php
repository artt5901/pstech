<?php
	include "connect.php";
	$s_username = $_POST['s_username'];
	
	if($s_username != 0){
			$sql = "select s_username from grade where s_username = '$s_username'";
			$result = mysqli_query($conn,$sql)
			or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();	
			$total = mysqli_num_rows($result);
			
	if ($total == 0){
	$sql = "DELETE FROM student WHERE s_username = '$s_username'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showstudent_first.php';";
	 echo"</script>";
	}
			echo"<script language=\"javascript\">";
	 			echo"alert('ตาราง Grade มีการใช้งานข้อมูลจากตาราง Student ไม่สามารถลบข้อมูลได้');";
	 			echo"window.history.back();";
	 			echo"</script>";
		}
?>