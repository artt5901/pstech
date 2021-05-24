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
$s_brethren = $_POST["s_brethren"];
$s_child = $_POST["s_child"];
$s_pic = $_POST["s_pic"];

$f_id = $_POST["f_id"];
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
$pa_tel = $_POST["pa_tel"];

$images = $_FILES['s_image']['tmp_name'];
$images_name = $_FILES['s_image']['name'];

if ($images != "") {
	if ($s_pic != "") {
		if (!is_dir("./image")) {
			mkdir("./image");
		}
		@unlink("./image/$s_pic");
	}
	copy($images, "./image/" . $images_name);
	$sql = "UPDATE student SET
	s_password ='$s_password',
	s_name ='$s_name',
	s_idcard ='$s_idcard',
	s_address ='$s_address',
	s_tel ='$s_tel',
	s_email ='$s_email',
	s_year ='$s_year',
	s_hbd ='$s_hbd',
	s_brethren ='$s_brethren',
	s_child ='$s_child',
	s_pic = '$images_name'
	WHERE s_username = '$s_username'";

} else {
	$sql = "UPDATE student SET 
	s_password = '$s_password',
	s_name = '$s_name',
	s_idcard = '$s_idcard',
	s_address = '$s_address',
	s_tel = '$s_tel',
	s_email = '$s_email',
	s_year = '$s_year',
	s_hbd = '$s_hbd',
	s_brethren = '$s_brethren',
	s_child = '$s_child'
   WHERE s_username = '$s_username'";
	
}
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$sql2 = "UPDATE father SET 
		 f_name = '$f_name',
		 f_tel = '$f_tel'
		WHERE f_id = '$f_id'";
$result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error($conn));

$sql3 = "UPDATE mathar SET 
		 m_name='$m_name',
		 m_tel='$m_tel'
		WHERE m_id = '$m_id'";
$result3 = mysqli_query($conn, $sql3) or die("Error in query: $sql3 " . mysqli_error($conn));

$sql4 = "UPDATE parent SET 
		 pa_name='$pa_name',
		 pa_address='$pa_address',
		 pa_relation='$pa_relation',
		 pa_metier='$pa_metier',
		 pa_tel='$pa_tel'
		WHERE pa_id = '$pa_id'";
$result4 = mysqli_query($conn, $sql4) or die("Error in query: $sql4 " . mysqli_error($conn));
mysqli_close($conn);
if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('Save Succesfuly');";
	echo "window.location = 'edit_me.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
</body>

</html>