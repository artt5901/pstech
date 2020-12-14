<?php
	include "connect.php";
	$d_id = $_POST['d_id'];
	
	$sql = "DELETE FROM department WHERE d_id = '$d_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showdepartment.php';";
	 echo"</script>";

?>
