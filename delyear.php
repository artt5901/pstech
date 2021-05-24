<?php
	include "connect.php";
	$y_id = $_POST['y_id'];
	
	if($y_id != 0){
	$check = "SELECT y_id FROM grade WHERE y_id = '$y_id'";
	$result1 = mysqli_query($conn, $check) or die(mysqli_error($conn));
	$num = mysqli_num_rows($result1);

	$check2 = "SELECT y_id FROM classroom WHERE y_id = '$y_id'";
	$result2 = mysqli_query($conn, $check2) or die(mysqli_error($conn));
	$num2 = mysqli_num_rows($result2);

	if ($num > 0 || $num2 > 0) {
		$msg = ""; //สร้างข้อความเก็บไว้ในตัวแปร
		if ($num > 0) $msg .= "Grade ";
		if ($num2 > 0) $msg .= "Classroom  ";
		echo "<script>";
		echo "alert(' ตาราง {$msg} มีการใช้ข้อมูลจากตาราง Year ไม่สามารถลบข้อมูลได้ !');"; //นำตัวแปรมาต่อข้อความที่มีอยู่ 
		echo "window.history.back();";
		echo "</script>";
	} else {
	$sql = "DELETE FROM year WHERE y_id = '$y_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showyear.php';";
	 echo"</script>";
}
}
?>
