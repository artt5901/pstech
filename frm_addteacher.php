<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2') {
  include "include/head_menu_admin.php";
  include "connect.php";


?>
  <title>Add Teacher Information To Phasaktara</title>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="showteacher.php">แสดงข้อมูลอาจารย์</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addteacher.php">เพิ่มข้อมูลอาจารย์</a>
        </li>
      </ul>
    </div>
    <div class="card text-left">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          <h1>เพิ่มข้อมูลอาจารย์</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="addteacher.php">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputUsername">ชื่อผู้ใช้</label><span style="color:red">*</span>
                  <input type="text" class="form-control" id="t_username" placeholder="Username" input name="t_username" onkeypress="isInputUsername(event)">
                  <span id="availability"></span>
                  <?php include('checkteacher.php'); ?>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">รหัสผ่าน</label><span style="color:red">*กรอกได้แค่ตัวอักษร A-Z,a-z และ 0-9 เท่านั้น</span>
                  <input type="password" class="form-control" id="t_password" placeholder="Password" input name="t_password" onkeypress="isInputPassword(event)">
                </div>
              </div>
              <div class="form-group ">
                <label for="inputname">ชื่อ-สกุล</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                <input type="text" class="form-control" id="t_name" placeholder="Full Name" input name="t_name" onkeypress="isInputThai(event)">
              </div>
              <div class="form-group">
                <label for="inputAddress">ที่อยู่</label><span style="color:red">*</span>
                <textarea class="form-control" id="t_address" input name="t_address" rows="3"></textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">เบอร์ติดต่อ</label><span style="color:red">*</span>
                  <input type="text" class="form-control" id="t_tel" placeholder="" input name="t_tel" onkeypress="isInputNumber(event)">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">E-Mail</label>
                  <input type="email" class="form-control" id="t_email" placeholder="email@example.com" input name="t_email">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputTel">ปีที่เข้าสอน</label><span style="color:red">*</span>
                  <input type="text" class="form-control" id="t_year" placeholder="" input name="t_year" onkeypress="isInputNumber(event)">
                </div>
                <div class="form-group col-md-9">
                  <label for="inputEnd">สถานที่จบการศึกษา</label><span style="color:red">*</span>
                  <input type="text" class="form-control" id="t_end" placeholder="" input name="t_end" >
                </div>
              </div>
              <div class="form-group ">
                <label for="inputedu">ระดับการศึกษา</label><span style="color:red; font-size : 12px;">*ระบุระดับการศึกษา และสาขาที่สำเร็จการศึกษา</span>
                <input type="text" class="form-control" id="t_educa" placeholder="เช่น ปริญญาเอก สาขาคอมพิวเตอร์ธุรกิจ" input name="t_educa" onkeypress="isInputThai(event)">
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">รูปประจำตัว</label>
                <input type="file" id="photo" name="t_image">
              </div>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label for="inputBranch">เลือกสาขา</label><span style="color:red">*</span>
                  <select class="form-control" select name="b_id" id="b_id">
                    <?php
                    $sql1 = "SELECT * FROM branch";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=$rs1[b_id]>$rs1[b_name]</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-7"><span style="color:red">*</span>
                  <label for="inputPosition">เลือกตำแหน่ง</label>
                  <select class="form-control" select name="po_id" id="po_id">
                    <?php
                    $sql1 = "SELECT * FROM position";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=$rs1[po_id]>$rs1[po_name]</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputBranch">สถานะ</label><span style="color:red">*</span>
                <select class="form-control" select name="t_status" id="t_status" required>
                  <option value="1">ครู/อาจารย์</option>
                  <option value="2">ผู้ดูแลระบบ</option>
                  <option value="3">ผู้ดูแลผลการเรียน</option>
                </select>

              </div>
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
  echo "<script> alert('Please Login');window.location = 'index.php';</script>";
  exit();
}
?>

