<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
	include "include/head_menu_admin.php";
	include "connect.php";
	$valid_username = $_SESSION["valid_uname"];
	$p_id = $_GET['p_id'];
	
	$sql = "SELECT *
			FROM teacher , portfolio inner join student on (portfolio.s_username = student.s_username)
				WHERE p_id = '$p_id' AND t_username = '$valid_username'";
		$result = mysqli_query($conn,$sql)
	 	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 	$rs = mysqli_fetch_array($result)
?>
<title>Del Portfolio Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showportfolio.php">แสดงผลงานนักศึกษา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addportfolio.php">เพิ่มผลงานนักศึกษา</a>
      </li>
    </ul>
  </div>
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>ลบข้อมูลผลงานนักศึกษา</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
      <form id="form1" name="form1" method="post" action="delportfolio.php">
      <input name="p_id" type="hidden" id="p_id" value="<?php echo "$rs[p_id]"; ?>" />
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
              <div class="form-group col-md-12">
                <label for="inputUsername">ชื่อผลงาน</label>
                <input type="text" class="form-control" id="p_name" input name="p_name" value="<?php echo "$rs[p_name]"; ?>" disabled="disabled" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">รายละเอียด</label>
              <textarea class="form-control" id="p_detail" input name="p_detail" rows="3" disabled="disabled" required><?php echo "$rs[p_detail]"; ?></textarea>
            </div>           
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputTel">ปีการศึกษา</label>
                <input type="text" class="form-control" id="p_year" input name="p_year" value="<?php echo "$rs[p_year]"; ?>" disabled="disabled" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputBranch">ผู้บันทึก</label>
                <select class="form-control" select name="t_id" id="t_id" disabled="disabled" required>
                 <?php
                  echo "$rs[t_id]";
                  $sql1 = "SELECT * FROM teacher WHERE t_username = '$valid_username'";
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
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">รหัสนักศึกษา</label>
                <input type="text" class="form-control" id="s_username" input name="s_username" value="<?php echo "$rs[s_username]"; ?>" disabled="disabled" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputTel">ชื่อนักศึกษา</label>
                <input type="text" class="form-control" id="s_name" input name="s_name" value="<?php echo "$rs[s_name]"; ?>" disabled="disabled" required>
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
    echo "<script> alert('Please Login')window.location = 'index.php';</script>";
    exit();
}
?>