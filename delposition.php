<?php
	include "connect.php";
	$po_id = $_POST['po_id'];
	
	if($po_id != 0){
			$sql = "select po_id from teacher where po_id = '$po_id'";
			$result = mysqli_query($conn,$sql)
			or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();	
			$total = mysqli_num_rows($result);
			
	if ($total == 0){
	$sql = "DELETE FROM position WHERE po_id = '$po_id'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 mysqli_close($conn);
	 echo"<script language=\"javascript\">";
	 echo"window.location = 'showposition.php';";
	 echo"</script>";
	}
			echo"<script language=\"javascript\">";
	 			echo"alert('ตาราง Teacher มีการใช้งานข้อมูลจากตาราง Position ไม่สามารถลบข้อมูลได้');";
	 			echo"window.history.back();";
	 			echo"</script>";
		}
?>