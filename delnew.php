<?php
	include "connect.php";
	$n_id = $_POST['n_id'];
	
	$sql = "DELETE FROM news WHERE n_id = '$n_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'shownews.php';";
	 echo"</script>";

?>