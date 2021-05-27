<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2'){
	include "connect.php";
	include "include/head_menu_admin.php";
	
	$sql = "SELECT *
			FROM parent";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
?>

<title>parent Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
       <a class="nav-link active" href="showparent.php">แสดงข้อมูลผู้ปกครอง</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="showfather.php">แสดงข้อมูลบิดา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="showmathar.php">แสดงข้อมูลมารดา</a>
      </li>
    </ul>
  </div>
  <div class="container" align="center">
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>แสดงข้อมูลผู้ปกครอง</h1>    
  </div>
<div class="card text"  style="max-width: 1100px;" >
  <div class="row no-gutters">
    <div class="col-md-12">
<table class="table table-hover"  id="mytable">
  <thead>
    <tr class="bg-secondary text-white" >
      <th scope="col">เลขบัตรประจำตัวประชาชน</th>
      <th scope="col">ชื่อ-สกุล</th>
      <th scope="col">เบอร์ติดต่อ</th>
      <th scope="col">ความสัมพันธ์</th>
      <th scope="col">อาชีพ</th>
    </tr>
  </thead>
  <tbody>
  <?php
	while($rs=mysqli_fetch_array($result)){
?>
    <tr>
      <td><?php echo"$rs[pa_id]";?></td>
      <td><?php echo "<a href=\"show_parent.php?pa_id=$rs[pa_id]\">"; ?><?php echo"$rs[pa_name]";?><?php echo "</a>"; ?></td>
      <td><?php echo"$rs[pa_tel]";?></td>
      <td><?php echo"$rs[pa_relation]";?></td>
      <td><?php echo"$rs[pa_metier]";?></td>
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
<div class="col"><?php echo "<a href=\"print_parent.php?\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >พิมพ์รายงานข้อมูลผู้ปกครอง</button><?php echo "</a>"; ?></div>
  <div class="card-footer text-muted">
    Phasaktara Technological Callege
  </div>
  <?php
} else {
    echo "<script> alert('Please Login');window.location = 'index.php';</script>";
    exit();
}
?>