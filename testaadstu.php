<?php
include "include/head_menu_admin.php";
include "connect.php";
?>
<title>Add Student Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showstudent.php">แสดงข้อมูลนักศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addstudent.php">เพิ่มข้อมูลนักศึกษา</a>
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
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="addtest2.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputUsername">รหัสนักศึกษา/ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="s_username" placeholder="Username/รหัสนักศึกษา" input name="s_username">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">รหัสผ่าน</label>
                <input type="password" class="form-control" id="s_password" placeholder="Password" input name="s_password">
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">รหัสบัตรประชาชนประจำตัว</label>
              <input type="text" class="form-control" id="s_idcard" placeholder="รหัสบัตรประชาชนประจำตัว" input name="s_idcard">
            </div>
            <div class="form-group ">
              <label for="inputname">ชื่อ-สกุล</label>
              <input type="text" class="form-control" id="s_name" placeholder="Full Name" input name="s_name">
            </div>
            <div class="form-group">
              <label for="inputAddress">ที่อยู่</label>
              <textarea class="form-control" id="s_address" input name="s_address" rows="3"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" id="s_tel" placeholder="0622915580" input name="s_tel">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">E-Mail</label>
                <input type="text" class="form-control" id="s_email" placeholder="phasaktara@example.com" input name="s_email">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputTel">ปีที่เข้าศึกษา</label>
                <input type="text" class="form-control" id="s_year" placeholder="2563" input name="s_year">
              </div>
              <div class="form-group col-md-9">
                <label for="example-date-input" class="col-9 col-form-label">วัน/เดือน/ปีเกิด</label>
   				 <input class="form-control" type="date" value="2011-08-19" id="s_hbd" input name="s_hbd">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">รูปประจำตัว</label>
              <input type="file" id="photo" name="s_image">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputBranch">เลือกสาขา</label>
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
               <div class="form-group col-md-6">
               <form id="form1" name="form1" method="post" action="">
  				 <label for="inputBranch">สถานะการศึกษา</label>
    			<select class="form-control" select name="st_id" id="st_id">
      			<option value="1">กำลังศึกษา</option>
      			<option value="2">สำเร็จการศึกษา</option>
                <option value="3">พ้นสภาพการเป็นนักศึกษา</option>               
      			</select>
   			 <br />
    		</div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-3">
               <label for="inputBranch">ระดับชั้น</label>
               <select class="form-control" select name="level_id" id="level_id">
                  <?php
                  $sql1 = "SELECT * FROM level";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[level_id]>$rs1[level_name]</option>";
                  }
                  ?>
                </select>
   			 <br />
    		</div>
            <div class="form-group col-md-4">
                <label for="inputTel">มีพี่น้องทั้งหมดกี่คน</label>
                <input type="text" class="form-control" id="s_brethren" placeholder="-" input name="s_brethren"> 
              </div>
              <div class="form-group col-md-5">
                <label for="inputTel">เป็นบุตรคนที่</label>
                <input type="text" class="form-control" id="s_child" placeholder="-" input name="s_child">
              </div>
            </div>
            
			<div class="form-group ">
              <label for="inputname">______________________________________________________________________</label>
               <label for="inputname"><h2>ข้อมูลบิดามารดา</h2></label>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">รหัสประจำตัวประชาชน(บิดา)</label>
                <input type="text" class="form-control" id="f_id" placeholder="กรอกรหัสประตัวประชาชน(บิดา)" input name="f_id">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ชื่อ - สกุล(บิดา)</label>
                <input type="text" class="form-control" id="f_name" placeholder="กรอกชื่อ - สกุล(บิดา)" input name="f_name">
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">เบอร์ติดต่อ(บิดา)</label>
              <input type="text" class="form-control" id="f_tel" placeholder="กรอกเบอร์ติดต่อ(บิดา)" input name="f_tel">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">รหัสประจำตัวประชาชน(มารดา)</label>
                <input type="text" class="form-control" id="m_id" placeholder="กรอกรหัสประตัวประชาชน(มารดา)" input name="m_id">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ชื่อ - สกุล(มารดา)</label>
                <input type="text" class="form-control" id="m_name" placeholder="กรอกชื่อ - สกุล(มารดา)" input name="m_name">
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">เบอร์ติดต่อ(มารดา)</label>
              <input type="text" class="form-control" id="m_tel" placeholder="กรอกเบอร์ติดต่อ(มารดา)" input name="m_tel">
            </div>
            <div class="form-group ">
              <label for="inputname">______________________________________________________________________</label>
               <label for="inputname"><h2>ข้อมูลผู้ปกครอง</h2></label>
            </div>
            <div class="form-group ">
              <label for="inputname">รหัสประจำตัวประชาชน(ผู้ปกครอง)</label>
              <input type="text" class="form-control" id="pa_id" placeholder="กรอกรหัสประจำตัวประชาชน(ผู้ปกครอง)" input name="pa_id">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputname">ชื่อ-สกุล(ผู้ปกครอง)</label>
              <input type="text" class="form-control" id="pa_name" placeholder="กรอกชื่อ-สกุล(ผู้ปกครอง)" input name="pa_name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">ความสัมพันธ์</label>
                <input type="text" class="form-control" id="pa_relation" placeholder="กรอกสถานะความสัมพันธ์" input name="pa_relation">
              </div>
             </div>
            <div class="form-group">
              <label for="inputAddress">ที่อยู่(ผู้ปกครอง)</label>
              <textarea class="form-control" id="pa_address" input name="pa_address" rows="3"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">เบอร์ติดต่อ(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_tel" placeholder="กรอกเบอร์ติดต่อผู้ปกครอง" input name="pa_tel">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">อาชีพ(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_metier" placeholder="กรอกอาชีพ(ผู้ปกครอง)" input name="pa_metier">
              </div>
            </div>
             <div class="form-group">
              
            <div class="form-group text-center">

            </div>
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="col"><button class="col-6 btn btn-primary btn-sm float-right" name="save_teacher">Save</button></div>
                  <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="reset">Reset</button></div>

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