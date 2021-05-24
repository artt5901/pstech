<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT * FROM course order by c_name DESC 
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
<h1>รายงานข้อมูลรายวิชาทั้งหมด</h1>

<table>
        <tr>
            <th>รหัสรายวิชา</th>
			<th>ชื่อรายวิชา</th>
            <th>จำนวนหน่วยกิต</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td>'.$row['c_num'].'</td>
<td align="center">'.$row['c_name'].'</td>
<td>'.$row['c_credit'].'</td>
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