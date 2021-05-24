<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
	include "include/head_menu_admin.php";
	include "connect.php";
?>
<title>Add Course Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showcourse.php">แสดงข้อมูลรายวิชา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addcourse.php">เพิ่มข้อมูลรายวิชา</a>
      </li>
    </ul>
  </div>
  <div class="card text-left">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>เพิ่มข้อมูลรายวิชา</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="addcourse.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputnum">รหัสรายวิชา</label>
      <input type="text" class="form-control" id="c_num" placeholder="กรุณาป้อนรหัสรายวิชา" input name="c_num">
    </div>
    <div class="form-group col-md-6">
      <label for="inputname">ชื่อวิชา</label>
      <input type="text" class="form-control" id="c_name" placeholder="กรุณาป้อนชื่อวิชา" input name="c_name">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
        <label for="inputcredit">หน่วยกิต</label>
          <input name="c_credit" input type="text" class="form-control" id="c_credit" placeholder="กรุณาใส่จำนวนหน่วยกิต" />
        </div>
   <div class="form-group col-md-8">
                <label for="inputBranch">หมวดวิชา</label>
                <select class="form-control" select name="c_status" id="c_status" required>
                  <option value="0">ทั่วไป</option>
                  <option value="1">พาณิชยกรรม(หมวดแผนก)</option>
                  <option value="3">คอมพิวเตอร์ธุรกิจ(หมวดสาขา)</option>
                  <option value="4">การบัญชี(หมวดสาขา)</option>
                  <option value="5">ธุรกิจค้าปลีก(หมวดสาขา)</option>
                  <option value="2">อุตสาหกรรม(หมวดแผนก)</option>
                  <option value="6">ยานยนต์(หมวดสาขา)</option>
                  <option value="7">อิเล็คทรอนิกส์(หมวดสาขา)</option>
                </select>
                <br />
     </div>
     </div>
  <div class="form-group">
    <label for="inputot">รายละเอียดวิชา</label>
    <textarea class="form-control" id="c_ot" input name="c_ot" rows="5"></textarea>
  </div>

        <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-primary btn-sm float-right">บันทึก</button></div>
              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="reset" >ล้างข้อมูล</button></div>
              
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