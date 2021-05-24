<?php
 include "connect.php";
 $classroom_id = $_POST['classroom_id'];
 $c_id = $_POST['c_id'];
 $y_id = $_POST['y_id'];
 $class_id = $_POST['class_id'];
 $t_id = $_POST['t_id'];


         // text แบบ array
		
		 $count = $_POST['count'];
		 for($x = 0; $x < $count; $x++) {
			   $s_username = $_POST['s_username'][$x];
			    $score = $_POST['score'][$x];
               echo "value of s_username[$x]='$s_username'<br />";
        	   echo "value of score[$x]='$score'<br />";
			   $sql = "INSERT INTO grade (classroom_id, s_username, c_id, class_id, y_id, t_id, score) 
			   			VALUES ('$classroom_id' ,'$s_username' ,'$c_id' ,'$class_id' ,'$y_id', '$t_id', '$score')";
			  			mysqli_query($conn,$sql)
	 					or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();	 			

				}
			if($score != ""){
				$sql2 = "UPDATE classroom SET classroom_st = '2' WHERE classroom_id = '$classroom_id'";
					mysqli_query($conn,$sql2)
	 				or die("4. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
			}
			else {
				$sql2 = "UPDATE classroom SET classroom_st = '3' WHERE classroom_id = '$classroom_id'";
					mysqli_query($conn,$sql2)
	 				or die("4. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
				}
				echo"<script language=\"javascript\">";
				echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
				echo"window.location = 'showinputgrade.php';";
				echo"</script>";
				mysqli_close($conn);
		 
		 
?>
