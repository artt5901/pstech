<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT * FROM news 
		inner join teacher on (news.t_id = teacher.t_id)
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
<h1>รายงานข้อมูลข่าวสารทั้งหมด</h1>

<table>
        <tr>
			<th>ข่าวสาร</th>
			<th>วันที่ประชาสัมพันธ์</th>
			<th>ผู้ประกาศ</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td align="left">'.$row['n_name'].'</td>
<td align="left">'.$row['n_date'].'</td>
<td align="left">'.$row['t_name'].'</td>
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
$mpdf = MpdfHelper::getInstance(
    ['orientation' => 'L'] //  ขนาด
);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>