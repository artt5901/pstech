<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
include "connect.php";

  $valid_status = $_SESSION["userlevel"];
  $valid_username = $_SESSION["valid_uname"];


  if ($valid_status == '2') {
    include "include/head_menu_admin.php";
  }
  $valid_username = $_SESSION["valid_uname"];


?>
<title>Add Portfolio Information To Phasaktara</title>
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
  <div class="card text-left">
    <div class="container-fluid h-100 bg-light text-dark">
      <div class="row justify-content-center align-items-center">
        <h1>เพิ่มข้อมูลผลงานนักศึกษา</h1>
      </div>
      <hr />
      <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <!-- เปลี่ยนจากเดิม addtest.php มาใช้ addstudent.php แล้ว -->
          <form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="addportfolio.php">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputUsername">ชื่อผลงาน</label>
                <input type="text" class="form-control" id="p_name" input name="p_name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">รายละเอียด</label>
              <textarea class="form-control" id="p_detail" input name="p_detail" rows="3" required></textarea>
            </div>           
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputTel">ปีการศึกษา</label>
                <input type="text" class="form-control" id="p_year" placeholder="เช่น 2564" input name="p_year" onkeypress="isInputNumber(event)" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputBranch">ผู้บันทึก</label>
                <select class="form-control" select name="t_id" id="t_id">
                 <?php
                    if ($valid_status == '2') {
                      $sql1 = "SELECT * FROM teacher WHERE t_username = '$valid_username'";
                      $result1 = mysqli_query($conn, $sql1);
                      while ($rs1 = mysqli_fetch_array($result1)) {
                        echo "<option value=$rs1[t_id]>$rs1[t_name]</option>";
                      }
                    }
                    ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">รหัสนักศึกษา</label>
                <input type="text" class="form-control" id="s_username" input name="s_username" onkeypress="isInputNumber(event)" required> 
              </div>
            </div>
            
            <div class="form-group">

              <div class="form-group text-center">

              </div>
              <div class="form-group">
                <div class="container">
                  <div class="row">
                    <div class="col"><button class="col-6 btn btn-primary btn-sm float-right" name="save_teacher">บันทึก</button></div>
                    <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="reset">ล้างข้อมูล</button></div>

                  </div>
                </div>
              </div>
            </div>
</form>
        </div>
      </div>
<div class="container" >
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="card text" style="max-width: 1200px;">
          <div class="row no-gutters">
            <div class="col-md-12">
            <table class="table table-hover" id="mytable" >
                <thead>
                  <tr class="bg-info text-white">
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">ชื่อ-สกุล</th>
                    <th scope="col">ปีเดือนวันที่เกิด</th>
                    <th scope="col">หมู่เรียน/สาขา</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  	$sql2 = "SELECT * FROM student AS student 
							INNER JOIN class AS class 
								on (student.class_id = class.class_id)";
					$result2 = mysqli_query($conn, $sql2)
  						or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                  	while ($rs2 = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                      <td><?php echo '<img src="image/' . $rs2['s_pic'] . '" width="50px;" height="50px;" alt="image">' ?></td>
                      <td><?php echo "$rs2[s_username]"; ?></td>
                      <td><?php echo "$rs2[s_name]"; ?></td>
                      <td><?php echo "$rs2[s_hbd]"; ?></td>
                      <td><?php echo "$rs2[class_name]"; ?></td>
                    </tr>
                  <?php
                  }
                  mysqli_close($conn);
                  ?>
                </tbody>
              </table>
	          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-center">
       ผู้ใช้งานระบบ 
    </div>
  </div>
</div>
<?php
} else {
    echo "<script> alert('Please Login');window.location = 'index.php';</script>";
    exit();
}
?>