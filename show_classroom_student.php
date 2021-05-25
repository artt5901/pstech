<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])) {
  include "connect.php";
  include "include/head_menu_student.php";
$valid_username = $_SESSION["valid_uname"];
$sql = "SELECT *
				FROM student
				inner join class on (student.class_id = class.class_id)
							WHERE student.s_username = '$valid_username'";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs = mysqli_fetch_array($result)
?>

  <title>ตารางสอน <?php echo "$rs[class_name]"; ?></title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      	<li class="nav-item">
        <a class="nav-link active" href="show_classroom_student.php">เลือกปีการศึกษา/ภาคเรียน</a>
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
                  	<th scope="col">รหัสนักศึกษา : <?php echo"$rs[s_username]"; ?></th>
                    <th scope="col">ชื่อ-สกุล : <?php echo"$rs[s_name]"; ?></th>
                    <th scope="col">หมู่เรียน : <?php echo"$rs[class_name]"; ?></th>
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
				  WHERE s_username = '$valid_username' GROUP BY classroom.y_id HAVING count(classroom.y_id) > 0	 ";			
					$result2 = mysqli_query($conn, $sql2)
  					or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                  while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                      <td><?php echo "<a href=\"show_classroom_blank.php?y_id=$rs2[y_id]\">"; ?>
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