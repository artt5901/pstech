<?php
	include "connect.php";
	
	$c_id = $_POST['c_id'];
	$c_num = $_POST['c_num'];
	$c_name = $_POST['c_name'];
	$c_credit = $_POST['c_credit'];
	$c_ot = $_POST['c_ot'];
	
	$sql = "UPDATE course SET c_num = '$c_num' , c_name = '$c_name' , c_credit = '$c_credit' , c_ot = '$c_ot' WHERE c_id = '$c_id'";
	mysqli_query($conn,$sql)
	 or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showcourse.php';";
	 echo"</script>";

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