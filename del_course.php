<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
	include "include/head_menu_admin.php";
	include "connect.php";
	
	$c_id = $_GET['c_id'];
	
	$sql = "SELECT * FROM course WHERE c_id = '$c_id' ";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 $rs = mysqli_fetch_array($result)
?>
<title>Del <?php echo "$rs[c_num]";?> Information To Phasaktara</title>
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
    <h1>ลบข้อมูลรายวิชา</h1>    
  </div>
  <hr/>
  <form id="form1" name="form1" method="post" action="delcourse.php">
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
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editcourse.php">
      <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>" />
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputnum">รหัสรายวิชา</label>
      <input type="text" class="form-control" id="c_num" input name="c_num" disabled="disabled" value="<?php echo "$rs[c_num]";?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputname">ชื่อวิชา</label>
      <input type="text" class="form-control" id="c_name" input name="c_name" disabled="disabled" value="<?php echo "$rs[c_name]";?>">
    </div>
  </div>
  <div class="form-group">
        <label for="inputcredit">หน่วยกิต</label>
          <input name="c_credit" input type="text" class="form-control" disabled="disabled" id="c_credit" value="<?php echo "$rs[c_credit]";?>" />
        </div>
  <div class="form-group">
    <label for="inputot">รายละเอียดวิชา</label>
    <textarea class="form-control" id="c_ot" input name="c_ot" rows="5" disabled="disabled"><?php echo "$rs[c_ot]";?></textarea>
    </form>
  </div>
        <div class="form-group text-center">

        </div>
<div class="form-group">
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-danger btn-sm float-center" data-toggle="modal" data-target="#myModal">ลบ</button></div>
              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="button" onclick=window.history.back() >ย้อนกลับ</button></div>
              
            </div>
          </div>
        </div>
    </div>
  </div>
</div>


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