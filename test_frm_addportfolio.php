<?php
include "connect.php";
include "include/head_menu_admin.php";
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
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6">
          <!-- เปลี่ยนจากเดิม addtest.php มาใช้ addstudent.php แล้ว -->
          <form id="form1" name="form1" method="GET" action="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTel">รหัสนักศึกษา</label>
                <input type="text" class="form-control" id="s_username" input name="s_username" value="<?php if(isset($_GET['s_username'])){ echo $_GET['s_username'];} ?>"required> 
                <button class="btn btn-primary btn-sm float-right">ตรวจสอบ</button>
              </div>
            </div>
            <?php
				if(isset($_GET['s_username'])){
					$s_username = $_GET['s_username'];
					$check = "select * FROM student where s_username = '$s_username'";
					$check_run = mysqli_query($conn,$check);
					
					if(mysqli_num_rows($check_run) > 0)
					{
						foreach($check_run as $row)
						{
							//echo $row['s_name'];
							?>
                            <div class="form-row">
            				<div class="form-group col-md-6">
                			<label for="inputTel">ชื่อนักศึกษา</label>
                			<input type="text" class="form-control" id="s_name" input name="s_name"  value="<?php echo $row['s_name']; ?>" disabled="disabled" >
              				</div>
            				</div>
                            <?php
							
						}
						}
						else{
							?>
                            <div class="form-row">
            				<div class="form-group col-md-6">
                			<label for="inputTel">ชื่อนักศึกษา</label>
                			<input type="text" class="form-control" id="s_name" input name="s_name" disabled="disabled">
              				</div>
            				</div>
                            <?php
							
						}
				}
			
			?>
            </form>
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
                    <th scope="col">ชื่อผู้ใช้</th>
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
