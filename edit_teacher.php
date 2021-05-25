<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
include "include/head_menu_admin.php";
include "connect.php";

$t_id = $_GET['t_id'];

$sql = "SELECT * FROM teacher WHERE t_id = '$t_id' ";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)
?>
<title>Edit <?php echo "$rs[t_name]"; ?> Information To Phasaktara</title>
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
        <h1>แก้ไขข้อมูลอาจารย์</h1>
      </div>
      <hr />
      <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editteacher.php">
            <input name="t_id" type="hidden" id="t_id" value="<?php echo "$rs[t_id]"; ?>" />
            <input name="t_pic" type="hidden" id="t_pic" value="<?php echo "$rs[t_pic]"; ?>" />
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
                <label for="inputUsername">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="t_username" placeholder="Username" input name="t_username"  value="<?php echo "$rs[t_username]"; ?>" onkeypress="isInputUsername(event)">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">รหัสผ่าน</label><span style="color:red">*กรอกได้แค่ตัวอักษร A-Z,a-z และ 0-9 เท่านั้น</span>
                <input type="password" class="form-control" id="t_password" placeholder="Password" input name="t_password" value="<?php echo "$rs[t_password]"; ?>" onkeypress="isInputPassword(event)">
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">ชื่อ-สกุล</label>
              <input type="text" class="form-control" id="t_name" placeholder="Full Name" input name="t_name" value="<?php echo "$rs[t_name]"; ?>" onkeypress="isInputThai(event)">
            </div>
            <div class="form-group">
              <label for="inputAddress">ที่อยู่</label>
              <textarea class="form-control" id="t_address" input name="t_address" rows="3"><?php echo "$rs[t_address]"; ?></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" id="t_tel" placeholder="0622915580" input name="t_tel" value="<?php echo "$rs[t_tel]"; ?>" maxlength="10" minlength="10" onkeypress="isInputNumber(event)">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">E-Mail</label>
                <input type="email" class="form-control" id="t_email" placeholder="phasaktara@example.com" input name="t_email" value="<?php echo "$rs[t_email]"; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputTel">ปีที่เข้าสอน</label>
                <input type="text" class="form-control" id="t_year" placeholder="" input name="t_year" value="<?php echo "$rs[t_year]"; ?>" onkeypress="isInputNumber(event)">
              </div>
              <div class="form-group col-md-9">
                <label for="inputEnd">สถานที่จบการศึกษา</label>
                <input type="text" class="form-control" id="t_end" placeholder="" input name="t_end" value="<?php echo "$rs[t_end]"; ?>" >
              </div>
            </div>
            <div class="form-group ">
              <label for="inputedu">ระดับการศึกษา</label>
              <input type="text" class="form-control" id="t_educa" placeholder="" input name="t_educa" value="<?php echo "$rs[t_educa]"; ?>" onkeypress="isInputThai(event)">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">รูปประจำตัว</label>
              <?php
              if ("$rs[t_pic]" != "") {
              ?>
                <img src=<?php echo "./image/$rs[t_pic]"; ?> width="200" height="250" />
              <?php
              }
              ?>
              <input type="file" id="photo" name="t_image">
            </div>
            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="inputBranch">เลือกสาขา</label>
                <select class="form-control" select name="b_id" id="b_id">
                  <?php
                  echo "$rs[b_id]";
                  $sql1 = "SELECT * FROM branch";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=\"$rs1[b_id]\" ";
                    if ("$rs[b_id]" == "$rs1[b_id]") {
                      echo 'selected';
                    }
                    echo ">$rs1[b_name]";
                    echo "</option>\n";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-7">
                <label for="inputPosition">เลือกตำแหน่ง</label>
                <select class="form-control" select name="po_id" id="po_id">
                  <?php
                  echo "$rs[po_id]";
                  $sql1 = "SELECT * FROM position";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=\"$rs1[po_id]\" ";
                    if ("$rs[po_id]" == "$rs1[po_id]") {
                      echo 'selected';
                    }
                    echo ">$rs1[po_name]";
                    echo "</option>\n";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputBranch">สถานะ</label>
                <select class="form-control" select name="t_status" id="t_status" required>
                <?php
                  $sql1 = "SELECT t_status FROM teacher";
                  $result1 = mysqli_query($conn, $sql1);
                  echo "<option selected";
                  if ("$rs[t_status]" == 1) {
                    echo "<option value=\"1\" >อาจารย์</option>";
                    echo "<option value=\"2\" >ผู้ดูแลระบบ</option>";
                    echo "<option value=\"3\" >ผู้ดูแลผลการเรียน</option>";
                  } elseif ("$rs[t_status]" == 2) {
                    echo "<option value=\"2\" >ผู้ดูแลระบบ</option>";
                    echo "<option value=\"1\" >ครู/อาจารย์</option>";
                    echo "<option value=\"3\" >ผู้ดูแลผลการเรียน</option>";
                  }elseif ("$rs[t_status]" == 3) {
                    echo "<option value=\"3\" >ผู้ดูแลผลการเรียน</option>";
                    echo "<option value=\"2\" >ผู้ดูแลระบบ</option>";
                    echo "<option value=\"1\" >ครู/อาจารย์</option>";
                  }
                  ?>
                </select>
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