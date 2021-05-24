<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])){
include "connect.php";
$valid_status = $_SESSION["userlevel"];
$valid_username = $_SESSION["valid_uname"];

if ($valid_status == '1') {
  include "include/head_menu_teacher.php";
}
if ($valid_status == '2') {
  include "include/head_menu_admin.php";
}
if ($valid_status == '3') {
  include "include/head_menu_grade.php";
}
$sql = "SELECT *
				FROM teacher , classroom as classroom 
				inner join class as class on (classroom.class_id = class.class_id)
							WHERE teacher.t_username = '$valid_username'";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs = mysqli_fetch_array($result)
?><head>
  <link rel="icon" href="icon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
</head>

<title>Classroom Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      	<li class="nav-item">
        <a class="nav-link active" href="showclassroom_teacher.php">เลือกปีการศึกษา/ภาคเรียน</a>
      </li>
    </ul>
  </div>
  <div class="container" >
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          
        </div>
        <div class="card text" style="max-width: 1200px;">
          <div class="row no-gutters">
            <div class="col-md-12">
            <table class="table table-hover" >
                <thead>
                  <tr class="bg-dark text-white">
                  	<th scope="col">ตารางสอน ครู : <?php echo"$rs[t_name]"; ?></th>
                </thead>
              <table class="table table-hover" >
                <thead>
                  <tr class="bg-dark text-white">
                    <th scope="col">| ปีการศึกษา/ภาคเรียน |</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  $sql2 = "SELECT * FROM classroom as classroom
				  inner join year as year on (classroom.y_id = year.y_id)
				  inner join class as class on (classroom.class_id = class.class_id)
				  inner join student as student on (student.class_id = class.class_id)
				  inner join teacher as teacher on (classroom.t_id = teacher.t_id)
				  WHERE teacher.t_username = '$valid_username'  GROUP BY classroom.y_id  HAVING count(classroom.y_id) > 0	ORDER BY classroom.y_id DESC ";			
					$result2 = mysqli_query($conn, $sql2)
  					or die("4.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                  while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                      <td><?php echo "<a href=\"show_classroom_teacher.php?y_id=$rs2[y_id]&t_id=$rs2[t_id]\">"; ?>
                      <button type="button" class="btn btn-info"><?php echo "$rs2[y_number]"; ?></button>
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