<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2') {
  include "include/head_menu_admin.php";
  include "connect.php";
  
?>
  <title>Add Student Information To Phasaktara</title>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <a class="nav-link active" href="showstudent_one.php">แสดงข้อมูลนักศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addstudent.php">เพิ่มข้อมูลนักศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="show_successstudent.php">นักศึกษาที่สำเร็จการศึกษาทั้งหมด</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="show_outstudent.php">นักศึกษาที่ลาออก</a>
      </li>
      </ul>
    </div>
    <div class="card text-left">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          <h1>เพิ่มข้อมูลนักศึกษา</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <!-- เปลี่ยนจากเดิม addtest.php มาใช้ addstudent.php แล้ว -->
            <form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="addstudent.php">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputUsername">รหัสนักศึกษา/ชื่อผู้ใช้</label><span style="color:red">*</span>
                  <input type="text" class="form-control" id="s_username" placeholder="Username/รหัสนักศึกษา" input name="s_username" onkeypress="isInputNumber(event)" required>
                  <span id="availability"></span>
                  <?php include('checkstudent.php');?>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">รหัสผ่าน</label><span style="color:red; font-size : 12px;">*กรอกได้แค่ตัวอักษร A-Z,a-z และ 0-9 เท่านั้น</span>
                  <input type="password" class="form-control" id="s_password" placeholder="Password" input name="s_password" onkeypress="isInputPassword(event)" required>
                </div>
              </div>
              <div class="form-group ">
                <label for="inputname">รหัสบัตรประจำตัวประชาชน</label><span style="color:red">*</span>
                <input type="text" class="form-control" id="s_idcard" placeholder="รหัสบัตรประจำตัวประชาชน" input name="s_idcard" minlength="13" maxlength="13" onkeypress="isInputNumber(event)"  required>
              </div>
              <div class="form-group ">
                <label for="inputname">ชื่อ-สกุล</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                <input type="text" class="form-control" id="s_name" placeholder="" input name="s_name" onkeypress="isInputThai(event)"  required>
              </div>
              <div class="form-group">
                <label for="inputAddress">ที่อยู่</label><span style="color:red">*</span>
                <textarea class="form-control" id="s_address" input name="s_address" rows="3" required></textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">เบอร์ติดต่อ</label><span style="color:red">*</span>
                  <input type="text" class="form-control" id="s_tel" placeholder="" input name="s_tel" onkeypress="isInputNumber(event)" maxlength="10" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">E-Mail</label><span style="color:red">*</span>
                  <input type="email" class="form-control" id="s_email" placeholder="" input name="s_email" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputTel">ปีที่เข้าศึกษา</label><span style="color:red">*</span>
                  <input type="text" class="form-control" id="s_year" placeholder="" input name="s_year" onkeypress="isInputNumber(event)"  required>
                </div>
                <div class="form-group col-md-5">
                  <label for="example-date-input" class="col-9 col-form-label">วัน/เดือน/ปีเกิด<span style="color:red">*</span></label>
                  <input class="form-control" type="date" id="s_hbd" input name="s_hbd" required>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">รูปประจำตัว</label>
                <input type="file" id="photo" name="s_image">
              </div>
              <?php
    
				?>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputBranch">เลือกสาขา</label><span style="color:red">*</span>
                  <select class="form-control" name="b_id" id="branch">
            		<option value="" selected disabled>-กรุณาเลือกสาขา-</option>
             			<?php $sql_branch = "SELECT * FROM branch";
    							$query = mysqli_query($conn, $sql_branch); 
								foreach ($query as $value) { ?>
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
              <div class="form-group col-md-4">
                  <label for="inputBranch">สถานะการศึกษา</label><span style="color:red">*</span>
                  <select class="form-control" select name="st_id" id="st_id" required>
                    <option value="1">กำลังศึกษา</option>
                    <option value="2">สำเร็จการศึกษา</option>
                    <option value="3">พ้นสภาพการเป็นนักศึกษา</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTel">มีพี่น้องทั้งหมดกี่คน</label>
                  <input type="text" class="form-control" id="s_brethren" placeholder="" input name="s_brethren">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTel">เป็นบุตรคนที่</label>
                  <input type="text" class="form-control" id="s_child" placeholder="" input name="s_child">
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
                  <input type="text" class="form-control" id="f_id" placeholder="กรอกรหัสประตัวประชาชน(บิดา)" input onkeypress="isInputNumber(event)" minlength="13" maxlength="13" name="f_id" >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">ชื่อ - สกุล(บิดา)</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="f_name" placeholder="กรอกชื่อ - สกุล(บิดา)" input onkeypress="isInputThai(event)" name="f_name">
                </div>
              </div>
              <div class="form-group ">
                <label for="inputname">เบอร์ติดต่อ(บิดา)</label>
                <input type="text" class="form-control" id="f_tel" placeholder="กรอกเบอร์ติดต่อ(บิดา)" input onkeypress="isInputNumber(event)" maxlength="10" name="f_tel">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">รหัสประจำตัวประชาชน(มารดา)</label>
                  <input type="text" class="form-control" id="m_id" placeholder="กรอกรหัสประตัวประชาชน(มารดา)" input onkeypress="isInputNumber(event)" minlength="13" maxlength="13" name="m_id" >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">ชื่อ - สกุล(มารดา)</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="m_name" placeholder="กรอกชื่อ - สกุล(มารดา)" input onkeypress="isInputThai(event)" name="m_name">
                </div>
              </div>
              <div class="form-group ">
                <label for="inputname">เบอร์ติดต่อ(มารดา)</label>
                <input type="text" class="form-control" id="m_tel" placeholder="กรอกเบอร์ติดต่อ(มารดา)" input onkeypress="isInputNumber(event)" maxlength="10" name="m_tel">
              </div>
              <div class="form-group ">

                <label for="inputname">
                  <h2>ข้อมูลผู้ปกครอง</h2>
                </label>
              </div>
              <div class="form-group ">
                <label for="inputname">รหัสประจำตัวประชาชน(ผู้ปกครอง)</label> 
                <input type="text" class="form-control" id="pa_id" placeholder="กรอกรหัสประจำตัวประชาชน(ผู้ปกครอง)" input onkeypress="isInputNumber(event)" name="pa_id" minlength="13"  maxlength="13" >
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputname">ชื่อ-สกุล(ผู้ปกครอง)</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="pa_name" placeholder="กรอกชื่อ-สกุล(ผู้ปกครอง)" input onkeypress="isInputThai(event)" name="pa_name">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">ความสัมพันธ์</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
                  <input type="text" class="form-control" id="pa_relation" placeholder="กรอกสถานะความสัมพันธ์" input onkeypress="isInputThai(event)" name="pa_relation">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">ที่อยู่(ผู้ปกครอง)</label>
                <textarea class="form-control" id="pa_address" input name="pa_address" rows="3"></textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTel">เบอร์ติดต่อ(ผู้ปกครอง)</label>
                  <input type="text" class="form-control" id="pa_tel" placeholder="กรอกเบอร์ติดต่อผู้ปกครอง" input onkeypress="isInputNumber(event)" maxlength="10" name="pa_tel">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">อาชีพ(ผู้ปกครอง)</label>
                  <input type="text" class="form-control" id="pa_metier" placeholder="กรอกอาชีพ(ผู้ปกครอง)" input onkeypress="isInputThai(event)"  name="pa_metier">
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
      <div class="card-footer text-muted">
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