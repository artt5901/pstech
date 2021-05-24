<?php
	include "connect.php";
	$t_id = $_POST['t_id'];
	
	if($t_id != 0){
	$check = "SELECT t_id FROM grade WHERE t_id = '$t_id'";
	$result1 = mysqli_query($conn, $check) or die(mysqli_error($conn));
	$num = mysqli_num_rows($result1);

	$check2 = "SELECT t_id FROM classroom WHERE t_id = '$t_id'";
	$result2 = mysqli_query($conn, $check2) or die(mysqli_error($conn));
	$num2 = mysqli_num_rows($result2);

	$check3 = "SELECT t_id FROM news WHERE t_id = '$t_id'";
	$result3 = mysqli_query($conn, $check3) or die(mysqli_error($conn));
	$num3 = mysqli_num_rows($result3);

	if ($num > 0 || $num2 > 0 && $num3 > 0) {
		$msg = ""; //สร้างข้อความเก็บไว้ในตัวแปร
		if ($num > 0) $msg .= "Grade ";
		if ($num2 > 0) $msg .= "Classroom  ";
		if ($num3 > 0) $msg .= "News  ";
		echo "<script>";
		echo "alert(' ตาราง {$msg} มีการใช้ข้อมูลจากตาราง Teacher ไม่สามารถลบข้อมูลได้ !');"; //นำตัวแปรมาต่อข้อความที่มีอยู่ 
		echo "window.history.back();";
		echo "</script>";
	} else {
	$sql = "DELETE FROM teacher WHERE t_id = '$t_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showteacher.php';";
	 echo"</script>";
 }
	}
?>