<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])){
include "connect.php";

$valid_status = $_SESSION["userlevel"];
$valid_username = $_SESSION["valid_uname"];

  include "include/head_menu_admin.php";
?>
<title>Add Department Information To Phasaktara</title>
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
    <h1>เพิ่มข้อมูลปีการศึกษา</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form id="form1" name="form1" method="post" action="addyear.php">
        <div class="form-group">
        </div>
        <div class="form-group">
          <input name="y_number" input type="text" class="form-control" id="y_number" placeholder="กรอกข้อมูลปีการศึกษา" required/>
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
