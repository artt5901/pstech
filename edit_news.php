<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])){

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

$n_id = $_GET['n_id'];
	
	$sql = "SELECT * FROM news WHERE n_id = '$n_id' ";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 $rs = mysqli_fetch_array($result)
?>
<title>ข่าวสาร <?php echo "$rs[n_name]"; ?> Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="shownews.php">แสดงข้อมูลข่าวสาร</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addnews.php">เพิ่มข้อมูลข่าวสาร</a>
      </li>
    </ul>
  </div>
  <div class="card text-left">
    <div class="container-fluid h-100 bg-light text-dark">
      <div class="row justify-content-center align-items-center">
        <h1>แก้ไขข้อมูลข่าวสาร</h1>
      </div>
      <hr />
      <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editnews.php">
            <input name="n_id" type="hidden" id="n_id" value="<?php echo "$rs[n_id]"; ?>" />
            <input name="n_pic" type="hidden" id="n_pic" value="<?php echo "$rs[n_pic]"; ?>" />
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
                <label for="inputUsername">ชื่อข่าวสาร</label>
                <input type="text" class="form-control" id="n_name" value="<?php echo "$rs[n_name]"; ?>" input name="n_name" required>
              </div>
              <div class="form-group col-md-5">
                <label for="inputBranch">ประเภทข่าว</label>
                <select class="form-control" select name="n_status" id="n_status" required>
                  <!-- <option value="">-- สถานะการศึกษา --</option>
                <option value="1">กำลังศึกษา</option>
                  <option value="2">สำเร็จการศึกษา</option>
                  <option value="3">พ้นสภาพการเป็นนักศึกษา</option> -->
                  <?php
                  $sql1 = "SELECT n_status FROM news";
                  $result1 = mysqli_query($conn, $sql1);
                  echo "<option selected";
                  if ("$rs[n_status]" == 1) {
                    echo "value=\"1\" >ข่าวประชาสัมพันธ์</option>";
                    echo "<option value=\"2\" >ข่าวสารทั่วไป</option>";
                    echo "<option value=\"3\" >กิจกรรม</option>";
                  } elseif ("$rs[n_status]" == 2) {
                    echo "value=\"2\">ข่าวสารทั่วไป</option>";
                    echo "<option value=\"1\" >ข่าวประชาสัมพันธ์</option>";
                    echo "<option value=\"3\" >กิจกรรม</option>";
                  } else {
                    echo "value=\"3\">กิจกรรม</option>";
                    echo "<option value=\"1\" >ข่าวประชาสัมพันธ์</option>";
                    echo "<option value=\"2\" >ข่าวสารทั่วไป</option>";
                  }
                  ?>

                </select>

                <br />
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">รายละเอียด</label>
              <textarea class="form-control" id="n_ot" input name="n_ot" rows="8" required><?php echo "$rs[n_ot]"; ?></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="example-date-input" class="col-9 col-form-label">วันที่ประชาสัมพันธ์</label>
                <input class="form-control" type="date" id="n_date" input name="n_date" value="<?php echo "$rs[n_date]"; ?>" required>
              </div>
              <div class="form-group col-md-5">
                <label for="example-date-input" class="col-9 col-form-label">วันที่หมดอายุข่าว</label>
                <input class="form-control" type="date" id="n_ex" input name="n_ex" value="<?php echo "$rs[n_ex]"; ?>" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-7">
                <label for="example-date-input" class="col-9 col-form-label">ลิงค์สำหรับชมภาพกิจกรรม</label>
                <input class="form-control" type="text" id="n_link" input name="n_link"  value="<?php echo "$rs[n_link]"; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">รูปประชาสัมพันธ์</label>
               <?php
              if ("$rs[n_pic]" != "") {
              ?>
                <img src=<?php echo "./image/$rs[n_pic]"; ?> width="500" height="100" />
              <?php
              }
              ?>
              <input type="file" id="photo" name="n_image">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputBranch">ผู้ประกาศ</label>
                <select class="form-control" select name="t_id" id="t_id" required>
                  <?php
                  echo "$rs[t_id]";
                  $sql1 = "SELECT * FROM teacher";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=\"$rs1[t_id]\" ";
                    if ("$rs[t_id]" == "$rs1[t_id]") {
                      echo 'selected';
                    }
                    echo ">$rs1[t_name]";
                    echo "</option>\n";
                  }
                  ?>
                </select>
              </div>
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