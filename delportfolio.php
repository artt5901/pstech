<?php
	include "connect.php";
	$p_id = $_POST['p_id'];
	
	$sql = "DELETE FROM portfolio WHERE p_id = '$p_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showportfolio.php';";
	 echo"</script>";

?>