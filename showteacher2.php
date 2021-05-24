<?php
include "connect.php";
include "include/head_menu_admin.php";

//ที่เพิ่มเข้ามา
if (isset($_POST['search'])) {
  $valueToSearch = $_POST['t_id'];
  $query = "SELECT d1.t_id,d1.t_username,d1.t_name,d1.t_tel,d2.po_name,d3.b_name,d1.t_pic
    FROM teacher AS d1 
    INNER JOIN position AS d2 
      on (d1.po_id = d2.po_id)
      INNER JOIN branch AS d3 
        on (d1.b_id = d3.b_id) WHERE t_id = '$valueToSearch'";
  $result = mysqli_query($conn, $query);
}else{//กรณีที่ ไม่มีการกดปุ่มค้นหา จะแสดงข้อมูลไว้ทั้งหมด ตอนเริ่มต้น
  $sql = "SELECT d1.t_id,d1.t_username,d1.t_name,d1.t_tel,d2.po_name,d3.b_name,d1.t_pic
  FROM teacher AS d1 
  INNER JOIN position AS d2 
    on (d1.po_id = d2.po_id)
    INNER JOIN branch AS d3 
      on (d1.b_id = d3.b_id)";
$result = mysqli_query($conn, $sql)
or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error($conn);

}


?>

<head>
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
  <div class="container" style="align-items: center;">
    <div class="card text-center">
      <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
          <h1>แสดงข้อมูลครู/อาจารย์</h1>
        </div>
        <div class="card text" style="max-width: 1500px;">
          <div class="row no-gutters">
            <div class="col-md-12">
              <form action="" method="post"> <!-- ที่ใส่ action ว่างเพราะจะส่งค่า คืนกลับหน้าเดิม ขึ้นไปทำงานคำสั่ง php ด้านบน -->
                <select name="t_id" id="t_id">
                  <option value="">-- ชื่ออาจารย์ --</option>
                  <?php
                  $sql1 = "SELECT t_id,t_name FROM teacher";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[t_id]>$rs1[t_name]</option>";
                  }
                  ?>
                </select>
                <input type="submit" name="search" value="ค้นหา"><br><br>
                <table class="table table-hover">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">รูปภาพ</th>
                      <th scope="col">ชื่อผู้ใช้</th>
                      <th scope="col">ชื่อ-สกุล</th>
                      <th scope="col">เบอร์ติดต่อ</th>
                      <th scope="col">ตำแหน่ง</th>
                      <th scope="col">สาขา</th>
                      <th scope="col">-</th>
                      <th scope="col">-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($rs = mysqli_fetch_array($result)) {
                    ?>
                      <tr>
                        <td><?php echo '<img src="image/' . $rs['t_pic'] . '" width="50px;" height="50px;" alt="image">' ?></td>
                        <td><?php echo "$rs[t_username]"; ?></td>
                        <td><?php echo "$rs[t_name]"; ?></td>
                        <td><?php echo "$rs[t_tel]"; ?></td>
                        <td><?php echo "$rs[po_name]"; ?></td>
                        <td><?php echo "$rs[b_name]"; ?></td>
                        <td><?php echo "<a href=\"edit_teacher.php?t_id=$rs[t_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
                        <td><?php echo "<a href=\"del_teacher.php?t_id=$rs[t_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
                      </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                  </tbody>
                </table>

              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        Phasaktara Technological Callege
      </div>