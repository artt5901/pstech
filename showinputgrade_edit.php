<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])){
include "connect.php";

$valid_status = $_SESSION["userlevel"];
$valid_username = $_SESSION["valid_uname"];

  include "include/head_menu_grade.php";
	$y_id = $_GET['y_id'];
	$class_id = $_GET['class_id'];
  	$sql = "SELECT *
			FROM classroom as classroom 
				inner join class as class on (classroom.class_id = class.class_id)
				inner join year as year on (classroom.y_id = year.y_id)
							WHERE classroom.y_id = '$y_id' AND classroom.class_id";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)


?>

  <title>ตารางสอน <?php echo "$rs[class_name]"; ?> </title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      	<li class="nav-item">
        <a class="nav-link active" href="showinputgrade.php">แสดงผลการเรียน</a>
      </li>
    </ul>
  </div>
  <div class="container" >
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
        </div>
        <div class="card text" style="max-width: 1200px;">
        
        <form action="" method="post"> <!-- ที่ใส่ action ว่างเพราะจะส่งค่า คืนกลับหน้าเดิม ขึ้นไปทำงานคำสั่ง php ด้านบน -->
                
        </div>
                <table class="table table-warning" >
                <thead>
                  <tr class="bg-primary text-white">
                    <th scope="col">ปีการศึกษา/ภาคเรียน : <?php echo "$rs[y_number]"; ?> </th>
                    <th scope="col">หมู่เรียน/สาขา : <?php echo "$rs[class_name]"; ?></th>
                  </tr>
                </thead>
              </table>
          <div class="row no-gutters">
            <div class="col-md-12">
           
                <table class="table table-striped " >
              <table class="table table-striped " >
                <thead>
                  <tr class="bg-primary text-white">
                    <th scope="col">หมู่เรียน</th>
                    <th scope="col">วิชา</th>
                    <th scope="col">อาจารย์ผู้สอน</th>
                    <th scope="col">-</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  $sql2 = "SELECT * FROM classroom AS classroom 
		INNER JOIN class AS class ON (classroom.class_id = class.class_id)
		INNER JOIN course AS course ON (classroom.c_id = course.c_id)
		INNER JOIN teacher AS teacher ON (classroom.t_id = teacher.t_id)
		INNER JOIN day AS day on (classroom.day_id = day.day_id)
		inner join time as time on (classroom.time_id = time.time_id)
		inner join year as year on (classroom.y_id = year.y_id)
		WHERE classroom.y_id = '$y_id' AND classroom.class_id = '$class_id' AND classroom_st = '2' ORDER BY classroom.day_id ASC";					
				$result2 = mysqli_query($conn, $sql2)
  					or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();

                  while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                    <td><?php echo "$rs2[class_name]"; ?></td>
                      <td><?php echo "$rs2[c_name]"; ?></td>
                      <td><?php echo "$rs2[t_name]"; ?></td>
                      <td><?php echo "<a href=\"edit_grade_course.php?classroom_id=$rs2[classroom_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไขเกรด</button><?php echo "</a>"; ?></td>
                    </tr>
                  <?php
                  }
                  mysqli_close($conn);
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          
           

          </form>
        </div>
      </div>
      <div class="form-group">
              <div class="col"><button class="col-3 btn btn-secondary btn-sm float-center" input type="button" onclick=window.history.back() >back</button></div>
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