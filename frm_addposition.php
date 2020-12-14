<?php
	include "head_menu_admin.php";
?>
<title>Add Position Information To Phasaktara</title>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="showposition.php">แสดงข้อมูลตำแหน่ง</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frm_addposition.php">เพิ่มข้อมูลตำแหน่ง</a>
      </li>
    </ul>
  </div>
  <div class="card text-center">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>เพิ่มข้อมูลตำแหน่ง</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form id="form1" name="form1" method="post" action="addposition.php">
        <div class="form-group">
        </div>
        <div class="form-group">
          <input name="po_name" input type="text" class="form-control" id="po_name" placeholder="กรุณาใส่ชื่อตำแหน่ง" />
        </div>
        <div class="form-group text-center">

        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col"><button class="col-6 btn btn-primary btn-sm float-right">Save</button></div>
              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-left" input type="reset" >Reset</button></div>
              
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
