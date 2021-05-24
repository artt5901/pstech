<?php
	session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])){
include "connect.php";

$valid_status = $_SESSION["userlevel"];
$valid_username = $_SESSION["valid_uname"];

  include "include/head_menu_admin.php";
	$y_id = $_GET['y_id'];
	
	$sql = "SELECT * FROM year WHERE y_id = '$y_id' ";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 $rs = mysqli_fetch_array($result)
?>
<title>Editor <?php echo "$rs[y_number]";?> Information To Phasaktara</title>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showyear.php">แสดงปีการศึกษา/ภาคเรียน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addyear.php">เพิ่มปีการศึกษา/ภาคเรียน</a>
      </li>
    </ul>
  </div>
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>แก้ไขปีการศึกษา/ภาคเรียน</h1>    
  </div>
  <hr/>
          <form id="form1" name="form1" method="post" action="edityear.php">
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

      </div>

  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="form-group">
        </div>
        <div class="form-group">
          <input name="y_number" input type="text" class="form-control" id="y_number" value="<?php echo "$rs[y_number]";?>" />
          <input name="y_id" type="hidden" id="y_id" value="<?php echo"$rs[y_id]"; ?>" />
        </div>
           </form>
        <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-success btn-sm float-center" data-toggle="modal" data-target="#myModal">บันทึก</button></div>
              <div class="col"><button class="col-6 btn btn-danger btn-sm float-left" input type="button" onclick=window.history.back() >ย้อนกลับ</button></div>
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
      echo "<script> alert('Please Login');window.location = 'index.php';</script>";
      exit();
    }
      ?>