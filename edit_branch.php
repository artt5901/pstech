<?php
	include "head_menu_admin.php";
	include "connect.php";
	
	$b_id = $_GET['b_id'];
	
	$sql = "SELECT * FROM branch WHERE b_id = '$b_id' ";
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
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
    <h1>แก้ไขข้อมูลสาขา</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editbranch.php">
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
                    <a class="btn btn-danger text-white" data-dismiss="modal">Close</a>
                    <div class="col"><button class="btn btn-success float-right">Yes</button></div>
                </div>
            </div>
        </div>
    </div>
        <div class="form-group">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1" >ชื่อสาขา</label>
          <input name="b_name" input type="text" class="form-control" id="b_name" placeholder="กรุณาใส่ชื่อสาขา" value="<?php echo "$rs[b_name]";?>" />
        </div>
          <div class="form-group">
    		<label for="exampleFormControlSelect1">เลือกแผนก</label>
            
    		<select class="form-control" select name="d_id" id="d_id">
  <?php
			echo "$rs[d_id]";
	$sql1="SELECT * FROM department";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo "<option value=\"$rs1[d_id]\" ";
		if ("$rs[d_id]" == "$rs1[d_id]") {echo 'selected';}
		echo ">$rs1[d_name]";
		echo "</option>\n";
	}
?>
   			 </select>
  		</div>
        </form>

        <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-success btn-sm float-right" data-toggle="modal" data-target="#myModal" >Save</button></div>
              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="button" onclick=window.history.back() >back</button></div>
              
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
