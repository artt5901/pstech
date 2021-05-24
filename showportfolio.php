<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
	include "connect.php";
	include "include/head_menu_admin.php";
	
	$valid_username = $_SESSION["valid_uname"];
	$sql = "SELECT *
			FROM teacher where t_username = '$valid_username'";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 $rs = mysqli_fetch_array($result)
?>

<title>Class Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showportfolio.php">แสดงผลงานนักศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addportfolio.php">เพิ่มผลงานนักศึกษา</a>
      </li>
    </ul>
  </div>
  <div class="container" align="center">
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>แสดงข้อมูลผลงานนักศึกษา</h1>    
  </div>
<div class="card text"  style="max-width: 1100px;" >
  <div class="row no-gutters">
    <div class="col-md-12">
    <div class="col"><?php echo "<a href=\"print_portfolio.php?\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >ออกรายงานข้อมูลผลงานนักศึกษา</button><?php echo "</a>"; ?></div>
<table class="table table-hover"  id="mytable">
  <thead>
    <tr class="bg-secondary text-white" >
      <th scope="col">ลำดับ</th>
      <th scope="col">ผลงาน</th>
      <th scope="col">นักศึกษา</th>
      <th scope="col">-</th>
      <th scope="col">-</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql2 = "SELECT *
			FROM portfolio 
				INNER JOIN student ON (portfolio.s_username = student.s_username)
					ORDER BY p_id DESC";
	$result2 = mysqli_query($conn,$sql2)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	while($rs2=mysqli_fetch_array($result2)){
?>
    <tr>
      <td><?php echo"$rs2[p_id]";?></td>
      <td><?php echo"$rs2[p_name]";?></td>
      <td><?php echo"$rs2[s_name]";?></td>
      <td><?php echo "<a href=\"edit_portfolio.php?p_id=$rs2[p_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
      <td><?php echo "<a href=\"del_portfolio.php?p_id=$rs2[p_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
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
    ผู้ใช้งานระบบ : <?php echo"$rs[t_name]";?>
  </div>
  <?php
} else {
    echo "<script> alert('Please Login');window.location = 'index.php';</script>";
    exit();
}
?>