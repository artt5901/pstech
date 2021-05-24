<?php
	include "include/head_menu_admin.php";
	include "connect.php";
	
	$t_id = $_GET['t_id'];
	
	$sql = "SELECT * FROM teacher WHERE t_id = '$t_id' ";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 $rs = mysqli_fetch_array($result)
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
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="addteacher.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername">ชื่อผู้ใช้</label>
      <input type="text" class="form-control" id="t_username" placeholder="Username" input name="t_username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">รหัสผ่าน</label>
      <input type="password" class="form-control" id="t_password" placeholder="Password" input name="t_password">
    </div>
  </div>
  <div class="form-group ">
    <label for="inputname">ชื่อ-สกุล</label>
    <input type="text" class="form-control" id="t_name" placeholder="Full Name" input name="t_name">
  </div>
  <div class="form-group">
    <label for="inputAddress">ที่อยู่</label>
    <textarea class="form-control" id="t_address" input name="t_address" rows="3"></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTel">เบอร์ติดต่อ</label>
      <input type="text" class="form-control" id="t_tel" placeholder="0622915580" input name="t_tel">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">E-Mail</label>
      <input type="text" class="form-control" id="t_email" placeholder="phasaktara@example.com" input name="t_email">
    </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputTel">ปีที่เข้าสอน</label>
      <input type="text" class="form-control" id="t_year" placeholder="2563" input name="t_year">
    </div>
    <div class="form-group col-md-9">
      <label for="inputEnd">สถานที่จบการศึกษา</label>
      <input type="text" class="form-control" id="t_end" placeholder="มหาวิทยาลัยราชภัฏเพชรบูรณ์" input name="t_end">
    </div>
  </div>
    <div class="form-group ">
    <label for="inputedu">ระดับการศึกษา</label>
    <input type="text" class="form-control" id="t_educa" placeholder="ปริญญาตรี เอกเทคโนโลยีสารสนเทศและการสื่อสาร" input name="t_educa">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">รูปประจำตัว</label>
    <input type="file" id="photo" name="photo">
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputBranch">เลือกสาขา</label>
      <select class="form-control" select name="b_id" id="b_id">
            <?php
	$sql1="SELECT * FROM branch";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo "<option value=$rs1[b_id]>$rs1[b_name]</option>";
	}
?>
   			 </select>
    </div>
    <div class="form-group col-md-7">
      <label for="inputPosition">เลือกตำแหน่ง</label>
      <select class="form-control" select name="po_id" id="po_id">
            <?php
	$sql1="SELECT * FROM position";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo "<option value=$rs1[po_id]>$rs1[po_name]</option>";
	}
?>
   			 </select>
    </div>
  </div>
        <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-primary btn-sm float-right">Save</button></div>
              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="reset" >Reset</button></div>
              
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
