<?php
	include "connect.php";
	
	$y_id = $_POST['y_id'];
	$y_number = $_POST['y_number'];
	
	$sql = "UPDATE year SET y_number = '$y_number' WHERE y_id = '$y_id'";
	mysqli_query($conn,$sql)
	 or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showyear.php';";
	 echo"</script>";

?>
