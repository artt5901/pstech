<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
	include "include/head_menu_admin.php";
	include "connect.php";
	
$s_username = $_GET['s_username'];
	
	$sql = "SELECT 
			student.s_username ,
			student.s_password , 
			student.s_name , 
			student.s_idcard ,
			student.s_address ,
			student.s_tel , 
			student.s_email , 
			student.s_year , 
			student.s_hbd , 
			student.s_brethren , 
			student.st_id , 
			student.s_child , 
			student.s_pic ,
			father.f_id , 
			father.f_name , 
			father.f_tel ,
			mathar.m_id , 
			mathar.m_name , 
			mathar.m_tel ,
			parent.pa_id , 
			parent.pa_name,  
			parent.pa_address , 
			parent.pa_tel , 
			parent.pa_relation , 
			parent.pa_metier ,
			class.class_name
			FROM student AS student
				
				INNER JOIN father AS father
					on (student.f_id = father.f_id)
				INNER JOIN mathar AS mathar
					on (student.m_id = mathar.m_id)
				INNER JOIN parent AS parent
					on (student.pa_id = parent.pa_id)
				INNER JOIN class as class
					on (student.class_id = class.b_id)
				WHERE s_username = '$s_username' ";
		$result = mysqli_query($conn,$sql)
	 	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 	$rs = mysqli_fetch_array($result)
?>
<title>Delete Student Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
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
    <h1>ลบข้อมูลนักศึกษา</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="delstudent.php">
      <input name="s_username" type="hidden" id="s_username" value="<?php echo "$rs[s_username]"; ?>" />
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
                    <p>คุณต้องการลบข้อมูลหรือไม่</p> 
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
                <input type="text" class="form-control" id="s_username"  placeholder="Username/รหัสนักศึกษา" input name="s_username" disabled="disabled" value="<?php echo "$rs[s_username]";?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">รหัสผ่าน</label>
                <input type="text" class="form-control" id="s_password" placeholder="Password" input name="s_password" disabled="disabled" value="<?php echo "$rs[s_password]";?>" required>
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">รหัสบัตรประชาชนประจำตัว</label>
              <input type="text" class="form-control" id="s_idcard" placeholder="รหัสบัตรประชาชนประจำตัว" input name="s_idcard" disabled="disabled" value="<?php echo "$rs[s_idcard]";?>" required>
            </div>
            <div class="form-group ">
              <label for="inputname">ชื่อ-สกุล</label>
              <input type="text" class="form-control" id="s_name" placeholder="Full Name" input name="s_name" disabled="disabled" value="<?php echo "$rs[s_name]";?>"  required>
            </div>
            <div class="form-group">
              <label for="inputAddress">ที่อยู่</label>
              <textarea class="form-control" id="s_address" input name="s_address" rows="3" disabled="disabled" required><?php echo "$rs[s_address]";?></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" id="s_tel" placeholder="0622915580" input name="s_tel" disabled="disabled" value="<?php echo "$rs[s_tel]";?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">E-Mail</label>
                <input type="text" class="form-control" id="s_email" placeholder="phasaktara@example.com" input name="s_email" disabled="disabled" value="<?php echo "$rs[s_email]";?>"  required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputTel">ปีที่เข้าศึกษา</label>
                <input type="text" class="form-control" id="s_year" placeholder="2563" input name="s_year" disabled="disabled" value="<?php echo "$rs[s_year]";?>"  required>
              </div>
              <div class="form-group col-md-5">
                <label for="example-date-input" class="col-9 col-form-label">วัน/เดือน/ปีเกิด</label>
                <input class="form-control" type="text"  id="s_hbd" input name="s_hbd" disabled="disabled" value="<?php echo "$rs[s_hbd]";?>"  required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">รูปประจำตัว</label>
                  <?php
		  			if("$rs[s_pic]" != ""){
			  		?>
              		<img src=<?php echo "./image/$rs[s_pic]";?> width "100" height="130" />
              		<?php
		  }
		  ?>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputBranch">เลือกสาขา</label>
                <input class="form-control" type="text"  id="class_name" input name="class_name" disabled="disabled" value="<?php echo "$rs[class_name]";?>"  required>
              </div>
            </div>
            <div class="form-row">
            
              <div class="form-group col-md-4">
                <label for="inputTel">มีพี่น้องทั้งหมดกี่คน</label>
                <input type="text" class="form-control" id="s_brethren" placeholder="-" input name="s_brethren" disabled="disabled" value="<?php echo "$rs[s_brethren]";?>"  required>
              </div>
              <div class="form-group col-md-5">
                <label for="inputTel">เป็นบุตรคนที่</label>
                <input type="text" class="form-control" id="s_child" placeholder="-" input name="s_child" disabled="disabled" value="<?php echo "$rs[s_child]";?>"  required>
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
                <input type="text" class="form-control" id="f_id" value="<?php echo "$rs[f_id]";?>" input name="f_id" disabled="disabled" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ชื่อ - สกุล(บิดา)</label>
                <input type="text" class="form-control" id="f_name" value="<?php echo "$rs[f_name]";?>" input name="f_name" disabled="disabled" required>
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">เบอร์ติดต่อ(บิดา)</label>
              <input type="text" class="form-control" id="f_tel" value="<?php echo "$rs[f_tel]";?>" input name="f_tel" disabled="disabled" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">รหัสประจำตัวประชาชน(มารดา)</label>
                <input type="text" class="form-control" id="m_id" value="<?php echo "$rs[m_id]";?>" input name="m_id" disabled="disabled" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ชื่อ - สกุล(มารดา)</label>
                <input type="text" class="form-control" id="m_name" value="<?php echo "$rs[m_name]";?>" input name="m_name" disabled="disabled" required>
              </div>
            </div>
            <div class="form-group ">
              <label for="inputname">เบอร์ติดต่อ(มารดา)</label>
              <input type="text" class="form-control" id="m_tel" value="<?php echo "$rs[m_tel]";?>" input name="m_tel" disabled="disabled" required>
            </div>
            <div class="form-group ">
              
              <label for="inputname">
                <h2>ข้อมูลผู้ปกครอง</h2>
              </label>
            </div>
            <div class="form-group ">
              <label for="inputname">รหัสประจำตัวประชาชน(ผู้ปกครอง)</label>
              <input type="text" class="form-control" id="pa_id" value="<?php echo "$rs[pa_id]";?>" input name="pa_id" disabled="disabled" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputname">ชื่อ-สกุล(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_name" value="<?php echo "$rs[pa_name]";?>" input name="pa_name" disabled="disabled" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">ความสัมพันธ์</label>
                <input type="text" class="form-control" id="pa_relation"value="<?php echo "$rs[pa_relation]";?>" input name="pa_relation" disabled="disabled" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">ที่อยู่(ผู้ปกครอง)</label>
              <textarea class="form-control" id="pa_address" input name="pa_address" rows="3" disabled="disabled" required> <?php echo "$rs[pa_address]";?> </textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">เบอร์ติดต่อ(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_tel" value="<?php echo "$rs[pa_tel]";?>" input name="pa_tel" disabled="disabled" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">อาชีพ(ผู้ปกครอง)</label>
                <input type="text" class="form-control" id="pa_metier" value="<?php echo "$rs[pa_metier]";?>" input name="pa_metier" disabled="disabled" required>
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
              <div class="col"><button class="col-6 btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#myModal" >ลบ</button></div>
              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="button" onclick=window.history.back() >ย้อนกลับ</button></div>
              
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
    echo "<script> alert('Please Login');window.location = 'index.html';</script>";
    exit();
}
?>
