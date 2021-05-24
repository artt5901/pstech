<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
include "connect.php";
	include "include/head_menu_admin.php";
?>
<img src="image/logo.png" class="rounded mx-auto d-block img-fluid " alt="Responsive image" >
<title>หน้าหลัก - วิทยาลัยเทคโนโลยีป่าสักธารา</title>
<?php
} else {
    echo "<script> alert('Please Login');window.location = 'index.php';</script>";
    exit();
}
?>