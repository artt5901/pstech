<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
	include "include/head_menu_admin.php";
	include "connect.php";
	
	$class_id = $_GET['class_id'];
	
	$sql = "SELECT class.class_id , class.class_name , branch.b_name
			FROM class AS class
				INNER JOIN branch AS branch ON (class.b_id = branch.b_id)
				WHERE class_id = '$class_id' ";
		$result = mysqli_query($conn,$sql)
	 	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 	$rs = mysqli_fetch_array($result)
?>
<title>Delete Class Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showclass.php">แสดงข้อมูลหมู่เรียน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addclass.php">เพิ่มข้อมูลหมู่เรียน</a>
      </li>
    </ul>
  </div>
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>ลบข้อมูลหมู่เรียน</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
      <form id="form1" name="form1" method="post" action="delclass.php">
      <input name="class_id" type="hidden" id="class_id" value="<?php echo "$rs[class_id]"; ?>" />
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
        <div class="form-group">
        </div>
              <div class="form-group">
                <label for="inputBranch">สาขา</label>
                <input name="b_name" input type="text" class="form-control" id="b_name" disabled="disabled" value="<?php echo "$rs[b_name]";?>" />
              </div>
        <div class="form-group">
          <label for="inputclass">รหัสหมู่เรียน</label>
          <input name="class_name" input type="text" class="form-control" id="class_name" disabled="disabled" value="<?php echo "$rs[class_name]";?>" />
          <label class="text-danger" for="inputclass">*หมายเหตุ*</label>
          <label class="text-danger" for="inputclass">รหัสหมู่เรียนประกอบไปด้วย ปีที่เข้าศึกษา + รหัสแผนก + รหัสสาขา + ชื่อสาขา</label>
          <label class="text-danger" for="inputclass">แผนก/สาขา</label>
          <label class="text-danger" for="inputclass">0201 - คอมพิวเตอร์ธุรกิจ | 0202 - การบัญชี</label>
          <label class="text-danger" for="inputclass">0103 - ยานยนต์ | 0104 - อิเล็คทรอนิกส์</label>
          <label class="text-danger" for="inputclass">0205 - ธุรกิจค้าปลีกสมัยใหม่| 0206 - ร้านอาหารและบริการ</label>
          <label class="text-danger" for="inputclass">0207 - เทคโนโลยีดิจิทัล | 0208 - การบัญชี(ปวส)</label>
          <label class="text-danger" for="inputclass">0109 - อิเล็คทรอนิกส์(ปวส)| 0110 เทคนิคยานยนต์</label>
          <label class="text-danger" for="inputclass">0211 - ร้านอาหารและบริการ(ปวส)| 0212 - ธุรกิจค้าปลีกสมัยใหม่(ปวส)</label>
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