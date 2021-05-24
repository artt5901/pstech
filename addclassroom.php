<?php
include "connect.php";

$class_id = $_POST['class_id'];
$c_id = $_POST['c_id'];
$y_id = $_POST['y_id'];
$t_id = $_POST['t_id'];
$day_id = $_POST['day_id'];
$time_id = $_POST['time_id'];

if ($class_id && $c_id && $y_id && $t_id && $day_id && $time_id) {
	//ตัวกรอง เช็คว่ารายวิชาไหนซ้ำ ตามหมู่เรียน
	$check = "SELECT c_id,class_id FROM classroom WHERE class_id = '$class_id' and c_id = '$c_id'";
	$result1 = mysqli_query($conn, $check) or die(mysqli_error());
	$num = mysqli_num_rows($result1);
	if ($num == 0) {
		//เช็คว่า ปีการศึกษา วัน และเวลา ที่รับมา มีอาจารย์ท่านใดสอนอยู่รึป่าว
			$check3 = "SELECT t_id FROM classroom WHERE day_id = '$day_id' and time_id = '$time_id' ";
			$result3 = mysqli_query($conn, $check3) or die(mysqli_error());
			$num3 = mysqli_num_rows($result3);
			if ($num3 == 0) {
				$sql = "INSERT INTO classroom (class_id, c_id, y_id, t_id, day_id, time_id, classroom_st) VALUES ('$class_id','$c_id', '$y_id' , '$t_id', '$day_id', '$time_id','1')";
				mysqli_query($conn, $sql)
					or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
				mysqli_close($conn);
				echo "<script language=\"javascript\">";
				echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
				echo "window.location = 'showclassroom.php';";
				echo "</script>";
			} else {
				//แจ้งว่า ลงไม่ได้เพราะมีอาจารย์สอนซ้ำวันและเวลากับหมู่เรียนอื่น
				echo "<script>";
				echo "alert(' 3.อาจารย์ท่านนี้มีสอนในวันและเวลาดังกล่าวอยู่แล้ว... กรุณาเลือกเวลา หรือเลือกวันที่สอนใหม่ !');";
				echo "window.history.back();";
				echo "</script>";
			}
	} else {
		//แจ้งว่า ลงไม่ได้เพราะรายวิชาซ้ำกับหมู่เรียน
		echo "<script>";
		echo "alert(' 1.หมู่เรียนที่ท่านเลือกมีรายวิชานี้อยู่แล้ว... กรุณาเลือกรายวิชาอื่น!');";
		echo "window.history.back();";
		echo "</script>";
	}
}


?>