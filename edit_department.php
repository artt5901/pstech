<?php
	include "head_menu_admin.php";
	include "connect.php";
	
	$d_id = $_GET['d_id'];
	
	$sql = "SELECT * FROM department WHERE d_id = '$d_id' ";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 $rs = mysqli_fetch_array($result)
?>
<title>Editor Position Information To Phasaktara</title>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showdepartment.php">แสดงข้อมูลแผนก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_adddepartment.php">เพิ่มข้อมูลแผนก</a>
      </li>
    </ul>
  </div>
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>แก้ไขข้อมูลตำแหน่ง</h1>    
  </div>
  <hr/>
          <form id="form1" name="form1" method="post" action="editdepartment.php">
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
                    <a class="btn btn-danger text-white" data-dismiss="modal">Close</a>
                    <div class="col"><button class="btn btn-success float-right">Yes</button></div>
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
          <input name="d_name" input type="text" class="form-control" id="d_name" value="<?php echo "$rs[d_name]";?>" />
          <input name="d_id" type="hidden" id="d_id" value="<?php echo"$rs[d_id]"; ?>" />
        </div>
           </form>
        <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-success btn-sm float-center" data-toggle="modal" data-target="#myModal">Edit</button></div>
              <div class="col"><button class="col-6 btn btn-danger btn-sm float-left" input type="button" onclick=window.history.back() >back</button></div>
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
