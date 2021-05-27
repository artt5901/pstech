<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2'){
include "connect.php";
include "include/head_menu_admin.php";

$sql = "SELECT *
				FROM student 
					where st_id = '2' GROUP BY s_year  HAVING count(s_year) > 0	ORDER BY s_year DESC";
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
        <a class="nav-link active" href="showstudent_one.php">แสดงข้อมูลนักศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addstudent.php">เพิ่มข้อมูลนักศึกษา</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="showsuccess_one.php">แสดงข้อมูลนักศึกษาที่ต้องการสำเร็จการศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="show_successstudent.php">นักศึกษาที่สำเร็จการศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="show_outstudent.php">นักศึกษาที่ลาออก</a>
      </li>
    </ul>
  </div>
  <div class="container" >
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
      <div class="row justify-content-center align-items-center">
    <h1>แสดงข้อมูลนักศึกษา : สำเร็จการศึกษา</h1>    
  </div>
        <div class="card text" style="max-width: 1200px;">
          <div class="row no-gutters">
            <div class="col-md-12">
              <table class="table table-hover" id="mytable-year" >
                <thead>
                  <tr class="bg-secondary text-white">
                    <th scope="col">ปีที่เข้าศึกษา</th>
                    <th scope="col">-</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($rs = mysqli_fetch_array($result)) {
                  ?><tr>
                    <td><?php echo "$rs[s_year]"; ?></td>
                      <td><?php echo "<a href=\"show_successstudent_first.php?s_year=$rs[s_year]\">"; ?>
                      <button type="button" class="btn btn-success">แสดงหมู่เรียน</button>
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
      <a class="btn btn-link btn-sm" href="print_student.php" role="button">พิมพ์รายงานข้อมูลนักศึกษาทั้งหมด</a>
      <div class="card-footer text-muted">
        Phasaktara Technological Callege
      </div>
      <?php
} else {
    echo "<script> alert('Please Login');window.location = 'index.php';</script>";
    exit();
}
?>