<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2'){
	include "include/head_menu_admin.php";
	include "connect.php";
?>
<title>Add Branch Information To Phasaktara</title>
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
    <h1>เพิ่มข้อมูลสาขา</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="addbranch.php">
        <div class="form-group">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1" >ชื่อสาขา</label>
          <input name="b_name" input type="text" class="form-control" id="b_name" placeholder="กรุณาใส่ชื่อสาขา" />
        </div>
          <div class="form-group">
    		<label for="exampleFormControlSelect1">เลือกแผนก</label>
            
    		<select class="form-control" select name="d_id" id="d_id">
            <?php
	$sql1="SELECT * FROM department";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo "<option value=$rs1[d_id]>$rs1[d_name]</option>";
	}
?>
   			 </select>
  		</div>

        <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-primary btn-sm float-right">บันทึก</button></div>
              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="reset" >ล้างข้อมูล</button></div>
              
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