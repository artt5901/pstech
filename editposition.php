<?php
	include "connect.php";
	
	$po_id = $_POST['po_id'];
	$po_name = $_POST['po_name'];
	
	$sql = "UPDATE position SET po_name = '$po_name' WHERE po_id = '$po_id'";
	mysqli_query($conn,$sql)
	 or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showposition.php';";
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