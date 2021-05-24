<?php
	include "connect.php";
	
	$class_id = $_POST['class_id'];
	$c_id = $_POST['c_id'];
	$classroom_year = $_POST['classroom_year'];
	$classroom_term = $_POST['classroom_term'];
	$t_id = $_POST['t_id'];
	$classroom_day = $_POST['classroom_day'];
	$classroom_time = $_POST['classroom_time'];
	
	if(!empty($class_id)
	&&!empty($c_id)
	&&!empty($classroom_year)
	&&!empty($classroom_term)
	&&!empty($t_id)
	&&!empty($classroom_day)
	&&!empty($classroom_time)
	)
	{
		$check = "SELECT c_id FROM classroom WHERE class_id = '$class_id'";
		$result1 = mysqli_query($conn, $check) or die(mysqli_error());
		$num=mysqli_num_rows($result1);

		$check2 = "SELECT classroom_day FROM classroom WHERE class_id = '$class_id'";
		$result2 = mysqli_query($conn, $check2) or die(mysqli_error());
		$num2=mysqli_num_rows($result2);
		if ($check2 != 0){
			$check3 = "SELECT classroom_time FROM classroom WHERE classroom_day = '$check2'";
			$result2 = mysqli_query($conn, $check3) or die(mysqli_error());
			$num2=mysqli_num_rows($result2);

			if($num > 0 || $num2 > 0 && $num3 > 0)
			{
				$msg = ""; //สร้างข้อความเก็บไว้ในตัวแปร
				if($num > 0) $msg .= "Username";
				if($num2 > 0) $msg .= " เลขบัตรประจำตัวประชาชน";
				if($num3 > 0) $msg .= " ชื่อ";
				echo "<script>";
				echo "alert(' {$msg}ซ้ำ กรุณากรอกใหม่อีกครั้ง !');"; //นำตัวแปรมาต่อข้อความที่มีอยู่ 
				echo "window.history.back();";
				echo "</script>";
				}else{
							 $sql = "INSERT INTO classroom (class_id, c_id, classroom_year, classroom_term, t_id, classroom_day, classroom_time) 
			VALUES ('$class_id','$c_id','$classroom_year', '$classroom_term' , '$t_id', '$classroom_day', '$classroom_time')";
							$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
						
							//ปิดการเชื่อมต่อ database
							mysqli_close($conn);
							//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
						
								if($result){
								echo "<script type='text/javascript'>";
								echo "alert('Save Succesfuly');";
								echo "window.location = 'frm_addstudent.php'; ";
								echo "</script>";
								}
								else{
								echo "<script type='text/javascript'>";
								echo "alert('Error!!');";
								echo "</script>";
						
					
					}

					
			}
	}else{
		echo"<script language=\"javascript\">";
		echo"alert('กรุณาป้อนข้อมูลให้ครบ');";
		echo"window.history.back();";
		echo"</script>";
	}
?>
