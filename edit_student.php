<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
include "include/head_menu_admin.php";
include "connect.php";

$s_username = $_GET['s_username'];

$sql = "SELECT *
			FROM student 
			inner join father on (student.f_id = father.f_id)
			inner join mathar on (student.m_id = mathar.m_id)
			inner join parent on (student.pa_id = parent.pa_id)
				WHERE s_username = '$s_username' ";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)
?>
<title>Edit <?php echo "$rs[s_name]"; ?> Information To Phasaktara</title>
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
        <h1>แก้ไขข้อมูลนักศึกษา</h1>
      </div>
      <hr />
      <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editstudent.php">
            <input name="s_username" type="hidden" id="s_username" value="<?php echo "$rs[s_username]"; ?>" />
            <input name="s_pic" type="hidden" id="s_pic" value="<?php echo "$rs[s_pic]"; ?>" />
            <input name="id_f" type="hidden" id="id_f" value="<?php echo "$rs[id_f]"; ?>" />
            <input name="id_m" type="hidden" id="id_m" value="<?php echo "$rs[id_m]"; ?>" />
            <input name="id_pa" type="hidden" id="id_pa" value="<?php echo "$rs[id_pa]"; ?>" />
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
                <input type="text" class="form-control" id="s_username" disabled="disabled" input name="s_username" value="<?php echo "$rs[s_username]"; ?>" onkeypress="isInputNumber(event)" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">รหัสผ่าน</label><span style="color:red">*กรอกได้แค่ตัวอักษร A-Z,a-z และ 0-9 เท่านั้น</span>
                <input type="text" class="form-control" id="s_password" placeholder="Password" input name="s_password" value="<?php echo "$rs[s_password]"; ?>" onkeypress="isInputPassword(event)" required>
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">รหัสบัตรประชาชนประจำตัว</label>
              <input type="text" class="form-control" id="s_idcard" placeholder="รหัสบัตรประชาชนประจำตัว" input name="s_idcard" value="<?php echo "$rs[s_idcard]"; ?>" onkeypress="isInputNumber(event)" minlength="13" maxlength="13" required>
            </div>
            <div class="form-group ">
              <label for="inputname">ชื่อ-สกุล</label>
              <input type="text" class="form-control" id="s_name" placeholder="Full Name" input name="s_name" value="<?php echo "$rs[s_name]"; ?>" onkeypress="isInputThai(event)" required>
            </div>
            <div class="form-group">
              <label for="inputAddress">ที่อยู่</label>
              <textarea class="form-control" id="s_address" input name="s_address" rows="3" required><?php echo "$rs[s_address]"; ?></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" id="s_tel" placeholder="" input name="s_tel" value="<?php echo "$rs[s_tel]"; ?>" onkeypress="isInputNumber(event)"  maxlength="10" minlength="10" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">E-Mail</label>
                <input type="email" class="form-control" id="s_email" placeholder="phasaktara@example.com" input name="s_email" value="<?php echo "$rs[s_email]"; ?>" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputTel">ปีที่เข้าศึกษา</label>
                <input type="text" class="form-control" id="s_year" placeholder="" input name="s_year" value="<?php echo "$rs[s_year]"; ?>" onkeypress="isInputNumber(event)" required>
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
                <select class="form-control" select name="class_id" id="class_id" required>
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
              
              <div class="form-group col-md-4">
                <label for="inputBranch">สถานะการศึกษา</label>
                <select class="form-control" select name="st_id" id="st_id" required>
                  <!-- <option value="">-- สถานะการศึกษา --</option>
                <option value="1">กำลังศึกษา</option>
                  <option value="2">สำเร็จการศึกษา</option>
                  <option value="3">พ้นสภาพการเป็นนักศึกษา</option> -->
                  <?php
                  $sql1 = "SELECT st_id FROM student";
                  $result1 = mysqli_query($conn, $sql1);
                  echo "<option selected";
                  if ("$rs[st_id]" == 1) {
                    echo "value=\"1\" >กำลังศึกษา</option>";
                    echo "<option value=\"2\" >สำเร็จการศึกษา</option>";
                    echo "<option value=\"3\" >พ้นสภาพการเป็นนักศึกษา</option>";
                  } elseif ("$rs[st_id]" == 2) {
                    echo "value=\"2\">สำเร็จการศึกษา</option>";
                    echo "<option value=\"1\" >กำลังศึกษา</option>";
                    echo "<option value=\"3\" >พ้นสภาพการเป็นนักศึกษา</option>";
                  } else {
                    echo "value=\"3\">พ้นสภาพการเป็นนักศึกษา</option>";
                    echo "<option value=\"1\" >กำลังศึกษา</option>";
                    echo "<option value=\"2\" >สำเร็จการศึกษา</option>";
                  }
                  ?>

                </select>

                <br />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputTel">มีพี่น้องทั้งหมดกี่คน</label>
                <input type="text" class="form-control" id="s_brethren" placeholder="-" input name="s_brethren" value="<?php echo "$rs[s_brethren]"; ?>" onkeypress="isInputNumber1(event)" required>
              </div>
              <div class="form-group col-md-5">
                <label for="inputTel">เป็นบุตรคนที่</label>
                <input type="text" class="form-control" id="s_child" placeholder="-" input name="s_child" value="<?php echo "$rs[s_child]"; ?>" onkeypress="isInputNumber1(event)" required>
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
                <input type="text" class="form-control" id="f_id" value="<?php echo "$rs[f_id]"; ?>" input name="f_id" onkeypress="isInputNumber(event)"  minlength="13" maxlength="13" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ชื่อ - สกุล(บิดา)</label>
                <input type="text" class="form-control" id="f_name" value="<?php echo "$rs[f_name]"; ?>" input name="f_name" onkeypress="isInputThai(event)"  required>
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">เบอร์ติดต่อ(บิดา)</label>
              <input type="text" class="form-control" id="f_tel" value="<?php echo "$rs[f_tel]"; ?>" input name="f_tel" onkeypress="isInputNumber(event)"  maxlength="10" minlength="10" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">รหัสประจำตัวประชาชน(มารดา)</label>
                <input type="text" class="form-control" id="m_id" value="<?php echo "$rs[m_id]"; ?>" input name="m_id" onkeypress="isInputNumber(event)"  minlength="13" maxlength="13" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ชื่อ - สกุล(มารดา)</label>
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
              <input type="text" class="form-control" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" input name="pa_id" onkeypress="isInputNumber(event)" minlength="13" maxlength="13" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputname">ชื่อ-สกุล(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_name" value="<?php echo "$rs[pa_name]"; ?>" input name="pa_name" onkeypress="isInputThai(event)" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ความสัมพันธ์</label>
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
                <input type="text" class="form-control" id="pa_tel" value="<?php echo "$rs[pa_tel]"; ?>" input name="pa_tel" onkeypress="isInputNumber(event)" maxlength="10" minlength="10" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">อาชีพ(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_metier" value="<?php echo "$rs[pa_metier]"; ?>" input name="pa_metier" onkeypress="isInputThai(event)" required>
              </div>
            </div>
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
<?php
} else {
    echo "<script> alert('Please Login');window.location = 'index.php';</script>";
    exit();
}
?>