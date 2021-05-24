<?php
ob_start();
include "connect.php";

$login = $_POST['username'];
$password = $_POST['password'];

if (!empty($login) && !empty($password)) {

	$sql = "SELECT * FROM student WHERE s_username = '$login' AND s_password = '$password'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		session_start();
		$_SESSION["valid_uname"] = $login;
		$_SESSION["valid_pwd"] = $password;
		mysqli_close($conn);
		echo "<script> alert('ยินดีต้อนรับนักศึกษา');window.location = 'show_grade_blank.php';</script>";
		exit();
	} else {
		echo "<script> alert('ไม่เจอข้อมูลผู้ใช้ กรุณาตรวจสอบความถูกต้อง ของ Username และ Password');window.history.go(-1);</script>";
		exit();
	}
} else {
	echo "<script> alert('ขออภัย!..กรุณากรอกข้อมูลให้ครบ');window.history.go(-1);</script>";
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