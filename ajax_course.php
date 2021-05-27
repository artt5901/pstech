<?php
	include "connect.php";

  if (isset($_POST['c_id']) && isset($_POST['class_id'])) {
  	// $sql = "SELECT * FROM teacher 
	// WHERE t_username ='".$_POST['user']."'";

	$sql = "SELECT c_id,class_id FROM classroom WHERE class_id = '".$_POST['class_id']."' and c_id = '".$_POST['c_id']."'";

  	$result = mysqli_query($conn, $sql);
  	if(mysqli_num_rows($result) > 0)
	{
		echo ' <div class="alert alert-danger">
		มีรายวิชานี้อยู่แล้วในหมู่เรียนที่ท่านเลือก... กรุณาเลือกรายวิชาอื่น!
  </div>';

	}
	else
	{
		// echo '<span class="text-success">รายวิชานี้ สามารถลงได้</span>';
		echo ' <div class="alert alert-success">
     รายวิชานี้ สามารถลงได้
  </div>';
	}
  }

  if (isset($_POST['time_id']) && isset($_POST['day_id']) && isset($_POST['class_id'])) {
	// $sql = "SELECT * FROM teacher 
  // WHERE t_username ='".$_POST['user']."'";

  $sql = "SELECT day_id,time_id FROM classroom WHERE day_id = '".$_POST['day_id']."' and time_id = '".$_POST['time_id']."' and class_id = '".$_POST['class_id']."'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
  {
	  echo ' <div class="alert alert-danger">
	  วันและเวลาดังกล่าวมีสอนอยู่แล้ว... กรุณาเลือกเวลา หรือเลือกวันที่สอนใหม่ !
  </div>';
  }
  else
  {
	  echo ' <div class="alert alert-success">
     วันและเวลานี้ยังไม่มีสอน สามารถลงได้
  </div>';
  }
}

if (isset($_POST['time_id']) && isset($_POST['day_id']) && isset($_POST['t_id'])) {
	// $sql = "SELECT * FROM teacher 
  // WHERE t_username ='".$_POST['user']."'";

  $sql = "SELECT t_id FROM classroom WHERE day_id = '".$_POST['day_id']."' and time_id = '".$_POST['time_id']."' and t_id = '".$_POST['t_id']."'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
  {
	  echo ' <div class="alert alert-danger">
	  อาจารย์ท่านนี้ มีสอนในวันและเวลาที่เลือกแล้ว... กรุณาเลือกเลือกอาจารย์ท่านอื่น!
  </div>';
  }
  else
  {
	  echo ' <div class="alert alert-success">
	  <strong>เรียบร้อย!!</strong> สามารถกดบันทึกได้
   </div>';
  }
}

?>