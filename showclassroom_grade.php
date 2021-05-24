<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == 3) {
  include "connect.php";
  include "include/head_menu_grade.php";
  

  $sql = "SELECT * FROM classroom AS classroom 
		INNER JOIN class AS class ON (classroom.class_id = class.class_id)
		INNER JOIN course AS course ON (classroom.c_id = course.c_id)
		INNER JOIN teacher AS teacher ON (classroom.t_id = teacher.t_id)
		INNER JOIN day AS day on (classroom.day_id = day.day_id)
		inner join time as time on (classroom.time_id = time.time_id)
		ORDER BY class_name DESC";

  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();

?>

  <head>
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
  </head>




  <title>Classroom Information To Phasaktara</title>


  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="showclassroom_grade.php">แสดงข้อมูลรายวิชาที่มีเรียน</a>
        </li>
      </ul>
    </div>
    <div class="container">
      <div class="card text-center">
        <div class="container-fluid h-100 bg-light text-dark">
          <div class="row justify-content-center align-items-center">
            <h1>แสดงตารางรายวิชา(เกรด)</h1>
          </div>
          <div class="card text" style="max-width: 1200px;">
            <form action="" method="post">
              <div class="row no-gutters">
                <div class="col-md-12">
                  <table class="table table-hover" id="mytable">
                    <thead>
                      <tr class="bg-secondary text-white">
                        <th scope="col">หมู่เรียน</th>
                        <th scope="col">วิชา</th>
                        <th scope="col">อาจารย์ผู้สอน</th>
                        <th scope="col">ปีการศึกษา/เทอม</th>
                        <th scope="col">-</th>
                        <th scope="col">-</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($rs = mysqli_fetch_array($result)) {
                      ?>
                        <tr>
                          <td><?php echo "$rs[class_name]"; ?></td>
                          <td><?php echo "<a href=\"showclassroom_grade_course.php?classroom_id=$rs[classroom_id]\">"; ?><?php echo "$rs[c_name]"; ?><?php echo "</a>"; ?></td>
                          <td><?php echo "$rs[t_name]"; ?></td>
                          <td><?php echo "$rs[classroom_year]"; ?></td>
                          <td><?php echo "<a href=\"showclassroom_grade_course.php?classroom_id=$rs[classroom_id]\">"; ?><button type="button" class="btn btn-success">กรอกเกรด</button><?php echo "</a>"; ?></td>
                          <td><?php echo "<a href=\"edit_classroom_grade.php?classroom_id=$rs[classroom_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไขเกรด</button><?php echo "</a>"; ?></td>
                        </tr>
                      <?php
                      }
                      mysqli_close($conn);
                      ?>
                    </tbody>
                  </table>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-muted">
      Phasaktara Technological Callege
    </div>
  <?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.html';</script>";
  exit();
}
  ?>