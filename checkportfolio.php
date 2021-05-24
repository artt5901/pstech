<?php
	include "connect.php";
	
	$s_username = $_POST['s_username'];

		$sql = "SELECT * FROM student WHERE s_username = '$s_username'";
		$result = mysqli_query($conn,$sql)
	 	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 	$rs = mysqli_fetch_array($result);
		echo"<script language=\"javascript\">";
	 	echo"alert('$rs[s_name]');";
	 	echo"window.history.back();";
	 	echo"</script>";
	
	
?>
