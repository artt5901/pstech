<?php
	include "connect.php";
	
	$y_number = $_POST['y_number'];
	if($y_number != ""){
		$sql = "SELECT * FROM year WHERE y_number = '$y_number'";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 	$total = mysqli_num_rows($result);
		if ($total == 0){
			$sql = "INSERT INTO year (y_number) VALUES ('$y_number')";
			mysqli_query($conn,$sql)
	 		or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 		mysqli_close($conn);
	 		echo"<script language=\"javascript\">";
	 		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 		echo"window.location = 'showyear.php';";
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
	 	echo"alert('กรุณาป้อนข้อมูลให้ครบ');";
	 	echo"window.history.back();";
	 	echo"</script>";
	}
	
?>
