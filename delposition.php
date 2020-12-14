<?php
	include "connect.php";
	$po_id = $_POST['po_id'];
	
	$sql = "DELETE FROM position WHERE po_id = '$po_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showposition.php';";
	 echo"</script>";

?>