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
  if ($valid_status == '3') {
    include "include/head_menu_grade.php";
  }

?>
  <title>Add News Information To Phasaktara</title>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="shownews.php">แสดงข้อมูลข่าวสาร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addnews.php">เพิ่มข้อมูลข่าวสาร</a>
        </li>
      </ul>
    </div>
    <div class="card text-left">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          <h1>เพิ่มข้อมูลข่าวสาร</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <!-- เปลี่ยนจากเดิม addtest.php มาใช้ addstudent.php แล้ว -->
            <form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="addnews.php">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputUsername">ชื่อข่าวสาร</label>
                  <input type="text" class="form-control" id="n_name" placeholder="โปรดระบุชื่อข่าวสาร" input name="n_name" required>
                </div>
                <div class="form-group col-md-5">
                  <label for="inputBranch">ประเภทข่าวสาร</label>
                  <select class="form-control" select name="n_status" id="n_status" required>
                    <option value="1">ข่าวประชาสัมพันธ์</option>
                    <option value="2">ข่าวสารทั่วไป</option>
                    <option value="3">กิจกรรม</option>
                  </select>
                  <br />
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">รายละเอียด</label>
                <textarea class="form-control" id="n_ot" input name="n_ot" rows="8" required></textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label for="example-date-input" class="col-9 col-form-label">วันที่ประชาสัมพันธ์</label>
                  <input class="form-control" type="date" id="n_date" input name="n_date" required>
                </div>
                <div class="form-group col-md-5">
                  <label for="example-date-input" class="col-9 col-form-label">วันที่หมดอายุข่าว</label>
                  <input class="form-control" type="date" id="n_ex" input name="n_ex" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-7">
                  <label for="example-date-input" class="col-9 col-form-label">ลิงค์สำหรับชมภาพกิจกรรม</label>
                  <input class="form-control" type="text" id="n_link" input name="n_link" required>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">รูปประชาสัมพันธ์</label>
                <input type="file" id="photo" name="n_image">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputBranch">ผู้ประกาศ</label>
                  <select class="form-control" select name="t_id" id="t_id" required>
                    <?php
                    if ($valid_status == '1' || $valid_status == '2' || $valid_status == '3') {
                      $sql1 = "SELECT * FROM teacher WHERE t_username = '$valid_username'";
                      $result1 = mysqli_query($conn, $sql1);
                      while ($rs1 = mysqli_fetch_array($result1)) {
                        echo "<option value=$rs1[t_id]>$rs1[t_name]</option>";
                      }
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
<?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.php';</script>";
  exit();
}
?>