<?php
require_once './mpdf/helper.php';

include('connect.php');
$s_username = $_GET['s_username'];
$sql = "SELECT (sum(score*c_credit)/sum(c_credit)) as grade_score , grade.s_username , stu.s_name , class.class_name ,  grade.y_id , branch.b_name
				FROM grade as grade inner join student as stu on (grade.s_username = stu.s_username)
									INNER JOIN course AS course ON (grade.c_id = course.c_id)
									inner join class as class on (grade.class_id = class.class_id)
									inner join year as year on (grade.y_id = year.y_id)
									inner join branch on (class.b_id = branch.b_id)
									WHERE grade.s_username = '$s_username' ";
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
<h2 align="center">รายงานข้อมูลผลการเรียน</h2>
<h2 align="center">ชื่อ-สกุล : '.$rs['s_name'].' สาขา : '.$rs['b_name'].' - หมู่เรียน : '.$rs['class_name'].'</h2>
<h2 align="center">ผลการเรียนเฉลี่ยทั้งหมด : '.$rs['grade_score'].'</h2>
<table>
        <tr>
			<th>รหัสวิชา</th>
            <th>รายวิชา</th>
			<th>ปีการศึกษา/ภาคเรียน</th>
            <th>หน่วยกิต</th>
			<th>ผลการเรียน</th>
        </tr>
       
';
$sql2 = "SELECT * 
							FROM grade AS grade 
							INNER JOIN class AS class ON (grade.class_id = class.class_id)
							INNER JOIN course AS course ON (grade.c_id = course.c_id)
							INNER JOIN student as stu ON (grade.s_username = stu.s_username)
							inner join year as year on (grade.y_id = year.y_id)
							WHERE grade.s_username = '$s_username'";
$result2 = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_assoc($result2)) {
$html .= ' <tr>
<td>'.$row['c_num'].'</td>
<td>'.$row['c_name'].'</td>
<td>'.$row['y_number'].'</td>
<td>'.$row['c_credit'].'</td>
<td>'.$row['score'].'</td>
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