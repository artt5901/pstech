<?php
include "connect.php";

$s_username = $_POST["s_username"];
$s_password = $_POST["s_password"];
$s_name = $_POST["s_name"];
$s_idcard = $_POST["s_idcard"];
$s_address = $_POST["s_address"];
$s_tel = $_POST["s_tel"];
$s_email = $_POST["s_email"];
$s_year = $_POST["s_year"];
$s_hbd = $_POST["s_hbd"];
$s_brethren = $_POST["s_brethren"];
$st_id = $_POST["st_id"];
$class_id = $_POST["class_id"];
$s_child = $_POST["s_child"];
/*$f_id = $_POST["f_id"];
	$m_id = $_POST["m_id"];
	$pa_id = $_POST["pa_id"];*/
$f_id = $_POST["f_id"];
$f_name = $_POST["f_name"];
$f_tel = $_POST["f_tel"];

$m_id = $_POST["m_id"];
$m_name = $_POST["m_name"];
$m_tel = $_POST["m_tel"];

$pa_id = $_POST["pa_id"];
$pa_name = $_POST["pa_name"];
$pa_address = $_POST["pa_address"];
$pa_relation = $_POST["pa_relation"];
$pa_metier = $_POST["pa_metier"];
$pa_tel = $_POST["pa_tel"];

$images = $_FILES['s_image']['tmp_name'];
$images_name = $_FILES['s_image']['name'];

//ตรวจสอบช่องว่าง กรอกไม่คร[]
if (
	!empty($s_name)
	&& !empty($s_address)
	&& !empty($s_tel)
	&& !empty($s_username)
	&& !empty($s_password)
	&& !empty($s_year)
	&& !empty($s_hbd)
	&& !empty($s_idcard)
	&& !empty($st_id)
	&& !empty($class_id)
) {
	//ตรวจสอบข้อมูลซ้ำ
	$check = "SELECT s_username FROM student WHERE s_username = '$s_username'";
	$result1 = mysqli_query($conn, $check) or die(mysqli_error($conn));
	$num = mysqli_num_rows($result1);

	$check2 = "SELECT s_idcard FROM student WHERE s_idcard = '$s_idcard'";
	$result2 = mysqli_query($conn, $check2) or die(mysqli_error($conn));
	$num2 = mysqli_num_rows($result2);

	$check3 = "SELECT s_name FROM student WHERE s_name = '$s_name'";
	$result3 = mysqli_query($conn, $check3) or die(mysqli_error($conn));
	$num3 = mysqli_num_rows($result3);

	if ($num > 0 || $num2 > 0 && $num3 > 0) {
		$msg = ""; //สร้างข้อความเก็บไว้ในตัวแปร
		if ($num > 0) $msg .= "Username";
		if ($num2 > 0) $msg .= " เลขบัตรประจำตัวประชาชน";
		if ($num3 > 0) $msg .= " ชื่อ";
		echo "<script>";
		echo "alert(' {$msg}ซ้ำ กรุณากรอกใหม่อีกครั้ง !');"; //นำตัวแปรมาต่อข้อความที่มีอยู่ 
		echo "window.history.back();";
		echo "</script>";
	} else {
		//เพิ่มรูป เข้าโฟลเดอร์ และ ฐานข้อมูล
		if ($images != "") {
			if (!is_dir("./image")) {
				mkdir("./image");
			}
			copy($images, "./image/" . $images_name);
			//table1
			$sql = "INSERT INTO student (s_username, s_password, s_name, s_idcard, s_address, s_tel, s_email, s_year, s_hbd, class_id, st_id, s_brethren, s_child, f_id, m_id, pa_id, s_pic) 
							VALUES ('$s_username', '$s_password', '$s_name', '$s_idcard', '$s_address', '$s_tel', '$s_email', '$s_year', '$s_hbd', '$class_id', '$st_id', '$s_brethren', '$s_child', '$f_id', '$m_id', '$pa_id', '$images_name' )";
			$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
		} else { //กรณีไม่อัพรูปภาพ
			$sql = "INSERT INTO student (s_username, s_password, s_name, s_idcard, s_address, s_tel, s_email, s_year, s_hbd, class_id, st_id, s_brethren, s_child, f_id, m_id, pa_id) 
										VALUES ('$s_username', '$s_password', '$s_name', '$s_idcard', '$s_address', '$s_tel', '$s_email', '$s_year', '$s_hbd', '$class_id', '$st_id', '$s_brethren', '$s_child', '$f_id', '$m_id', '$pa_id')";
			$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
		}


		//เช็คว่ามีข้อมูลพ่อ อยู่ในตารางพ่อหรือไม่
		if ($f_id) {
			$check4 = "SELECT f_id FROM father WHERE f_id = '$f_id'";
			$result4 = mysqli_query($conn, $check4) or die(mysqli_error($conn));
			$num4 = mysqli_num_rows($result4);
			//ถ้าไม่มีให้เพิ่มข้อมูลพ่อลงไป ถ้าไม่มี ให้หลุดการทำงานได้เลย
			if ($num4 == 0) {
				$sql2 = "INSERT INTO father (f_id ,f_name ,f_tel) 
								VALUES ('$f_id','$f_name','$f_tel')";
				$result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error($conn));
			}
		}
		//เช็คว่ามีข้อมูลแม่ อยู่ในตารางแม่หรือไม่
		if ($m_id) {
			$check5 = "SELECT m_id FROM mathar WHERE m_id = '$m_id'";
			$result5 = mysqli_query($conn, $check5) or die(mysqli_error($conn));
			$num5 = mysqli_num_rows($result5);
			//ถ้าไม่มีให้เพิ่มข้อมูลแม่ลงไป ถ้าไม่มี ให้หลุดการทำงานได้เลย
			if ($num5 == 0) {
				$sql3 = "INSERT INTO mathar (m_id ,m_name ,m_tel) 
						VALUES ('$m_id','$m_name','$m_tel')";
				$result3 = mysqli_query($conn, $sql3) or die("Error in query: $sql3 " . mysqli_error($conn));
			}
		}

		//เช็คว่ามีข้อมูลผู้ปกครอง อยู่ในตารางผู้ปกครองหรือไม่
		if ($pa_id) {
			$check6 = "SELECT pa_id FROM parent WHERE pa_id = '$pa_id'";
			$result6 = mysqli_query($conn, $check6) or die(mysqli_error($conn));
			$num6 = mysqli_num_rows($result6);
			//ถ้าไม่มีให้เพิ่มข้อมูลผู้ปกครองลงไป ถ้าไม่มี ให้หลุดการทำงานได้เลย
			if ($num6 == 0) {
				$sql4 = "INSERT INTO parent (pa_id, pa_name, pa_address, pa_relation, pa_metier, pa_tel) 
				VALUES ('$pa_id', '$pa_name', '$pa_address', '$pa_relation', '$pa_metier', '$pa_tel')";
				$result4 = mysqli_query($conn, $sql4) or die("Error in query: $sql4 " . mysqli_error($conn));
			}
		}

		//ปิดการเชื่อมต่อ database
		mysqli_close($conn);
		//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('Save Succesfuly');";
			echo "window.location = 'frm_addstudent.php'; ";
			echo "</script>";
		} else {
			echo "<script type='text/javascript'>";
			echo "alert('Error!!');";
			echo "</script>";
		}
	}
} else {
	echo "<script language=\"javascript\">";
	echo "alert('กรุณาป้อนข้อมูลให้ครบ');";
	echo "window.history.back();";
	echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
</body>

</html>