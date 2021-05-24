<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT * FROM student 
		inner join father on (student.f_id = father.f_id)
		inner join mathar on (student.m_id = mathar.m_id)
		";
$result = mysqli_query($conn, $sql);



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
<h1>รายงานข้อมูลบิดา-มารดา</h1>

<table>
        <tr>
			<th>ชื่อ-สกุล(บิดา)</th>
			<th>เบอร์ติดต่อ(บิดา)</th>
			<th>ชื่อ-สกุล(มารดา)</th>
			<th>เบอร์ติดต่อ(มารดา)</th>
			<th>นักศึกษา</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td align="left">'.$row['f_name'].'</td>
<td align="left">'.$row['f_tel'].'</td>
<td align="left">'.$row['m_name'].'</td>
<td align="left">'.$row['m_tel'].'</td>
<td align="left">'.$row['s_name'].'</td>
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