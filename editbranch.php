<?php
	include "connect.php";
	
	$b_id = $_POST['b_id'];
	$b_name = $_POST['b_name'];
	$d_id = $_POST['d_id'];
	
	
	if($b_name != ""){
		$sql = "SELECT * FROM branch WHERE b_name = '$b_name'";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 	$total = mysqli_num_rows($result);
		if ($total == 0){
			$sql = "UPDATE branch SET b_name = '$b_name' , d_id = '$d_id' WHERE b_id = '$b_id'";
				mysqli_query($conn,$sql)
	 				or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 			mysqli_close($conn);
				echo"<script language=\"javascript\">";
	 			echo"window.location = 'showbranch.php';";
	 			echo"</script>";
				if($b_name == ""){
				echo"<script language=\"javascript\">";
	 			echo"alert('กรุณาป้อนชื่อสาขา);";
	 			echo"window.history.back();";
	 			echo"</script>";		
		
		else {
			echo"<script language=\"javascript\">";
	 	echo"alert('ข้อมูลซ้ำ กรุณาป้อนข้อมูลใหม่');";
	 	echo"window.history.back();";
	 	echo"</script>";
		
	}
				}
		}
	}
?>
