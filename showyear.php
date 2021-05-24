<?php
	session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])){
include "connect.php";

$valid_status = $_SESSION["userlevel"];
$valid_username = $_SESSION["valid_uname"];

  include "include/head_menu_admin.php";
	
	$sql = "SELECT * FROM year ORDER BY y_id DESC";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
?>
<title>Year Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showyear.php">แสดงปีการศึกษา/ภาคเรียน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addyear.php">เพิ่มปีการศึกษา/ภาคเรียน</a>
      </li>
    </ul>
  </div>
  <div class="container" align="center">
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>แสดงข้อมูลปีการศึกษา/ภาคเรียน</h1>    
  </div>
<div class="card text"  style="max-width: 1100px;" >
  <div class="row no-gutters">
    <div class="col-md-12">
<table class="table table-hover">
  <thead>
  <div class="col"><?php echo "<a href=\"print_year.php?\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >พิมพ์รายงานข้อมูลปีการศึกษา/ภาคเรียน</button><?php echo "</a>"; ?></div>
    <tr class="bg-secondary text-white">
      <th scope="col">#</th>
      <th scope="col">ปีการศึกษา/ภาคเรียน</th>
      <th scope="col">-</th>
      <th scope="col">-</th>
    </tr>
  </thead>
  <tbody>
  <?php
	while($rs=mysqli_fetch_array($result)){
?>
    <tr>
      <td><?php echo"$rs[y_id]";?></td>
      <td><?php echo"$rs[y_number]";?></td>
      <td><?php echo "<a href=\"edit_year.php?y_id=$rs[y_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
      <td><?php echo "<a href=\"del_year.php?y_id=$rs[y_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
    </tr>
<?php
	}
	mysqli_close($conn);
?>
  </tbody>
</table>
</div>
 </div>
  </div>
</div>
  <div class="card-footer text-muted">
    Phasaktara Technological Callege
  </div>
        <?php
    } else {
      echo "<script> alert('Please Login');window.location = 'index.php';</script>";
      exit();
    }
      ?>