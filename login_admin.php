<?php
ob_start();

include "connect.php";

$login = $_POST['username'];
$password = $_POST['password'];

if (!empty($login) && !empty($password)) {

	$sql = "SELECT * FROm teacher WHERE t_username = '$login' AND t_password = '$password'";
	$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
		session_start();

        $row = mysqli_fetch_array($result);

		$_SESSION["valid_uname"] = $row['t_username'];
		$_SESSION["valid_pwd"] = $row['t_password'];
        $_SESSION['userlevel'] = $row['t_status'];

        if ($_SESSION['userlevel'] == '1') {
			echo "<script> alert('ยินดีต้อนรับ อาจารย์');window.location = 'showclassroom_teacher.php';</script>";
            // header("Location: showclassroom.php");
        }

        if ($_SESSION['userlevel'] == '2') {
			echo "<script> alert('ยินดีต้อนรับ เจ้าหน้าที่ผู้ดูแลระบบ');window.location = 'frm_home.php';</script>";
            // header("Location: frm_home.php");
        }

		if ($_SESSION['userlevel'] == '3') {
			echo "<script> alert('ยินดีต้อนรับ เจ้าหน้าที่ฝ่ายประมวลผลการเรียน');window.location = 'showclassroom_teacher.php';</script>";
            // header("Location: showclassroom_grade.php");
        }
		mysqli_close($conn);
	} else {
		echo "<script> alert('ไม่เจอข้อมูลผู้ใช้ กรุณาตรวจสอบความถูกต้อง ของ Username และ Password');window.history.go(-1);</script>";
		exit();
	}
} else {
	echo "<script> alert('ขออภัย...!..กรุณากรอกข้อมูลให้ครบ');window.history.go(-1);</script>";
	exit();
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