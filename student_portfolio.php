<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])) {
  include "connect.php";
  include "include/head_menu_student.php";

  $valid_username = $_SESSION["valid_uname"];

?>

  <title>Class Information To Phasaktara</title>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
      </ul>
    </div>
    <div class="container" align="center">
      <div class="card text-center">
        <div class="container-fluid h-100 bg-light text-dark">
          <div class="row justify-content-center align-items-center">
            <h1>แสดงข้อมูลผลงาน</h1>
          </div>
          <div class="card text" style="max-width: 1100px;">
            <div class="row no-gutters">
              <div class="col-md-12">
                <table class="table table-hover" id="mytable-portfolio">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">ลำดับ</th>
                      <th scope="col">ผลงาน</th>
                      <th scope="col">นักศึกษา</th>
                      <th scope="col">-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql2 = "SELECT *
			FROM portfolio 
				INNER JOIN student ON (portfolio.s_username = student.s_username)
				WHERE student.s_username = '$valid_username'
					ORDER BY p_id DESC";
                    $result2 = mysqli_query($conn, $sql2)
                      or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                    while ($rs2 = mysqli_fetch_array($result2)) {
                    ?>
                      <tr>
                        <td><?php echo "$rs2[p_id]"; ?></td>
                        <td><?php echo "$rs2[p_name]"; ?></td>
                        <td><?php echo "$rs2[s_name]"; ?></td>
                        <td><?php echo "<a href=\"student_showportfolio.php?p_id=$rs2[p_id]\">"; ?><button type="button" class="btn btn-info">ดูผลงาน</button><?php echo "</a>"; ?></td>
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
          PS-TECH
        </div>
      <?php
    } else {
      echo "<script> alert('Please Login');window.location = 'index.php';</script>";
      exit();
    }
      ?>