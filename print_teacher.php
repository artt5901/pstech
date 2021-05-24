<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT d1.t_id,d1.t_username,d1.t_name,d1.t_tel,d2.po_name,d3.b_name,d1.t_year
FROM teacher AS d1 
INNER JOIN position AS d2 
    on (d1.po_id = d2.po_id)
    INNER JOIN branch AS d3 
        on (d1.b_id = d3.b_id)";
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
<h1>รายงานข้อมูลครูอาจารย์ทั้งหมด</h1>

<table>
        <tr>
            <th>ชื่ออาจารย์</th>
            <th>ปีที่เข้าสอน</th>
            <th>เบอร์โทรติดต่อ</th>
            <th>ตำแหน่ง</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td>'.$row['t_name'].'</td>
<td>'.$row['t_year'].'</td>
<td>'.$row['t_tel'].'</td>
<td>'.$row['po_name'].'</td>
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
$mpdf->WriteHTML($html);
$mpdf->Output($file_name, 'D');
?>