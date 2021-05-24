<?php
	include "connect.php";
	
	$c_num = $_POST['c_num'];
	$c_name = $_POST['c_name'];
	$c_credit = $_POST['c_credit'];
	$c_ot = $_POST['c_ot'];
	$c_status = $_POST['c_status'];
	
	if(!empty($c_num)&&!empty($c_name)&&!empty($c_credit)&&!empty($c_ot)){
		$sql = "SELECT * FROM course WHERE c_num = '$c_num'";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 	$total = mysqli_num_rows($result);
		if ($total == 0){
			$sql = "INSERT INTO course (c_num, c_name, c_credit, c_ot, c_status) VALUES ('$c_num','$c_name','$c_credit','$c_ot','$c_status')";
			mysqli_query($conn,$sql)
	 		or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 		mysqli_close($conn);
	 		echo"<script language=\"javascript\">";
	 		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 		echo"window.location = 'frm_addcourse.php';";
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
	 	echo"alert('กรุณาป้อนข้อมูลให้ครบ');";
	 	echo"window.history.back();";
	 	echo"</script>";
	}
	
?>
