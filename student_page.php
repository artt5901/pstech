<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
include "connect.php";
$valid_uname = $_SESSION["valid_uname"];
$sql1 = "SELECT * FROM student WHERE s_username = '$valid_uname'";
$result = mysqli_query($conn, $sql1)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysqli_error($conn);
$rs = mysqli_fetch_array($result);
mysqli_close($conn);	

?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>ข้อมูลส่วนตัว</title>
    </head>

    <body>

        <h1>You are student</h1>
        <h3>Hi, <?php echo "$rs[s_username]"; ?></h3>
        <h3> <?php echo "$rs[s_name]"; ?></h3>
        <h3> <?php echo "$rs[s_idcard]"; ?></h3>
        <h3> <?php echo "$rs[s_tel]"; ?></h3>
        <h3> <?php echo "$rs[s_email]"; ?></h3>

        <p><a href="logout.php">Logout</a></p>
    </body>

    </html>
<?php
} else {
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
    exit();
}
?>