<?php
	include "connext.php";
$sql="Select * From techaer Where t_username='$t_username' ";
$result=mysqli_query($sql);
$row=mysqli_fetch_array($result);
if($rom['t_username'])
 echo "<script language='javascript'>alert('มี username นี้ในระบบแล้วครับ');history.back();</script> ";

?>