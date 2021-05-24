<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])) {
  include "connect.php";
  $valid_status = $_SESSION["userlevel"];
  $valid_username = $_SESSION["valid_uname"];

  if ($valid_status == '1') {
    include "include/head_menu_teacher.php";
  }
  if ($valid_status == '2') {
    include "include/head_menu_admin.php";
  }
?>
  <title>Add Classroom Information To Phasaktara</title>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="showclassroom.php">แสดงข้อมูลตารางสอน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addclassroom.php">เพิ่มข้อมูลตารางสอน</a>
        </li>
      </ul>
    </div>
    <div class="card text-left">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          <h1>เพิ่มข้อมูลตารางสอน</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <!-- เปลี่ยนจากเดิม addtest.php มาใช้ addstudent.php แล้ว -->
            <form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="addclassroom.php">
              <?php
    $sql_branch = "SELECT * FROM branch";
    $query = mysqli_query($conn, $sql_branch);
				?>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputBranch">เลือกสาขา</label><span style="color:red">*</span>
                  <select class="form-control" name="b_id" id="branch">
            		<option value="" selected disabled>-กรุณาเลือกสาขา-</option>
             			<?php foreach ($query as $value) { ?>
            		<option value="<?=$value['b_id']?>"><?=$value['b_name']?></option>
            			<?php } ?>
      			</select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputBranch">เลือกหมู่เรียน</label><span style="color:red">*</span>
                  <select class="form-control" name="class_id" id="class_id">
      				</select>
                </div>
                </div>
            <div class="form-row">
              	<div class="form-group col-md-7">
              <label for="inputname">รายวิชา</label> 
              <select class="form-control" select name="c_id" id="c_id" required>
              <option value="">-- เลือกรายวิชา --</option>
                  <?php
                  $sql1 = "SELECT * FROM course ORDER BY c_name DESC";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[c_id]>$rs1[c_name]</option>";
                  }
                  ?>
                </select>
            	</div>
           	 	<div class="form-group col-md-5">
              <label for="inputBranch">เลือกปีการศึกษา/ภาคเรียน</label>
                <select class="form-control" select name="y_id" id="y_id" required>
                <option value="">-- เลือกปีการศึกษา/ภาคเรียน --</option>
                  <?php
                  $sql1 = "SELECT * FROM year ORDER BY y_number DESC";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[y_id]>$rs1[y_number]</option>";
                  }
                  ?>
                </select>
            	</div>
            </div>
            <div class="form-row">
              	<div class="form-group col-md-4">
              <label for="inputname">อาจารย์ผู้สอน</label>
              <select class="form-control" select name="t_id" id="t_id" required>
              <option value="">-- เลือกอาจารย์ผู้สอน --</option>
                  <?php
                  $sql1 = "SELECT * FROM teacher ORDER BY t_id DESC";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[t_id]>$rs1[t_name]</option>";
                  }
                  ?>
                </select>
            	</div>
                <div class="form-group col-md-4">
                <label for="inputBranch">วัน</label>
                <select class="form-control" select name="day_id" id="day_id" required>
                <option value="">-- เลือกวัน --</option>
                  <?php
                  $sql1 = "SELECT * FROM day";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[day_id]>$rs1[day_name]</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputBranch">เวลาเริ่มเรียน</label>
                <select class="form-control" select name="time_id" id="time_id" required>
                <option value="">-- เลือกเวลา --</option>
                  <?php
                  $sql1 = "SELECT * FROM time";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[time_id]>$rs1[time_name]</option>";
                  }
                  ?>
                </select>
            </div>
            </div>

              <div class="form-group">

                <div class="form-group text-center">

                </div>
                <div class="form-group">
                  <div class="container">
                    <div class="row">
                      <div class="col"><button class="col-6 btn btn-primary btn-sm float-right" name="save_teacher">บันทึก</button></div>
                      <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="reset">ล้างข้อมูล</button></div>

                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>


      </div>
      <div class="card-footer text-center">
        Phasaktara Technological Callege
      </div>
    </div>
  </div>
  <?php include('script_student.php');?>
<?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.php';</script>";
  exit();
}
?>