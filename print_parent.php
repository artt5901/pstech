<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT * FROM student inner join parent on (student.pa_id = parent.pa_id)
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
<h1>รายงานข้อมูลผู้ปกครองทั้งหมด</h1>

<table>
        <tr>
			<th>ชื่อ-สกุล</th>
			<th>เบอร์ติดต่อ</th>
			<th>อาชีพ</th>
			<th>นักศึกษา</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td align="left">'.$row['pa_name'].'</td>
<td align="left">'.$row['pa_tel'].'</td>
<td align="left">'.$row['pa_metier'].'</td>
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