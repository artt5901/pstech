<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2') {
  include "include/head_menu_admin.php";
  include "connect.php";

  $b_id = $_GET['b_id'];

  $sql = "SELECT *
		FROM branch AS b1 INNER JOIN department AS b2 on (b1.d_id = b2.d_id)
					WHERE b_id = '$b_id'";
  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs = mysqli_fetch_array($result)
?>
  <title>Edit Branch Information To Phasaktara</title>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="showbranch.php">แสดงข้อมูลสาขา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addbranch.php">เพิ่มข้อมูลสาขา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showdepartment.php">แสดงข้อมูลแผนก</a>
        </li>
      </ul>
    </div>
    <div class="card text-left">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          <h1>ลบข้อมูลสาขา</h1>
        </div>
        <hr />
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="delbranch.php">
              <input name="b_id" type="hidden" id="b_id" value="<?php echo "$rs[b_id]"; ?>" />
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
              <div class="form-group">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">ชื่อสาขา</label>
                <input name="b_name" input type="text" class="form-control" id="b_name" disabled="disabled" value="<?php echo "$rs[b_name]"; ?>" />
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">แผนก</label>
                <input name="d_name" input type="text" class="form-control" id="d_name" disabled="disabled" value="<?php echo "$rs[d_name]"; ?>" />
              </div>
            </form>

            <div class="form-group text-center">

            </div>
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="col"><button class="col-6 btn btn-success btn-sm float-right" data-toggle="modal" data-target="#myModal">ลบ</button></div>
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