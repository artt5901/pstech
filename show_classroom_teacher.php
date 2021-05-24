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
  $y_id = $_GET['y_id'];
   $t_id = $_GET['t_id'];
  	$sql = "SELECT *
			FROM classroom as classroom 
				inner join class as class on (classroom.class_id = class.class_id)
				inner join teacher as teacher on (classroom.t_id = teacher.t_id)
				inner join year as year on (classroom.y_id = year.y_id)
							WHERE teacher.t_username = '$valid_username' AND classroom.y_id = '$y_id'";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)


?>

  <title>ตารางสอน : <?php echo "$rs[t_name]"; ?> </title>
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
        
         <!-- ที่ใส่ action ว่างเพราะจะส่งค่า คืนกลับหน้าเดิม ขึ้นไปทำงานคำสั่ง php ด้านบน -->
                
                <table class="table table-warning" >
                <thead>
                  <tr class="bg-primary text-white">
                    <th scope="col">ตารางสอนนักศึกษา ของ : <?php echo "$rs[t_name]"; ?> ปีการศึกษา : <?php echo "$rs[y_number]"; ?></th>
                  </tr>
                </thead>
          <div class="row no-gutters">
            <div class="col-md-12">
          
                <table class="table table-striped " >
              <table class="table table-striped " >
                <thead><div class="col"><?php echo "<a href=\"print_classroomteacher.php?t_username=$rs[t_username]&y_id=$rs[y_id]\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >พิมพ์รายงานตารางสอนอาจารย์</button><?php echo "</a>"; ?></div>
                  <tr class="bg-primary text-white">
                   
                    <th scope="col">วัน/เวลา</th>
                    <th scope="col">วิชา</th>
                    <th scope="col">หมู่เรียน</th>
                    <th scope="col">สาขา</th>
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
		inner join branch on (class.b_id = branch.b_id)
		WHERE classroom.y_id = '$y_id' AND t_username = '$valid_username' ORDER BY classroom.day_id ASC";					
				$result2 = mysqli_query($conn, $sql2)
  					or die("4.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();

                  while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                    	<td><?php echo "$rs2[day_name]"; ?> - <?php echo "$rs2[time_name]"; ?></td>
                      <td><?php echo "$rs2[c_name]"; ?></td>
                      <td><?php echo "$rs2[class_name]"; ?></td>
                      <td><?php echo "$rs2[b_name]"; ?></td>
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