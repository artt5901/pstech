<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2'){
	include "connect.php";
	include "include/head_menu_admin.php";
	
	$sql = "SELECT * FROM position";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
?>
<title>Position Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showposition.php">แสดงข้อมูลตำแหน่ง</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addposition.php">เพิ่มข้อมูลตำแหน่ง</a>
      </li>
    </ul>
  </div>
  <div class="container" align="center">
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>แสดงข้อมูลตำแหน่ง</h1>    
  </div>
<div class="card text"  style="max-width: 1100px;" >
<div class="col"><?php echo "<a href=\"print_position.php?\""; ?><button class="col-2 btn btn-success btn-sm float-center" href="print_teacher.php" >ออกรายงานข้อมูลตำแหน่ง</button><?php echo "</a>"; ?></div>
  <div class="row no-gutters">
    <div class="col-md-12">
<table class="table table-hover">
  <thead>
    <tr class="bg-secondary text-white">
      <th scope="col">#</th>
      <th scope="col">ชื่อตำแหน่ง</th>
      <th scope="col">-</th>
      <th scope="col">-</th>
    </tr>
  </thead>
  <tbody>
  <?php
	while($rs=mysqli_fetch_array($result)){
?>
    <tr>
      <td><?php echo"$rs[po_id]";?></td>
      <td><?php echo"$rs[po_name]";?></td>
      <td><?php echo "<a href=\"edit_position.php?po_id=$rs[po_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
      <td><?php echo "<a href=\"del_position.php?po_id=$rs[po_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
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