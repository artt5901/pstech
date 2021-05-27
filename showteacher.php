<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["userlevel"])  == '2') {
  include "connect.php";
  include "include/head_menu_admin.php";
  $valid_username = $_SESSION["valid_uname"];

  $sql = "SELECT d1.t_id,d1.t_username,d1.t_name,d1.t_tel,d2.po_name,d3.b_name,d1.t_pic
				FROM teacher AS d1 
				INNER JOIN position AS d2 
					on (d1.po_id = d2.po_id)
					INNER JOIN branch AS d3 
						on (d1.b_id = d3.b_id) Where Not d1.t_username = '$valid_username'";
  $result = mysqli_query($conn, $sql)
    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
?><head>
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
  </head>



  

  <title>Teacher Information To Phasaktara</title>


  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="showteacher.php">แสดงข้อมูลครู/อาจารย์</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="frm_addteacher.php">เพิ่มข้อมูลครู/อาจารย์</a>
        </li>
      </ul>
    </div>
    <div class="container" align="center">
      <div class="card text-center">
        <div class="container-fluid h-100 bg-light text-dark">
          <div class="row justify-content-center align-items-center">
            <h1 >แสดงข้อมูลครู/อาจารย์</h1>
          </div>
          <div class="card text" style="max-width: 1500px;">
          </div>
        <div class="col"><?php echo "<a href=\"print_teacher.php?\""; ?><button class="col-2 btn btn-success btn-sm float-center" href="print_teacher.php" >พิมพ์รายงานข้อมูลอาจารย์</button><?php echo "</a>"; ?></div>
            <div class="row no-gutters">
              <div class="col-md-12">
                <table class="table table-hover" id="mytable-teacher">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">รูปภาพ</th>
                      <th scope="col">ชื่อผู้ใช้</th>
                      <th scope="col">ชื่อ-สกุล</th>
                      <th scope="col">เบอร์ติดต่อ</th>
                      <th scope="col">ตำแหน่ง</th>
                      <th scope="col">-</th>
                      <th scope="col">-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($rs = mysqli_fetch_array($result)) {
                    ?>
                      <tr>
                        <td><?php
                            if ($rs['t_pic'] != "") {
                              echo '<img src="image/' . $rs['t_pic'] . '" width="50px;" height="50px;" alt="image">' ?>
                          <?php } else {
                              echo '<img src="image/null.jpg" width="50px;" height="50px;" alt="image">' ?>
                          <?php }
                          ?></td>
                        <td><?php echo "$rs[t_username]"; ?></td>
                        <td><?php echo "$rs[t_name]"; ?></td>
                        <td><?php echo "$rs[t_tel]"; ?></td>
                        <td><?php echo "$rs[po_name]"; ?></td>
                        <td><?php echo "<a href=\"edit_teacher.php?t_id=$rs[t_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
                        <td><?php echo "<a href=\"del_teacher.php?t_id=$rs[t_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
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
        <div class="card-footer text-muted">
        
          Phasaktara Technological Callege
        </div>
      <?php
    } else {
      echo "<script> alert('Please Login');window.location = 'index.php';</script>";
      exit();
    }
      ?>