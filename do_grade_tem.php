<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2'){
include "connect.php";
include "include/head_menu_grade.php";
$s_username = $_GET['s_username'];
$y_id = $_GET['y_id'];
$sql = "SELECT (sum(score*c_credit)/sum(c_credit)) as grade , grade.s_username , stu.s_name , class.class_name , year.y_number , grade.y_id
				FROM grade as grade inner join student as stu on (grade.s_username = stu.s_username)
									INNER JOIN course AS course ON (grade.c_id = course.c_id)
									inner join class as class on (grade.class_id = class.class_id)
									inner join year as year on (grade.y_id = year.y_id)
									WHERE grade.s_username = '$s_username' AND grade.y_id = '$y_id'";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs = mysqli_fetch_array($result)
  
?><head>
  <link rel="icon" href="icon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
</head>



<title><?php echo"$rs[s_name]"; ?> Information To Phasaktara</title>


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showgrade_first.php">หน้าหลัก</a>
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
                
                  <tr class="bg-info text-white">
                  
                  	<th scope="col">รหัสนักศึกษา : <?php echo"$rs[s_username]"; ?></th>
                    <th scope="col">ชื่อ-สกุล : <?php echo"$rs[s_name]"; ?></th>
                    <th scope="col">หมู่เรียน : <?php echo"$rs[class_name]"; ?></th>
                     <th scope="col">ปีการศึกษา : <?php echo"$rs[y_number]"; ?></th>
                </thead>
                
              <table class="table table-striped" id="mytable" >
              <div class="col"><?php echo "<a href=\"print_grade.php?s_username=$rs[s_username]&y_id=$rs[y_id]\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >พิมพ์รายงานผลการเรียนนักศึกษา</button><?php echo "</a>"; ?></div>
                <thead>
                  <tr class="bg-info text-white">
                    <th scope="col">รหัสวิชา</th>
                    <th scope="col">รายวิชา</th>
                    <th scope="col">จำนวนหน่วยกิต</th>
                    <th scope="col">เกรด</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  $sql2 = "SELECT * 
							FROM grade AS grade 
							INNER JOIN class AS class ON (grade.class_id = class.class_id)
							INNER JOIN course AS course ON (grade.c_id = course.c_id)
							INNER JOIN student as stu ON (grade.s_username = stu.s_username)
							inner join year as year on (grade.y_id = year.y_id)
							WHERE grade.s_username = '$s_username' AND grade.y_id = '$y_id'";
					$result2 = mysqli_query($conn, $sql2)
  						or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                  while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                      <td><?php echo "$rs2[c_num]"; ?>
                      <td><?php echo "$rs2[c_name]"; ?>
                      <td><?php echo "$rs2[c_credit]"; ?>
                      <td><?php echo "$rs2[score]"; ?>
                    </tr>
                  <?php
                  }
                  mysqli_close($conn);
                  ?>
                </tbody>
              </table>
              <table class="table table-hover" >
                <thead>
                  <tr class="bg-info text-white">
                    <th scope="col">ผลการเรียนเฉลี่ย : <?php echo round($rs["grade"],2); ?></th>
                  </tr>
                </thead>
                </table>
                
                <div class="col"><button class="col-12 btn btn-secondary btn-sm float-left" input type="button" onclick=window.history.back() >Back</button></div>
              
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