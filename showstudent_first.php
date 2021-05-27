<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2') {
  include "connect.php";
  include "include/head_menu_admin.php";
  $s_year = $_GET['s_year'];
  $sql2 = "SELECT *
				FROM student WHERE s_year = '$s_year' ";
  $result2 = mysqli_query($conn, $sql2)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  $rs2 = mysqli_fetch_array($result2)
?>

  <head>
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
  </head>



  <title>Student Information To Phasaktara</title>


  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="showstudent_one.php">แสดงข้อมูลนักศึกษา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addstudent.php">เพิ่มข้อมูลนักศึกษา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showsuccess_one.php">แสดงข้อมูลนักศึกษาที่ต้องการสำเร็จการศึกษา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show_successstudent.php">นักศึกษาที่สำเร็จการศึกษา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show_outstudent.php">นักศึกษาที่ลาออก</a>
        </li>
      </ul>
    </div>
    <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="successstudent.php">
      <input name="s_year" type="hidden" id="s_year" value="<?php echo "$rs2[s_year]"; ?>" />
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
              <p>คุณต้องการให้นักศึกษาปี : <?php echo "$rs2[s_year]"; ?> ทั้งหมด</p>
              <p>สำเร็จการศึกษาหรือไม่</p>
            </div>
            <div class="modal-footer">
              <a class="btn btn-danger text-white" data-dismiss="modal">ปิด</a>
              <div class="col"><button class="btn btn-success float-right">ใช่</button></div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="container">
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="card text" style="max-width: 1200px;">
          <div class="row no-gutters">
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr class="bg-secondary text-white">
                    <th scope="col">ปีการศึกษา : <?php echo "$rs2[s_year]"; ?></th>
                  </tr>
                </thead>
                <table class="table table-hover" id="mytable-class">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">สาขา</th>
                      <th scope="col">หมู่เรียน</th>
                      <th scope="col">-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *
				FROM student AS student 
				INNER JOIN class AS class 
					on (student.class_id = class.class_id)
				inner join branch on (class.b_id = branch.b_id)
				WHERE s_year = '$s_year'
					GROUP BY class_name  HAVING count(class_name) > 0	ORDER BY student.class_id DESC";
                    $result = mysqli_query($conn, $sql)
                      or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                    while ($rs = mysqli_fetch_array($result)) {
                    ?><tr>
                        <td><?php echo "$rs[b_name]"; ?></td>
                        <td><?php echo "$rs[class_name]"; ?></td>
                        <td><?php echo "<a href=\"showstudent.php?class_id=$rs[class_id]\">"; ?>
                          <button type="button" class="btn btn-info">รายชื่อนักศึกษา</button>
                          <?php echo "</a>"; ?>
                        </td>

                      </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                  </tbody>
                </table>

            </div>
          </div>
          </form>
        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">

              <div class="col"><button class="col-6 btn btn-secondary btn-sm float-center" input type="button" onclick=window.history.back()>ย้อนกลับ</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <div class="card-footer text-center">
    Phasaktara Technological Callege
  </div>
<?php
} else {
  echo "<script> alert('Please Login');window.location = 'index.php';</script>";
  exit();
}
?>