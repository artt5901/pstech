<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])) {
  include "connect.php";
  $valid_username = $_SESSION["valid_uname"];
  $valid_status = $_SESSION["userlevel"];

  //ของอาจารย์ธรรมดา
  if ($valid_status == '1') {
    include "include/head_menu_teacher.php";
    $sql = "SELECT *
    FROM news AS news 
    INNER JOIN teacher ON (news.t_id = teacher.t_id) 
    WHERE teacher.t_username = '$valid_username'
    ORDER BY n_id DESC";
    //แสดงออกมาแค้ของตัวเอง
  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  }
  //ของผู้ดูแลระบบ
  if ($valid_status == '2') {
    include "include/head_menu_admin.php";
    $sql = "SELECT *
				FROM news AS news 
        INNER JOIN teacher ON (news.t_id = teacher.t_id)  
        ORDER BY n_id DESC";
        //แสดงออกมาทั้งหมด
  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  }
  //ของฝ่ายทะเบียน 
  if ($valid_status == '3') {
    include "include/head_menu_grade.php";
    $sql = "SELECT *
    FROM news AS news 
    INNER JOIN teacher ON (news.t_id = teacher.t_id) 
    WHERE teacher.t_username = '$valid_username'
    ORDER BY n_id DESC";
    //แสดงออกมาแค้ของตัวเอง
$result = mysqli_query($conn, $sql)
or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
  }


  
?><head>
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
  </head>



  

  <title>News Information To Phasaktara</title>


  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="shownews.php">แสดงข้อมูลข่าวสาร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addnews.php">เพิ่มข้อมูลข่าวสาร</a>
        </li>
      </ul>
    </div>
    <div class="container" align="center">
      <div class="card text-center">
        <div class="container-fluid h-100 bg-light text-dark">
          <div class="row justify-content-center align-items-center">
            <h1>แสดงข้อมูลข่าวสาร</h1>
          </div>
          <div class="card text" style="max-width: 1500px;">
            <div class="row no-gutters">
              <div class="col-md-12">
                <table class="table table-hover" id="mytable-news">
                  <thead>
                                      <tr class="bg-secondary text-white">
                      <th scope="col">ข่าวสาร</th>
                      <th scope="col">วัน/เดือน/ปี</th>
                      <th scope="col">วัน/เดือน/ปี หมดอายุข่าว</th>
                      <th scope="col">ผู้ประกาศ</th>
                      <th scope="col">-</th>
                      <th scope="col">-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($rs = mysqli_fetch_array($result)) {
                    ?>
                      <tr>
                        <td><?php echo "$rs[n_name]"; ?></td>
                        <td><?php echo "$rs[n_date]"; ?></td>
                        <td><?php echo "$rs[n_ex]"; ?></td>
                        <td><?php echo "$rs[t_name]"; ?></td>
                        <td><?php echo "<a href=\"edit_news.php?n_id=$rs[n_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
                        <td><?php echo "<a href=\"del_news.php?n_id=$rs[n_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
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
        <div class="col"><?php echo "<a href=\"print_news.php?\">"; ?><button class="col-3 btn btn-success btn-sm float-center" >พิมพ์รายงานข้อมูลข่าวสาร</button><?php echo "</a>"; ?></div>

        <div class="card-footer text-muted">
          Phasaktara Technological Callege
        </div>
      <?php
    } else {
      echo "<script> alert('Please Login');window.location = 'index.php';</script>";
      exit();
    }
      ?>