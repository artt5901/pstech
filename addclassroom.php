<?php
include "connect.php";

$class_id = $_POST['class_id'];
$c_id = $_POST['c_id'];
$y_id = $_POST['y_id'];
$t_id = $_POST['t_id'];
$day_id = $_POST['day_id'];
$time_id = $_POST['time_id'];

if ($class_id && $c_id && $y_id && $t_id && $day_id && $time_id) {
		//เช็คว่า ปีการศึกษา วัน และเวลา ที่รับมา มีอาจารย์ท่านใดสอนอยู่รึป่าว
				$sql = "INSERT INTO classroom (class_id, c_id, y_id, t_id, day_id, time_id, classroom_st) VALUES ('$class_id','$c_id', '$y_id' , '$t_id', '$day_id', '$time_id','1')";
				mysqli_query($conn, $sql)
					or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
				mysqli_close($conn);
				echo "<script language=\"javascript\">";
				echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
				echo "window.location = 'showclassroom.php';";
				echo "</script>";

	} 



?>