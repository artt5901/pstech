<?php
	include "connect.php";
	$s_username = $_REQUEST['s_username'];
	
	$sql = "select * FROM student WHERE s_username = '$s_username'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0){
		echo "true,<span style='color:green'>สามารถใช้งานได้</span>";	
	}
	else{
		echo "false,<span style='color:red'>มีผู้ใช้ Username นี้แล้ว";
	}
?>