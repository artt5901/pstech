<?php

	include "include/head_menu_admin.php";
	include "connect.php";
	
$pa_id = $_GET['pa_id'];
	
	$sql = "SELECT *
			FROM parent ";
		$result = mysqli_query($conn,$sql)
	 	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 	$rs = mysqli_fetch_array($result)
?>
<title><?php echo "$rs[pa_name]"; ?> Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
       <a class="nav-link active" href="showparent.php">แสดงข้อมูลผู้ปกครอง</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="showfather.php">แสดงข้อมูลบิดา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="showmathar.php">แสดงข้อมูลมารดา</a>
      </li>
      </li>
    </ul>
  </div>
  <div class="card text-left">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>ข้อมูลผู้ปกครอง : <?php echo "$rs[pa_name]"; ?></h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
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
                    <a class="btn btn-danger text-white" data-dismiss="modal">Close</a>
                    <div class="col"><button class="btn btn-success float-right">Yes</button></div>
                </div>
            </div>
        </div>
    </div>
            <div class="form-group ">
             
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
              <div class="col"><button class="col-12 btn btn-secondary btn-sm float-left" input type="button" onclick=window.history.back() >back</button></div>
              
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
