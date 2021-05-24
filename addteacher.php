<?php
	include "connect.php";
	

	$t_username = $_POST["t_username"];
	$t_password = $_POST["t_password"];
	$t_name = $_POST["t_name"];
	$t_address = $_POST["t_address"];
	$t_tel = $_POST["t_tel"];
	$t_email = $_POST["t_email"];
	$t_year = $_POST["t_year"];
	$t_end = $_POST["t_end"];
	$t_educa = $_POST["t_educa"];
	$t_status = $_POST["t_status"];
	
	$po_id = $_POST["po_id"];
	$b_id = $_POST["b_id"];

	$images = $_FILES['t_image']['tmp_name'];
	$images_name = $_FILES['t_image']['name'];
	
	if(!empty($t_name)&&!empty($t_address)&&!empty($t_tel)&&!empty($t_username)&&!empty($t_password)){
		$sql = "SELECT * FROM teacher WHERE t_username = '$t_username' ";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
		$total = mysqli_num_rows($result);
		
		$sql2 = "SELECT * FROM teacher WHERE t_name = '$t_name' ";
		$result2 = mysqli_query($conn,$sql2)
			or die("4. ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
		$total = mysqli_num_rows($result2);

		if($total == 0){
			if($images != ""){
				if (!is_dir("./image")) {
					mkdir("./image");
				}
				copy($images, "./image/" . $images_name);
					$sql = "INSERT INTO teacher (t_username, t_password, t_name, t_address, t_tel, t_email, t_year, t_end, t_educa, po_id, b_id, t_status, t_pic) VALUES ('$t_username', '$t_password', '$t_name', '$t_address', '$t_tel', '$t_email', '$t_year', '$t_end', '$t_educa', '$po_id', '$b_id', '$t_status', '$images_name')";
	}
			else {
					$sql = "INSERT INTO teacher (t_username, t_password, t_name, t_address, t_tel, t_email, t_year, t_end, t_educa, po_id, b_id, t_status) VALUES ('$t_username', '$t_password', '$t_name', '$t_address', '$t_tel', '$t_email', '$t_year', '$t_end', '$t_educa', '$po_id', '$b_id', '$t_status')";
	}
		mysqli_query($conn,$sql)
	 		or die("5. ไม่สามารถประมวลผลคำสั่งได้");
		mysqli_close($conn);
	 	
		echo"<script language=\"javascript\">";
	 	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 	echo"window.location = 'showteacher.php';";
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
