<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])) {
  include "connect.php";
  $valid_status = $_SESSION["userlevel"];
  
  if ($valid_status == '1') {
    include "include/head_menu_teacher.php";
  }
  if ($valid_status == '2') {
    include "include/head_menu_admin.php";
  }


  $classroom_id = $_GET['classroom_id'];

  $sql = "SELECT * FROM classroom AS classroom 
		INNER JOIN class AS class ON (classroom.class_id = class.class_id)
		INNER JOIN course AS course ON (classroom.c_id = course.c_id)
		INNER JOIN teacher AS teacher ON (classroom.t_id = teacher.t_id)
		INNER JOIN day AS day on (classroom.day_id = day.day_id)
		inner join time as time on (classroom.time_id = time.time_id)
		inner join year as year on (classroom.y_id = year.y_id)
				WHERE classroom_id = '$classroom_id'  ";
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
          <h1>ลบข้อมูลตารางสอน</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="delclassroom.php">
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
                    <p>คุณต้องการลบข้อมูลหรือไม่</p>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-danger text-white" data-dismiss="modal">ปิด</a>
                    <div class="col"><button class="btn btn-success float-right">ตกลง</button></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group ">
                <label for="inputBranch">หมู่เรียน</label>
                <input type="text" class="form-control" id="class_name" value="<?php echo "$rs[class_name]"; ?>" input name="class_name" disabled="disabled" required>
            </div>
            <div class="form-row">
              	<div class="form-group col-md-7">
              <label for="inputname">รายวิชา</label>
              <input type="text" class="form-control" id="c_name" value="<?php echo "$rs[c_name]"; ?>" input name="c_name" disabled="disabled" required>
            	</div>
           	 	<div class="form-group col-md-3">
              <label for="inputTel">ปีการศึกษาและภาคเรียน</label>
                <input type="text" class="form-control" id="y_number" value="<?php echo "$rs[y_number]"; ?>" input name="classroom_year" disabled="disabled" required>
            	</div>
            </div>
            <div class="form-row">
              	<div class="form-group col-md-3">
              <label for="inputname">อาจารย์ผู้สอน</label>
              <input type="text" class="form-control" id="t_name" value="<?php echo "$rs[t_name]"; ?>" input name="t_name" disabled="disabled" required>
            	</div>
                <div class="form-group col-md-2">
                <label for="inputBranch">วัน</label>
               <input type="text" class="form-control" id="day_name" value="<?php echo "$rs[day_name]"; ?>" input name="day_name" disabled="disabled" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputBranch">เวลาเรียน</label>
                <input type="text" class="form-control" id="time_name" value="<?php echo "$rs[time_name]"; ?>" input name="time_name" disabled="disabled" required>
            </div>
            </div>
      </form>
            <div class="form-group text-center">

            </div>
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="col"><button class="col-6 btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#myModal">ลบ</button></div>
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
<?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.html';</script>";
  exit();
}
?>