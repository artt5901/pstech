<?php
	include "connect.php";
	
	$po_name = $_POST['po_name'];
	if($po_name != ""){
		$sql = "SELECT * FROM position WHERE po_name = '$po_name'";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 	$total = mysqli_num_rows($result);
		if ($total == 0){
			$sql = "INSERT INTO position (po_name) VALUES ('$po_name')";
			mysqli_query($conn,$sql)
	 		or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 		mysqli_close();
	 		echo"<script language=\"javascript\">";
	 		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 		echo"window.location = 'showposition.php';";
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
	 	echo"alert('กรุณาป้อนชื่อตำแหน่่ง');";
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