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

  $classroom_id = $_GET['classroom_id'];

  $sql = "SELECT *
			FROM classroom 
				WHERE classroom_id = '$classroom_id' ";
  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs = mysqli_fetch_array($result)
?>
  <title>Edit Classroom Information To Phasaktara</title>
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
          <h1>แก้ไขข้อมูลตารางสอน</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6">
            <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editclassroom.php">
              <input name="classroom_id" type="hidden" id="classroom_id" value="<?php echo "$rs[classroom_id]"; ?>" />
              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">คำเตือน</h5>
                      <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>คุณต้องการบันทึกการแก้ไขข้อมูลหรือไม่</p>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-danger text-white" data-dismiss="modal">ปิด</a>
                      <div class="col"><button class="btn btn-success float-right">ตกลง</button></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-7">
                <label for="inputBranch">เลือกหมู่เรียน</label>
                <select class="form-control" select name="class_id" id="class_id" disabled required>
                  <?php
                  echo "$rs[class_id]";
                  $sql1 = "SELECT * FROM class order by class_id desc ";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=\"$rs1[class_id]\" ";
                    if ("$rs[class_id]" == "$rs1[class_id]") {
                      echo 'selected';
                    }
                    echo ">$rs1[class_name]";
                    echo "</option>\n";
                  }
                  ?>
                </select>
              </div>
              <div class="form-row">
                <div class="form-group col-md-7">
                  <label for="inputname">รายวิชา</label>
                  <select class="form-control" select name="c_id" id="c_id" required>

                    <?php
                    echo "$rs[c_id]";
                    $sql1 = "SELECT * FROM course order by c_id desc ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[c_id]\" ";
                      if ("$rs[c_id]" == "$rs1[c_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[c_name]";
                      echo "</option>\n";
                    }
                    ?>
                  </select>
                  <span id="availability"></span>
                </div>
                
                <div class="form-group col-md-3">
                  <label for="inputBranch">ปีการศึกษา/ภาคเรียน</label>
                  <select class="form-control" select name="y_id" id="y_id" required>
                    <?php
                    echo "$rs[y_id]";
                    $sql1 = "SELECT * FROM year order by y_id desc ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[y_id]\" ";
                      if ("$rs[y_id]" == "$rs1[y_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[y_number]";
                      echo "</option>\n";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                
                <div class="form-group col-md-4">
                  <label for="inputBranch">วัน</label>
                  <select class="form-control" select name="day_id" id="day_id" required>
                    <?php
                    echo "$rs[day_id]";
                    $sql1 = "SELECT * FROM day ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[day_id]\" ";
                      if ("$rs[day_id]" == "$rs1[day_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[day_name]";
                      echo "</option>\n";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputBranch">เวลาเริ่มเรียน</label>
                  <select class="form-control" select name="time_id" id="time_id" required>
                    <?php
                    echo "$rs[time_id]";
                    $sql1 = "SELECT * FROM time ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[time_id]\" ";
                      if ("$rs[time_id]" == "$rs1[time_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[time_name]";
                      echo "</option>\n";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputname">อาจารย์ผู้สอน</label>
                  <select class="form-control" select name="t_id" id="t_id" required>
                    <?php
                    echo "$rs[t_id]";
                    $sql1 = "SELECT * FROM teacher order by t_id desc ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[t_id]\" ";
                      if ("$rs[t_id]" == "$rs1[t_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[t_name]";
                      echo "</option>\n";
                    }
                    ?>
                  </select>
                </div>
                
                
              </div>
            </form>
            <div class="form-group text-center">

            </div>
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="col"><button class="col-6 btn btn-success btn-sm float-right" data-toggle="modal" data-target="#myModal">บันทึก</button></div>
                  <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="button" onclick=window.history.back()>ย้อนกลับ</button></div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>

    </div>
    <div class="card-footer text-muted">
      Phasaktara Technological Callege
    </div>
  </div>
  </div>

  <?php include('script_student.php'); ?>
<?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.php';</script>";
  exit();
}
?>