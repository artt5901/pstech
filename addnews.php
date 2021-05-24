<?php
	include "connect.php";
	

	$n_name = $_POST["n_name"];
	$n_ot = $_POST["n_ot"];
	$n_date = $_POST["n_date"];
	$n_ex = $_POST["n_ex"];
	$n_link = $_POST["n_link"];
	$t_id = $_POST["t_id"];
	$n_status = $_POST["n_status"];
	
	
	$images = $_FILES['n_image']['tmp_name'];
	$images_name = $_FILES['n_image']['name'];
	
	if(!empty($n_name)&&!empty($n_ot)&&!empty($n_date)&&!empty($n_ex)&&!empty($n_link)){
		$sql = "SELECT * FROM news WHERE n_name = '$n_name' ";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
		$total = mysqli_num_rows($result);
		
		if($total == 0){
			if($images != ""){
				copy($images,"./image/".$images_name);
					$sql = "INSERT INTO news (n_name, n_ot, n_date, n_ex, n_link, t_id, n_status, n_pic) VALUES ('$n_name', '$n_ot', '$n_date', '$n_ex', '$n_link', '$t_id', '$n_status', '$images_name')";
	}
			else {
					$sql = "INSERT INTO news (n_name, n_ot, n_date, n_ex, n_link, t_id, n_status) VALUES ('$n_name', '$n_ot', '$n_date', '$n_ex', '$n_link', '$t_id' ,'$n_status')";
	}
		mysqli_query($conn,$sql)
	 		or die("5. ไม่สามารถประมวลผลคำสั่งได้");
		mysqli_close($conn);
	 	
		echo"<script language=\"javascript\">";
	 	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 	echo"window.location = 'shownews.php';";
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
