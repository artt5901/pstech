<?php
	include "connect.php";
	$t_id = $_POST["t_id"];
	$t_password = $_POST["t_password"];
	$t_name = $_POST["t_name"];
	$t_address = $_POST["t_address"];
	$t_tel = $_POST["t_tel"];
	$t_email = $_POST["t_email"];
	$t_end = $_POST["t_end"];
	$t_educa = $_POST["t_educa"];
	$t_pic = $_POST["t_pic"];
	
	$image = $_FILES['t_image']['tmp_name'];
	$image_name = $_FILES['t_image']['name'];
	
		if(!empty($image)){
		if (!empty($t_pic)){
			unlink("./image/$t_pic");
		}
		copy($image,"./image/".$image_name);
		 $sql = "UPDATE teacher SET 
		 t_password='$t_password',
		 t_name='$t_name',
		 t_address='$t_address',
		 t_tel='$t_tel',
		 t_email='$t_email',
		 t_end='$t_end',
		 t_educa='$t_educa',
		 t_pic='$image_name' 
		 WHERE t_id = '$t_id'";
	}
	else {
		$sql = "UPDATE teacher SET 
		t_password='$t_password',
		t_name='$t_name',
		t_address='$t_address',
		t_tel='$t_tel',
		t_email='$t_email',
		t_end='$t_end',
		t_educa='$t_educa'
		WHERE t_id = '$t_id'";
	}
		mysqli_query($conn,$sql)
	 		or die("5. ไม่สามารถประมวลผลคำสั่งได้");
		mysqli_close($conn);
	 	
		echo"<script language=\"javascript\">";
	 	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 	echo"window.location = 'edit_me_teacher.php';";
		 echo"</script>";
				
	
?>
