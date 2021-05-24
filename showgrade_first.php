<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2'){
include "connect.php";
include "include/head_menu_grade.php";

$sql = "SELECT *
				FROM  class 
				inner join branch on (class.b_id = branch.b_id)
					ORDER BY class_name DESC";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
?><head>
  <link rel="icon" href="icon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
</head>



<title>Student Information To Phasaktara</title>


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showgrade_first.php">แสดงข้อมูลนักศึกษา</a>
      </li>
    </ul>
  </div>
  <div class="container" >
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
        
        <div class="card text" style="max-width: 1200px;">
          <div class="row no-gutters">
            <div class="col-md-12">
              <table class="table table-hover" id="mytable" >
                <thead>
                
                  <tr class="bg-secondary text-white">
                    <th scope="col">สาขา</th>
                    <th scope="col">หมู่เรียน</th>
                    <th scope="col">-</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($rs = mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                    <td align="left"><?php echo "$rs[b_name]"; ?></td>
                    <td align="left"><?php echo "$rs[class_name]"; ?></td>
                      <td><?php echo "<a href=\"showgrade_two.php?class_id=$rs[class_id]\">"; ?>
                      <button type="button" class="btn btn-info">ผลการเรียน</button>
					  <?php echo "</a>"; ?></td>
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