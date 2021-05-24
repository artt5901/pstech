<?php
	include "connect.php";
	
	$b_name = $_POST['b_name'];
	$d_id = $_POST['d_id'];
	if($b_name != ""){
		$sql = "SELECT * FROM branch WHERE b_name = '$b_name'";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 	$total = mysqli_num_rows($result);
		if ($total == 0){
			$sql = "INSERT INTO branch (b_name,d_id) VALUES ('$b_name','$d_id')";
			mysqli_query($conn,$sql)
	 		or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 		mysqli_close();
	 		echo"<script language=\"javascript\">";
	 		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 		echo"window.location = 'showbranch.php';";
	 		echo"</script>";
		}
		else {
			echo"<script language=\"javascript\">";
	 	echo"alert('ข้อมูลซ้ำ กรุณาป้อนข้อมูลใหม่');";
	 	echo"window.history.back();";
	 	echo"</script>";
		}			
	}
	else {
		echo"<script language=\"javascript\">";
	 	echo"alert('กรุณาป้อนข้อมูลสาขา');";
	 	echo"window.history.back();";
	 	echo"</script>";
	}
	
?>
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