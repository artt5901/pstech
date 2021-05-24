<?php
	include "connect.php";
	
	$class_id = $_POST['class_id'];
	$class_name = $_POST['class_name'];
	$b_id = $_POST['b_id'];
	
	
	if($class_name != ""){
		$sql = "SELECT * FROM class WHERE class_name = '$class_name'";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 	$total = mysqli_num_rows($result);
		if ($total == 0){
			$sql = "UPDATE class SET class_name = '$class_name' , b_id = '$b_id' WHERE class_id = '$class_id'";
				mysqli_query($conn,$sql)
	 				or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 			mysqli_close($conn);
				echo"<script language=\"javascript\">";
	 			echo"window.location = 'showclass.php';";
	 			echo"</script>";
				if($class_name == ""){
				echo"<script language=\"javascript\">";
	 			echo"alert('กรุณาป้อนหมู่เรียน);";
	 			echo"window.history.back();";
	 			echo"</script>";		
				}
		else {
			echo"<script language=\"javascript\">";
	 	echo"alert('ข้อมูลซ้ำ กรุณาป้อนข้อมูลใหม่');";
	 	echo"window.history.back();";
	 	echo"</script>";
		
	}
				}
		}
	
?>
