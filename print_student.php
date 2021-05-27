<?php
require_once './mpdf/helper.php';

include('connect.php');
$class_id = $_GET['class_id'];
$sql = "SELECT * FROM class 
		INNER JOIN branch ON (class.b_id = branch.b_id)
		where class_id = '$class_id'";
$result = mysqli_query($conn,$sql)
	 or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error();
	 $rs = mysqli_fetch_array($result);


$html = '

<style>
table {
    border: 1px solid black;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #000000;
    padding: 5px;
    text-align: center;
    font-size: 18px;
}

h1 {
    text-align: center;
}
</style>
<h1>วิทยาลัยเทคโนโลยีป่าสักธารา</h1>
<h1>รายงานข้อมูลนักศึกษา</h1>
<h1>สาขา : '.$rs['b_name'].' หมู่เรียน : '.$rs['class_name'].'</h1>
<table>
        <tr>
			<th>รหัสนักศึกษา</th>
            <th>ชื่อนักศึกษา</th>
			<th>ปีที่เข้าศึกษา</th>
			<th>เบอร์ติดต่อ</th>
			<th>ผู้ปกครอง</th>
			<th>เบอร์ติดต่อ(ผู้ปกครอง)</th>
        </tr>
       
';


$sql2 = "SELECT * FROM student 
		inner join parent on (student.pa_id = parent.pa_id) 
		where class_id = '$class_id'";
$result2 = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_assoc($result2)) {
$html .= ' <tr>
<td>'.$row['s_username'].'</td>
<td>'.$row['s_name'].'</td>
<td>'.$row['s_year'].'</td>
<td>'.$row['s_tel'].'</td>
<td>'.$row['pa_name'].'</td>
<td>'.$row['pa_tel'].'</td>
</tr>
';
}

$html .= '</table>';

/**
 * ตังค่าต่าง ๆ
 * https://mpdf.github.io/reference/mpdf-functions/construct.html
 * 
 * Document https://mpdf.github.io/
 */

$mpdf = MpdfHelper::getInstance(
    ['mode' => 'utf-8', 'format' => 'A4-L'] //  ขนาด
);
$mpdf = MpdfHelper::getInstance();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>