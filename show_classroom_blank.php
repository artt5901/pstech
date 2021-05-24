<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])) {
  include "connect.php";
  include "include/head_menu_student.php";
  	$valid_username = $_SESSION["valid_uname"];
	$y_id = $_GET['y_id'];
  	$sql = "SELECT *
			FROM classroom as classroom 
				inner join class as class on (classroom.class_id = class.class_id)
				inner join student as student on (student.class_id = class.class_id)
				inner join year as year on (classroom.y_id = year.y_id)
							WHERE student.s_username = '$valid_username' AND classroom.y_id = '$y_id'";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)


?>

  <title>ตารางสอน <?php echo "$rs[class_name]"; ?> </title>
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
        
         <!-- ที่ใส่ action ว่างเพราะจะส่งค่า คืนกลับหน้าเดิม ขึ้นไปทำงานคำสั่ง php ด้านบน -->
                
                <table class="table table-warning" >
                <thead>
                  <tr class="bg-primary text-white">
                    <th scope="col">ตารางสอนนักศึกษา หมู่เรียน <?php echo "$rs[class_name]"; ?> ปีการศึกษา : <?php echo "$rs[y_number]"; ?></th>
                  </tr>
                </thead>
          <div class="row no-gutters">
            <div class="col-md-12">
           
                <table class="table table-striped " >
              <table class="table table-striped " >
                <thead><div class="col"><?php echo "<a href=\"print_classroom.php?class_id=$rs[class_id]&y_id=$rs[y_id]\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >ออกรายงานข้อมูลตารางสอน</button><?php echo "</a>"; ?></div>
                  <tr class="bg-primary text-white">
                    <th scope="col">วัน/เวลา</th>
                    <th scope="col">วิชา</th>
                    <th scope="col">อาจารย์ผู้สอน</th>
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
		inner join student as student on (student.class_id = class.class_id)
		WHERE s_username = '$valid_username' AND classroom.y_id = '$y_id' ORDER BY classroom.day_id ASC";					
				$result2 = mysqli_query($conn, $sql2)
  					or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();

                  while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                    	<td><?php echo "$rs2[day_name]"; ?> - <?php echo "$rs2[time_name]"; ?></td>
                      <td><?php echo "$rs2[c_name]"; ?></td>
                      <td><?php echo "$rs2[t_name]"; ?></td>
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