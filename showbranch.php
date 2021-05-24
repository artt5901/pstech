<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2'){
	include "connect.php";
	include "include/head_menu_admin.php";
	
	$sql = "SELECT d1.b_id , d1.b_name , d2.d_name
			FROM branch AS d1
				INNER JOIN department AS d2
					on (d1.d_id = d2.d_id)";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
?>

<title>Branch Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showbranch.php">แสดงข้อมูลสาขา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addbranch.php">เพิ่มข้อมูลสาขา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="showdepartment.php">แสดงข้อมูลแผนก</a>
      </li>
    </ul>
  </div>
  <div class="container" align="center">
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>แสดงข้อมูลสาขา</h1>    
  </div>
<div class="card text"  style="max-width: 1100px;" >
  <div class="row no-gutters">
    <div class="col-md-12">
<table class="table table-hover">
  <thead>
  <div class="col"><?php echo "<a href=\"print_branch.php?\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >พิมพ์รายงานข้อมูลสาขา</button><?php echo "</a>"; ?></div>
    <tr class="bg-secondary text-white">
      <th scope="col">#</th>
      <th scope="col">สาขา</th>
      <th scope="col">แผนก</th>
      <th scope="col">-</th>
      <th scope="col">-</th>
    </tr>
  </thead>
  <tbody>
  <?php
	while($rs=mysqli_fetch_array($result)){
?>
    <tr>
      <td><?php echo"$rs[b_id]";?></td>
      <td><?php echo"$rs[b_name]";?></td>
      <td><?php echo"$rs[d_name]";?></td>
      <td><?php echo "<a href=\"edit_branch.php?b_id=$rs[b_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
      <td><?php echo "<a href=\"del_branch.php?b_id=$rs[b_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
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