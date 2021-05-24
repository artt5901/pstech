<?php
	include "connect.php";
	$class_id = $_POST['class_id'];
	
	if($class_id != 0){
	$check = "SELECT class_id FROM student WHERE class_id = '$class_id'";
	$result1 = mysqli_query($conn, $check) or die(mysqli_error($conn));
	$num = mysqli_num_rows($result1);

	$check2 = "SELECT class_id FROM classroom WHERE class_id = '$class_id'";
	$result2 = mysqli_query($conn, $check2) or die(mysqli_error($conn));
	$num2 = mysqli_num_rows($result2);

	$check3 = "SELECT class_id FROM grade WHERE class_id = '$class_id'";
	$result3 = mysqli_query($conn, $check3) or die(mysqli_error($conn));
	$num3 = mysqli_num_rows($result3);

	if ($num > 0 || $num2 > 0 && $num3 > 0) {
		$msg = ""; //สร้างข้อความเก็บไว้ในตัวแปร
		if ($num > 0) $msg .= "student ";
		if ($num2 > 0) $msg .= "classroom  ";
		if ($num3 > 0) $msg .= "grade  ";
		echo "<script>";
		echo "alert(' ตาราง {$msg} มีการใช้ข้อมูลจากตาราง class ไม่สามารถลบข้อมูลได้ !');"; //นำตัวแปรมาต่อข้อความที่มีอยู่ 
		echo "window.history.back();";
		echo "</script>";
	} else {
	$sql = "DELETE FROM class WHERE class_id = '$class_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showclass.php';";
	 echo"</script>";
	 }
	}
?>