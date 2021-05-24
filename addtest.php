<?php
	include "connect.php";
	
	$s_username = $_POST["s_username"];
	$s_password = $_POST["s_password"];
	$s_name = $_POST["s_name"];
	$s_idcard = $_POST["s_idcard"];
	$s_address = $_POST["s_address"];
	$s_tel = $_POST["s_tel"];
	$s_email = $_POST["s_email"];
	$s_year = $_POST["s_year"];
	$s_hbd = $_POST["s_hbd"];
	$s_level = $_POST["s_level"];
	$s_brethren = $_POST["s_brethren"];
	$st_id = $_POST["st_id"];
	$b_id = $_POST["b_id"];
	$s_child = $_POST["s_child"];
	$f_id = $_POST["f_id"];
	$m_id = $_POST["m_id"];
	$pa_id = $_POST["pa_id"];
	
	/*$f_id = $_POST["f_id"];
	$f_name = $_POST["f_name"];
	$f_tel = $_POST["f_tel"];
	
	$m_id = $_POST["m_id"];
	$m_name = $_POST["m_name"];
	$m_tel = $_POST["m_tel"];
	
	$pa_id = $_POST["pa_id"];
	$pa_name = $_POST["pa_name"];
	$pa_address = $_POST["pa_address"];
	$pa_relation = $_POST["pa_relation"];
	$pa_metier = $_POST["pa_metier"];
	$pa_tel = $_POST["pa_tel"]; */
	
	$images = $_FILES['s_image']['tmp_name'];
	$images_name = $_FILES['s_image']['name'];
	
	if(!empty($s_name)&&!empty($s_address)&&!empty($s_tel)&&!empty($s_username)&&!empty($s_password)&&!empty($s_year)&&!empty($s_hbd)&&!empty($s_idcard)
	/*&&!empty($f_id)&&!empty($f_name)&&!empty($f_tel)&&!empty($m_id)&&!empty($m_name)&&!empty($m_tel)&&!empty($pa_id)&&!empty($pa_name)&&!empty($pa_tel)&&!empty($pa_relation)*/){
		$sql = "SELECT * FROM student WHERE s_username = '$s_username' ";
		$result = mysqli_query($conn,$sql)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
		$total = mysqli_num_rows($result);
		
		$sql2 = "SELECT * FROM student WHERE s_name = '$s_name' ";
		$result2 = mysqli_query($conn,$sql2)
			or die("4. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
		$total = mysqli_num_rows($result2);
		
		$sql3 = "SELECT * FROM student WHERE s_name = '$s_idcard' ";
		$result3 = mysqli_query($conn,$sql3)
			or die("5. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
		$total = mysqli_num_rows($result3);
		
		if($total == 0){
			/*if($images != "")
				copy($images,"./image/".$images_name);*/
					$sql = "INSERT INTO student (s_username, s_password, s_name, s_idcard, s_address, s_tel, s_email, s_year, s_hbd, b_id, st_id, s_level, s_brethren, s_child, f_id, m_id, pa_id) VALUES ('$s_username', '$s_password', '$s_name', '$s_idcard', '$s_address', '$s_tel', '$s_email', '$s_year', '$s_hbd', '$b_id', '$st_id', '$s_level', '$s_brethren', '$s_child', '$f_id', '$m_id', '$pa_id' )";
					
					
		mysqli_query($conn,$sql)
	 		or die("12. ไม่สามารถประมวลผลคำสั่งได้");
		mysqli_close($conn);
	 	
		echo"<script language=\"javascript\">";
	 	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 	echo"window.location = 'showstudent.php';";
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
