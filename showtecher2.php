<?php
	include "include/head_menu_admin.php";
	include "connect.php";
	
		$sql = "SELECT d1.t_username, d1.t_name, d1.t_tel , d2.b_name , d3.po_name
			FROM techar AS d1
				INNER JOIN branch AS d2
					on (d1.b_id = d2.d_id)
				INNER JOIN position AS d3
					on	(d1.po_id = d3.po_id)";			
	$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
?>
<title>จัดการข้อมูลครู-อาจารย์</title>
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb">
    <li class="breadcrumb-item" align="right" ><a href="#">เพิ่มข้อมูล</a></li>
  </ol>
</nav>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ชื่อผู้ใช้</th>
      <th scope="col">ชื่อ-สกุล</th>
      <th scope="col">เบอร์ติดต่อ</th>
      <th scope="col">ตำแหน่ง</th>
      <th scope="col">สาขา</th>
      <th scope="col">-</th>
    </tr>
  </thead>
  <tbody>
  <?php
	while($rs=mysqli_fetch_array($result)){
?>
    <tr>
      <td><?php echo"$rs[t_username]";?></td>
      <td><?php echo"$rs[t_name]";?></td>
      <td><?php echo"$rs[t_tel]";?></td>
      <td><?php echo"$rs[po_name]";?></td>
      <td><?php echo"$rs[b_name]";?></td>
      <td><?php echo "<a href=\"edit_teacher.php?b_id=$rs[t_id]\">"; ?><button type="button" class="btn btn-warning">แก้ไข</button><?php echo "</a>"; ?></td>
      <td><?php echo "<a href=\"del_teacher.php?b_id=$rs[t_id]\">"; ?><button type="button" class="btn btn-danger">ลบ</button><?php echo "</a>"; ?></td>
    </tr>
<?php
	}
	mysqli_close($conn);
?>
  </tbody>
  </tbody>
</table>