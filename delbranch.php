<?php
	include "connect.php";
	$b_id = $_POST['b_id'];
			
		if($b_id != 0){
			$sql = "select b_id from class where b_id = '$b_id'";
			$result = mysqli_query($conn,$sql)
			or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();	
			$total = mysqli_num_rows($result);
			
			if ($total == 0){
				$sql2 = "DELETE FROM branch WHERE b_id = '$b_id'";
				$result2 = mysqli_query($conn,$sql2)
	 			or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
				 mysqli_close($conn);
	 			echo"<script language=\"javascript\">";
	 			echo"window.location = 'showbranch.php';";
	 			echo"</script>";
			}
			echo"<script language=\"javascript\">";
	 			echo"alert('มีการใช้งานข้อมูลจากตาราง branch ไม่สามารถลบข้อมูลได้');";
	 			echo"window.history.back();";
	 			echo"</script>";
		}

?>