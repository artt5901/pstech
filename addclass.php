<?php
	include "connect.php";
	
	$class_name = $_POST['class_name'];
	$b_id = $_POST['b_id'];
	if($class_name != ""){
		$sql = "SELECT * FROM class WHERE class_name = '$class_name'";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 	$total = mysqli_num_rows($result);
		if ($total == 0){
			$sql = "INSERT INTO class (class_name , b_id) VALUES ('$class_name', '$b_id')";
			mysqli_query($conn,$sql)
	 		or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 		mysqli_close($conn);
	 		echo"<script language=\"javascript\">";
	 		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 		echo"window.location = 'frm_addclass.php';";
	 		echo"</script>";
		}
		else {
			echo"<script language=\"javascript\">";
	 	echo"alert('ข้อมูลซ้ำ กรุณาป้อนข้อมูลใหม่');";
	 	echo"window.history.back();";
	 	echo"</script>";
		}			
	}
	else {
		echo"<script language=\"javascript\">";
	 	echo"alert('กรุณาป้อนรหัสหมู่เรียน');";
	 	echo"window.history.back();";
	 	echo"</script>";
	}
	
?>
