<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
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
$sql = "SELECT *
				FROM teacher AS d1 
				INNER JOIN position AS d2 
					on (d1.po_id = d2.po_id)
					INNER JOIN branch AS d3 
						on (d1.b_id = d3.b_id) 
						WHERE t_username = '$valid_username' ";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)
?>
<title>Edit <?php echo "$rs[t_name]"; ?> Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
    </ul>
  </div>
  <div class="card text-left">
    <div class="container-fluid h-100 bg-light text-dark">
      <div class="row justify-content-center align-items-center">

      </div>
      <hr />
      <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editmeteacher.php">
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
                <input type="text" class="form-control" id="t_username" placeholder="Username" input name="t_username"  value="<?php echo "$rs[t_username]"; ?>" disabled="disabled">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">รหัสผ่าน</label>
                <input type="password" class="form-control" id="t_password" placeholder="Password" input name="t_password" value="<?php echo "$rs[t_password]"; ?>" onkeypress="isInputPassword(event)">
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">ชื่อ-สกุล</label><span style="color:red; font-size : 12px;">*ภาษาไทย</span>
              <input type="text" class="form-control" id="t_name" placeholder="Full Name" input name="t_name" value="<?php echo "$rs[t_name]"; ?>" onkeypress="isInputThai(event)">
            </div>
            <div class="form-group">
              <label for="inputAddress">ที่อยู่</label>
              <textarea class="form-control" id="t_address" input name="t_address" rows="3"><?php echo "$rs[t_address]"; ?></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" id="t_tel" placeholder="0622915580" input name="t_tel" value="<?php echo "$rs[t_tel]"; ?>" onkeypress="isInputNumber(event)" maxlength="10" minlength="10">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">E-Mail</label>
                <input type="email" class="form-control" id="t_email" placeholder="phasaktara@example.com" input name="t_email" value="<?php echo "$rs[t_email]"; ?>" >
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputTel">ปีที่เข้าสอน</label>
                <input type="text" class="form-control" id="t_year" placeholder="เช่น 2563" input name="t_year" value="<?php echo "$rs[t_year]"; ?>" disabled="disabled">
              </div>
              <div class="form-group col-md-9">
                <label for="inputEnd">สถานที่จบการศึกษา</label>
                <input type="text" class="form-control" id="t_end" placeholder="" input name="t_end" value="<?php echo "$rs[t_end]"; ?>" >
              </div>
            </div>
            <div class="form-group ">
              <label for="inputedu">ระดับการศึกษา</label><span style="color:red; font-size : 12px;">*ระบุระดับการศึกษา และสาขาที่สำเร็จการศึกษา</span>
              <input type="text" class="form-control" id="t_educa" placeholder="" input name="t_educa" value="<?php echo "$rs[t_educa]"; ?>" onkeypress="isInputThai(event)">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">รูปประจำตัว</label>
              <?php
              if ("$rs[t_pic]" != "") {
              ?>
                <img src=<?php echo "./image/$rs[t_pic]"; ?> width="200" height="220" />
              <?php
              }
              ?>
              <input type="file" id="photo" name="t_image">
            </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername">สาขา</label>
      <input type="text" class="form-control" id="b_name" placeholder="Username" input name="b_name" disabled="disabled" value="<?php echo "$rs[b_name]";?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">ตำแหน่ง</label>
      <input type="text" class="form-control" id="b_name" placeholder="Password" input name="b_name" disabled="disabled" value="<?php echo "$rs[po_name]";?>">
    </div>
  </div>
          </form>
          <div class="form-group text-center">

          </div>
          <div class="form-group">
            <div class="container">
              <div class="row">
                <div class="col"><button class="col-12 btn btn-success btn-sm float-right" data-toggle="modal" data-target="#myModal">บันทึก</button></div>

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