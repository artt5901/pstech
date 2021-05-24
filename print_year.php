<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT * FROM year order by y_number DESC 
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
<h1>รายงานข้อมูลปีการศึกษา/ภาคเรียน ทั้งหมด</h1>

<table>
        <tr>
            <th>#</th>
			<th>ปีการศึกษา/ภาคเรียน</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td>'.$row['y_id'].'</td>
<td align="center">'.$row['y_number'].'</td>
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