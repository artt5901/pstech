<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == 3) {
  include "connect.php";
  include "include/head_menu_grade.php";
  
$classroom_id = $_POST['classroom_id'];
$y_id = $_POST['y_id'];
$sql = "SELECT * 
		FROM classroom AS classroom 
		INNER JOIN class AS class ON (classroom.class_id = class.class_id)
		INNER JOIN course AS course ON (classroom.c_id = course.c_id)
		INNER JOIN teacher AS teacher ON (classroom.t_id = teacher.t_id)
		inner join year as year on (classroom.y_id = year.y_id)
		WHERE classroom_id = '$classroom_id' ORDER BY class_name DESC";
						
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)
?><head>
  <link rel="icon" href="icon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
</head>

<title><?php echo"$rs[c_name]"; ?> [Phasaktara]</title>


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
          <h1></h1>
        </div>
        <div class="card text" style="max-width: 1200px;">
        <form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="addgrade.php">
        <input name="classroom_id" type="hidden" id="classroom_id" value="<?php echo "$rs[classroom_id]"; ?>" />
        <input name="y_id" type="hidden" id="y_id" value="<?php echo "$rs[y_id]"; ?>" />
        <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>" />
          <input name="class_id" type="hidden" id="class_id" value="<?php echo "$rs[class_id]"; ?>" />
          <input name="t_id" type="hidden" id="t_id" value="<?php echo "$rs[t_id]"; ?>" />
              
          <div class="row no-gutters">
            <div class="col-md-12">
            
            <table class="table table-hover" >
                <thead>
                  <tr class="bg-success text-white">
                    <th scope="col">รหัสวิชา <?php echo"$rs[c_num]"; ?></th>
                    <th scope="col">วิชา : <?php echo"$rs[c_name]"; ?></th>
                    <th scope="col">หมู่เรียน : <?php echo"$rs[class_name]"; ?></th>
                </thead>
                <table class="table table-hover" >
                <thead>
                  <tr class="bg-success text-white">
                    <th scope="col">อาจารย์ผู้สอน : <?php echo"$rs[t_name]"; ?></th>
                    <th scope="col">ปีการศึกษา : <?php echo"$rs[y_number]"; ?></th>
                  </tr>
                </thead>

              <table class="table table-hover" >
                <thead>
                  <tr class="bg-danger text-white">
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">ชื่อ-สกุล</th>
                    <th scope="col">เกรด</th>
                  </tr>
                </thead>
                <tbody>
  				<?php
				$class_id = $_POST['class_id'];
				$sql = "SELECT * FROM student 
						WHERE student.class_id = '$class_id' and st_id = 1";		
				$result = mysqli_query($conn, $sql)
  					or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
				$count = mysqli_num_rows($result);		  
        		while ($rs1 = mysqli_fetch_array($result))
				    {
   				?>
   					<tr>            
                      <td><?php echo "$rs1[s_username]"; ?></td>
                      <td><?php echo "$rs1[s_name]"; ?></td>
                      <td><input type="text" class="form-control" id="score" input name="score[]"> 
                      <input name="s_username[]" type="hidden" id="s_username" value="<?php echo "$rs1[s_username]"; ?>" /></td>
         			</tr>
   				<?php
         			}
         		mysqli_close($conn);
   				?>
		</tbody>
			<input name="count" type="hidden" id="count" value="<?php echo "$count"; ?>" />
              
               <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-4 btn btn-primary btn-sm float-right">Save</button></div>
              <div class="col"><button class="col-4 btn btn-danger btn-sm float-left" input type="reset" >Reset</button></div>
              
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
              <div class="col"><button class="col-3 btn btn-secondary btn-sm float-center" input type="button" onclick=window.history.back() >back</button></div>
          </div></div>
     
      <?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.html';</script>";
  exit();
}
?>