<?php
	include "connect.php";
	$n_id = $_POST["n_id"];
	$n_name = $_POST["n_name"];
	$n_ot = $_POST["n_ot"];
	$n_date = $_POST["n_date"];
	$n_link = $_POST["n_link"];
	$t_id = $_POST["t_id"];
	$n_pic = $_POST["n_pic"];
	$n_status = $_POST["n_status"];
	
	
	$images = $_FILES['n_image']['tmp_name'];
	$images_name = $_FILES['n_image']['name'];
	
		if(!empty($image)){
		if (!empty($n_pic)){
			unlink("./image/$n_pic");
		}
		copy($image,"./image/".$image_name);
		 $sql = "UPDATE news SET n_name='$n_name',
		 n_ot='$n_ot',
		 n_date='$n_date',
		 n_link='$n_link',
		 t_id='$t_id',
		 n_pic='$image_name',
		 n_status='$n_status' 
		 WHERE n_id = '$n_id'";
	}
	else {
		$sql = "UPDATE news SET n_name='$n_name',
		 n_ot='$n_ot',
		 n_date='$n_date',
		 n_link='$n_link',
		 t_id='$t_id',
		 n_status='$n_status' 
		 WHERE n_id = '$n_id'";
	}
		mysqli_query($conn,$sql)
	 		or die("5. ไม่สามารถประมวลผลคำสั่งได้");
		mysqli_close($conn);
	 	
		echo"<script language=\"javascript\">";
	 	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	 	echo"window.location = 'shownews.php';";
		 echo"</script>";
				
	
?>
