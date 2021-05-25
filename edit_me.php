<?php
session_start();

if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])) {
  include "include/head_menu_student.php";
  include "connect.php";
  $valid_username = $_SESSION["valid_uname"];


  $sql = "SELECT *
			FROM student , father , mathar , parent 
				WHERE s_username = '$valid_username' ";
  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs = mysqli_fetch_array($result)
?>
  <title>Edit <?php echo "$rs[s_name]"; ?> Information To Phasaktara</title>
  <div class="card text-center">
    <!-- <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showstudent.php">แสดงข้อมูลนักศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addstudent.php">เพิ่มข้อมูลนักศึกษา</a>
      </li>
    </ul>
  </div> -->
    <div class="card text-left">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          <h1>แก้ไขข้อมูลประวัติส่วนตัว</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editmestudent.php">
              <input name="s_username" type="hidden" id="s_username" value="<?php echo "$rs[s_username]"; ?>" />
              <input name="s_pic" type="hidden" id="s_pic" value="<?php echo "$rs[s_pic]"; ?>" />
              <input name="f_id" type="hidden" id="f_id" value="<?php echo "$rs[f_id]"; ?>" />
              <input name="m_id" type="hidden" id="m_id" value="<?php echo "$rs[m_id]"; ?>" />
              <input name="pa_id" type="hidden" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" />
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
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputUsername">รหัสนักศึกษา/ชื่อผู้ใช้</label>
                  <input type="text" class="form-control" id="s_username" disabled="disabled" input name="s_username" value="<?php echo "$rs[s_username]"; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">รหัสผ่าน</label><span style="color:red; font-size : 12px;">*กรอกได้แค่ตัวอักษร A-Z,a-z และ 0-9 เท่านั้น</span>
                  <input type="password" class="form-control" id="s_password" placeholder="Password" input name="s_password" value="<?php echo "$rs[s_password]"; ?>" onkeypress="isInputPassword(event)" required>
                </div>
              </div>
              <div class="form-group ">
                <label for="inputname">รหัสบัตรประชาชนประจำตัว</label>
                <input type="text" class="form-control" id="s_idcard" placeholder="รหัสบัตรประชาชนประจำตัว" input name="s_idcard" value="<?php echo "$rs[s_idcard]"; ?>" onkeypress="isInputNumber(event)"  minlength="13" maxlength="13" required>
              </div>
              <div class="form-group ">
                <label for="inputname">ชื่อ-สกุล</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                <input type="text" class="form-control" id="s_name" placeholder="Full Name" input name="s_name" value="<?php echo "$rs[s_name]"; ?>" onkeypress="isInputThai(event)" required>
              </div>
              <div class="form-group">
                <label for="inputAddress">ที่อยู่</label>
                <textarea class="form-control" id="s_address" input name="s_address" rows="3" required><?php echo "$rs[s_address]"; ?></textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">เบอร์ติดต่อ</label>
                  <input type="text" class="form-control" id="s_tel" placeholder="0622915580" input name="s_tel" value="<?php echo "$rs[s_tel]"; ?>" onkeypress="isInputNumber(event)" maxlength="10" minlength="10" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">E-Mail</label>
                  <input type="email" class="form-control" id="s_email" placeholder="phasaktara@example.com" input name="s_email" value="<?php echo "$rs[s_email]"; ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputTel">ปีที่เข้าศึกษา</label>
                  <input type="text" class="form-control" id="s_year" placeholder="2563" input name="s_year" value="<?php echo "$rs[s_year]"; ?>" onkeypress="isInputNumber(event)" required>
                </div>
                <div class="form-group col-md-5">
                  <label for="example-date-input" class="col-9 col-form-label">วัน/เดือน/ปีเกิด</label>
                  <input class="form-control" type="date" id="s_hbd" input name="s_hbd" value="<?php echo "$rs[s_hbd]"; ?>"  required>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">รูปประจำตัว</label>
                <?php
                if ("$rs[s_pic]" != "") {
                ?>
                  <img src=<?php echo "./image/$rs[s_pic]"; ?> width="200" height="250" />
                <?php
                }
                ?>
                <input type="file" id="photo" name="s_image">
              </div>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="inputBranch">เลือกหมู่เรียน</label>
                    <?php
                    $sql1 = "SELECT *
                    FROM student AS student 
                    INNER JOIN class AS class 
                      on (student.class_id = class.class_id)
                      WHERE student.s_username = '$valid_username' ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      ?>
                      <input type="text" class="form-control" id="class_id" placeholder="-" input name="class_id" value="<?php echo "$rs1[class_name]";  ?>" required readonly>
                      <?php
                    }
                    ?>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputBranch">สถานะการศึกษา</label>
                  <!-- <select class="form-control" select name="st_id" id="st_id" required> -->
                    <!-- <option value="">-- สถานะการศึกษา --</option>
                <option value="1">กำลังศึกษา</option>
                  <option value="2">สำเร็จการศึกษา</option>
                  <option value="3">พ้นสภาพการเป็นนักศึกษา</option> -->
                    <?php
                    $sql1 = "SELECT st_id FROM student Where s_username = '$valid_username'";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                    if ("$rs1[st_id]" == 1) {
                      $st_name = 'กำลังศึกษา';
                    }
                    if ("$rs1[st_id]" == 2) {
                      $st_name = 'สำเร็จการศึกษา';
                    } 
                    if ("$rs1[st_id]" == 3){
                      $st_name = 'พ้นสภาพการเป็นนักศึกษา';
                    }
                  }
                    ?>

                  <!-- </select> -->
                  <input type="text" class="form-control" id="st_id" placeholder="-" input name="st_id" value="<?php echo $st_name; ?>" required readonly>

                  <br />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputTel">มีพี่น้องทั้งหมดกี่คน</label>
                  <input type="text" class="form-control" id="s_brethren" placeholder="-" input name="s_brethren" value="<?php echo "$rs[s_brethren]"; ?>" required>
                </div>
                <div class="form-group col-md-5">
                  <label for="inputTel">เป็นบุตรคนที่</label>
                  <input type="text" class="form-control" id="s_child" placeholder="-" input name="s_child" value="<?php echo "$rs[s_child]"; ?>" required>
                </div>
              </div>

              <div class="form-group ">

                <label for="inputname">
                  <h2>ข้อมูลบิดามารดา</h2>
                </label>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">รหัสประจำตัวประชาชน(บิดา)</label>
                  <input type="text" class="form-control" id="f_id" disabled="disabled" value="<?php echo "$rs[f_id]"; ?>" input name="f_id"  minlength="13" maxlength="13" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">ชื่อ - สกุล(บิดา)</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="f_name" value="<?php echo "$rs[f_name]"; ?>" input name="f_name" onkeypress="isInputThai(event)"  required>
                </div>
              </div>
              <div class="form-group ">
                <label for="inputname">เบอร์ติดต่อ(บิดา)</label>
                <input type="text" class="form-control" id="f_tel" value="<?php echo "$rs[f_tel]"; ?>" input name="f_tel" onkeypress="isInputNumber(event)" maxlength="10" minlength="10" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">รหัสประจำตัวประชาชน(มารดา)</label>
                  <input type="text" class="form-control" id="m_id" disabled="disabled" value="<?php echo "$rs[m_id]"; ?>" input name="m_id"  minlength="13" maxlength="13" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">ชื่อ - สกุล(มารดา)</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="m_name" value="<?php echo "$rs[m_name]"; ?>" input name="m_name" onkeypress="isInputThai(event)" required>
                </div>
              </div>
              <div class="form-group ">
                <label for="inputname">เบอร์ติดต่อ(มารดา)</label>
                <input type="text" class="form-control" id="m_tel" value="<?php echo "$rs[m_tel]"; ?>" input name="m_tel" onkeypress="isInputNumber(event)" maxlength="10" minlength="10" required>
              </div>
              <div class="form-group ">

                <label for="inputname">
                  <h2>ข้อมูลผู้ปกครอง</h2>
                </label>
              </div>
              <div class="form-group ">
                <label for="inputname">รหัสประจำตัวประชาชน(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_id" disabled="disabled" value="<?php echo "$rs[pa_id]"; ?>" input name="pa_id"  minlength="13" maxlength="13" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputname">ชื่อ-สกุล(ผู้ปกครอง)</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="pa_name" value="<?php echo "$rs[pa_name]"; ?>" input name="pa_name" onkeypress="isInputThai(event)" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">ความสัมพันธ์</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="pa_relation" value="<?php echo "$rs[pa_relation]"; ?>" input name="pa_relation" onkeypress="isInputThai(event)" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">ที่อยู่(ผู้ปกครอง)</label>
                <textarea class="form-control" id="pa_address" input name="pa_address" rows="3" required> <?php echo "$rs[pa_address]"; ?> </textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">เบอร์ติดต่อ(ผู้ปกครอง)</label>
                  <input type="text" class="form-control" id="pa_tel" value="<?php echo "$rs[pa_tel]"; ?>" input name="pa_tel" onkeypress="isInputNumber(event)"  maxlength="10" minlength="10" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">อาชีพ(ผู้ปกครอง)</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="pa_metier" value="<?php echo "$rs[pa_metier]"; ?>" input name="pa_metier" onkeypress="isInputThai(event)" required>
                </div>
              </div>
              </select>

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

<?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.php';</script>";
  exit();
}
?>