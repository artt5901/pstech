<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == 3) {
  include "connect.php";
  include "include/head_menu_grade.php";

 $classroom_id = $_GET['classroom_id'];

		$sql = "SELECT * FROM grade AS grade 
		INNER JOIN class AS class ON (grade.class_id = class.class_id)
		INNER JOIN course AS course ON (grade.c_id = course.c_id)
		INNER JOIN teacher AS teacher ON (grade.t_id = teacher.t_id)
		inner join year as year on (grade.y_id = year.y_id)
				WHERE classroom_id = '$classroom_id' ";
$result = mysqli_query($conn, $sql)
  or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
$rs = mysqli_fetch_array($result)
?>
<title><?php echo "$rs[c_name]"; ?> Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      	<li class="nav-item">
        <a class="nav-link active" href="showinputgrade.php">แสดงผลการเรียน</a>
      </li>
    </ul>
  </div>
  <div class="card text-left">
    <div class="container-fluid h-100 bg-light text-dark">
      <div class="row justify-content-center align-items-center">
        <h1>วิชา <?php echo "$rs[c_name]"; ?> <?php echo "$rs[c_num]"; ?></h1>
      </div>
      <hr />
      <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6">
          <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="next_grade.php">
          <input name="classroom_id" type="hidden" id="classroom_id" value="<?php echo "$rs[classroom_id]"; ?>" />
          <input name="class_id" type="hidden" id="class_id" value="<?php echo "$rs[class_id]"; ?>" />
          <input name="y_id" type="hidden" id="y_id" value="<?php echo "$rs[y_id]"; ?>" />
          <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>" />
          <input name="class_id" type="hidden" id="class_id" value="<?php echo "$rs[class_id]"; ?>" />
          <input name="t_id" type="hidden" id="t_id" value="<?php echo "$rs[t_id]"; ?>" />
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
                    <p>คุณต้องการแก้ไขเกรดวิชา <?php echo "$rs[c_name]"; ?> หรือไม่?</p>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-danger text-white" data-dismiss="modal">ปิด</a>
                    <div class="col"><button class="btn btn-success float-right">ตกลง</button></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group ">
                <label for="inputBranch">หมู่เรียน</label>
                <input type="text" class="form-control" id="class_name" value="<?php echo "$rs[class_name]"; ?>" input name="class_name" disabled="disabled" required>
            </div>
            <div class="form-row">
              	<div class="form-group col-md-2">
              <label for="inputname">รหัสวิชาวิชา</label>
              <input type="text" class="form-control" id="c_num" value="<?php echo "$rs[c_num]"; ?>" input name="c_name" disabled="disabled" required>
            	</div>
                <div class="form-group col-md-3">
              <label for="inputname">รายวิชา</label>
              <input type="text" class="form-control" id="c_name" value="<?php echo "$rs[c_name]"; ?>" input name="c_name" disabled="disabled" required>
            	</div>
           	 	<div class="form-group col-md-3">
              <label for="inputTel">ปีการศึกษาและภาคเรียน</label>
                <input type="text" class="form-control" id="classroom_year" value="<?php echo "$rs[y_number]"; ?>" input name="classroom_year" disabled="disabled" required>
            	</div>
                <div class="form-group col-md-4">
              <label for="inputname">อาจารย์ผู้สอน</label>
              <input type="text" class="form-control" id="t_name" value="<?php echo "$rs[t_name]"; ?>" input name="t_name" disabled="disabled" required>
            	</div>
            </div>
            
      </form>
      <div class="form-group text-center">

      </div>
      <div class="form-group">
        <div class="container">
          <div class="row">
            <div class="col"><button class="col-6 btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal" >ต่อไป</button></div>
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
  echo "<script> alert('Please Login');window.location = 'index.html';</script>";
  exit();
}
?>