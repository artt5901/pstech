<?php
	include "connect.php";

  if (isset($_POST['function']) && $_POST['function'] == 'branch') {
  	$id = $_POST['id'];
  	$sql = "SELECT * FROM class WHERE b_id='$id' ORDER BY class_id DESC";
  	$query = mysqli_query($conn, $sql);
  	echo '<option value="" selected disabled>-กรุณาเลือกหมู่เรียน-</option>';
  	foreach ($query as $value) {
  		echo '<option value="'.$value['class_id'].'">'.$value['class_name'].'</option>';
  		
  	}
  }

?>