<?php
	include "connect.php";

  if (isset($_POST['user'])) {
  	$sql = "SELECT * FROM teacher 
	WHERE t_username ='".$_POST['user']."'";
  	$result = mysqli_query($conn, $sql);
  	if(mysqli_num_rows($result) > 0)
	{
		echo '<span class="text-danger">Username มีผู้ใช้งานแล้ว</span>';
	}
	else
	{
		echo '<span class="text-success">Username สามารถใช้งานได้</span>';
	}
  }

?>