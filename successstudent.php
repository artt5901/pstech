<?php
	include "connect.php";
	
	$s_year = $_POST['s_year'];
			
			$sql = "UPDATE student SET st_id = '2' WHERE s_year = '$s_year'";
				mysqli_query($conn,$sql)
	 				or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
	 			mysqli_close($conn);
				echo"<script language=\"javascript\">";
				echo"alert('นักศึกษาทั้งหมด ได้สำเร็จการศึกษาแล้ว');";
	 			echo"window.location = 'showstudent_one.php';";
	 			echo"</script>";

?>
