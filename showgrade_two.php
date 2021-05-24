<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2'){
include "connect.php";
include "include/head_menu_grade.php";

$class_id = $_GET['class_id'];
$sql = "SELECT *
				FROM student AS student 
				INNER JOIN class AS class 
					on (student.class_id = class.class_id)
					WHERE student.class_id = '$class_id'";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs = mysqli_fetch_array($result)
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
      <li class="nav-item">
       
      </li>
    </ul>
  </div>
  <div class="container" >
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="card text" style="max-width: 1200px;">
          <div class="row no-gutters">
            <div class="col-md-12">
            <table class="table table-hover" >
                <thead>
                  <tr class="bg-info text-white">
                    <th scope="col">หมู่เรียน/สาขา : <?php echo "$rs[class_name]"; ?></th>
                  </tr>
                </thead>
              <table class="table table-hover" id="mytable" >
                <thead>
                  <tr class="bg-info text-white">
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">ชื่อผู้ใช้</th>
                    <th scope="col">ชื่อ-สกุล</th>
                    <th scope="col">ปีเดือนวันที่เกิด</th>
                    <th scope="col">-</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  	$sql2 = "SELECT * FROM student AS student 
							INNER JOIN class AS class 
								on (student.class_id = class.class_id)
							WHERE student.class_id = '$class_id'";
					$result2 = mysqli_query($conn, $sql2)
  						or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                  	while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                      <td><?php 
					  if($rs2['s_pic'] != "") {
					  echo '<img src="image/' . $rs2['s_pic'] . '" width="50px;" height="50px;" alt="image">' ?>
					 <?php }
                       else{
						  echo '<img src="image/null.jpg" width="50px;" height="50px;" alt="image">' ?>
                          <?php }
					  ?></td>
                      <td><?php echo "$rs2[s_username]"; ?></td>
                      <td><?php echo "$rs2[s_name]"; ?></td>
                      <td><?php echo "$rs2[s_hbd]"; ?></td>
                      <td><?php echo "<a href=\"do_grade.php?s_username=$rs2[s_username]\">"; ?><button type="button" class="btn btn-warning">ผลการเรียน</button><?php echo "</a>"; ?></td>
                    </tr>
                  <?php
                  }
                  mysqli_close($conn);
                  ?>
                </tbody>
                 <div class="col"><button class="col btn btn-danger btn-sm float-left" input type="button" onclick=window.history.back() >back</button></div>
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