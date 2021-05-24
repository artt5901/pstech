<?php
	include "connect.php";
	
	$classroom_id = $_POST['classroom_id'];
	$class_id = $_POST['class_id'];
	$c_id = $_POST['c_id'];
	$y_id = $_POST['y_id'];
	$t_id = $_POST['t_id'];
	$day_id = $_POST['day_id'];
	$time_id = $_POST['time_id'];
	
			$sql = "UPDATE classroom SET class_id = '$class_id' , 
			c_id = '$c_id' , 
			y_id = '$y_id' , 
			t_id = '$t_id' , 
			day_id = '$day_id' , 
			time_id = '$time_id' 
			WHERE classroom_id = '$classroom_id'";
				mysqli_query($conn,$sql)
	 				or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 			mysqli_close($conn);
				echo"<script language=\"javascript\">";
	 			echo"window.location = 'showclassroom.php';";
	 			echo"</script>";
	
?>
