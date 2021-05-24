<?php
	include "connect.php";
	$c_id = $_POST['c_id'];
	
	if($c_id != 0){
	$check = "SELECT c_id FROM grade WHERE c_id = '$c_id'";
	$result1 = mysqli_query($conn, $check) or die(mysqli_error($conn));
	$num = mysqli_num_rows($result1);

	$check2 = "SELECT c_id FROM classroom WHERE c_id = '$c_id'";
	$result2 = mysqli_query($conn, $check2) or die(mysqli_error($conn));
	$num2 = mysqli_num_rows($result2);
	if ($num > 0 || $num2 > 0) {
		$msg = ""; //สร้างข้อความเก็บไว้ในตัวแปร
		if ($num > 0) $msg .= "grade ";
		if ($num2 > 0) $msg .= "classroom  ";
		echo "<script>";
		echo "alert(' ตาราง {$msg} มีการใช้ข้อมูลจากตาราง course ไม่สามารถลบข้อมูลได้ !');"; //นำตัวแปรมาต่อข้อความที่มีอยู่ 
		echo "window.history.back();";
		echo "</script>";
	} else {
	$sql = "DELETE FROM course WHERE c_id = '$c_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showcourse.php';";
	 echo"</script>";
	 }
	}
?>