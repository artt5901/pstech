<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"]) == '2') {
  include "connect.php";
  include "include/head_menu_admin.php";

  $sql = "SELECT * FROM course order by c_id DESC";
  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
?>
  <title>Course Information To Phasaktara</title>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="showcourse.php">แสดงข้อมูลรายวิชา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addcourse.php">เพิ่มข้อมูลรายวิชา</a>
        </li>
      </ul>
    </div>
    <div class="container" align="center">
      <div class="card text-center">
        <div class="container-fluid h-100 bg-light text-dark">
          <div class="row justify-content-center align-items-center">
            <h1>แสดงข้อมูลรายวิชา</h1>
          </div>
          <div class="card text" style="max-width: 1100px;">
            <div class="row no-gutters">
              <div class="col-md-12">
                <table class="table table-hover" id="mytable-course">
                  <thead>
                    <div class="col"><?php echo "<a href=\"print_course.php?\">"; ?><button class="col-3 btn btn-success btn-sm float-center">พิมพ์รายงานข้อมูลรายวิชา</button><?php echo "</a>"; ?></div>
                    <tr class="bg-secondary text-white">
                      <th scope="col">รหัสรายวิชา</th>
                      <th scope="col">ชื่อรายวิชา</th>
                      <th scope="col">จำนวนหน่วยกิต</th>
                      <th scope="col">-</th>
                      <th scope="col">-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($rs = mysqli_fetch_array($result)) {
                    ?>
                      <tr>
                        <td><?php echo "$rs[c_num]"; ?></td>
                        <td><?php echo "$rs[c_name]"; ?></td>
                        <td><?php echo "$rs[c_credit]"; ?></td>
                        <td><?php echo "<a href=\"edit_course.php?c_id=$rs[c_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
                        <td><?php echo "<a href=\"del_course.php?c_id=$rs[c_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
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
        <div class="card-footer text-muted">
          Phasaktara Technological Callege
        </div>
      <?php
    } else {
      echo "<script> alert('Please Login');window.location = 'index.php';</script>";
      exit();
    }
      ?>