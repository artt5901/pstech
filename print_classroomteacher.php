<?php
require_once './mpdf/helper.php';

include('connect.php');
$t_username = $_GET['t_username'];
$y_id = $_GET['y_id'];
$sql = "SELECT *
			FROM classroom as classroom 
				inner join class as class on (classroom.class_id = class.class_id)
				inner join teacher as teacher on (classroom.t_id = teacher.t_id)
				inner join year as year on (classroom.y_id = year.y_id)
							WHERE teacher.t_username = '$t_username' AND classroom.y_id = '$y_id'";
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
<h2 align="center">รายงานข้อมูลตารางสอน</h2>
<h2 align="center">ชื่อ-สกุล : '.$rs['t_name'].' ปีการศึกษา/ภาคเรียน : '.$rs['y_number'].'</h2>
<table>
        <tr>
			<th>วัน/เวลา</th>
            <th>รายวิชา</th>
            <th>หมู่เรียน</th>
			<th>สาขา</th>
        </tr>
       
';


$sql2 = "SELECT * FROM classroom AS classroom 
		INNER JOIN class AS class ON (classroom.class_id = class.class_id)
		INNER JOIN course AS course ON (classroom.c_id = course.c_id)
		INNER JOIN teacher AS teacher ON (classroom.t_id = teacher.t_id)
		INNER JOIN day AS day on (classroom.day_id = day.day_id)
		inner join time as time on (classroom.time_id = time.time_id)
		inner join year as year on (classroom.y_id = year.y_id)
		inner join branch on (class.b_id = branch.b_id)
		WHERE classroom.y_id = '$y_id' AND t_username = '$t_username' ORDER BY classroom.day_id ASC";
$result2 = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_assoc($result2)) {
$html .= ' <tr>
<td>'.$row['day_name'].' - '.$row['time_name'].'</td>
<td>'.$row['c_name'].'</td>
<td>'.$row['class_name'].'</td>
<td>'.$row['b_name'].'</td>
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