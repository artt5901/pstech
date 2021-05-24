<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT *
		FROM portfolio 
		INNER JOIN student on (portfolio.s_username = student.s_username)
    	INNER JOIN class on (student.class_id = class.class_id)
		INNER JOIN branch on (class.b_id = branch.b_id)";
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
<h1>รายงานข้อมูลผลงานทั้งหมด</h1>

<table>
        <tr>
            <th>ชื่อนักศึกษา</th>
            <th>ผลงาน</th>
            <th>สาขา</th>
            <th>หมู่เรียน</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td>'.$row['s_name'].'</td>
<td>'.$row['p_name'].'</td>
<td>'.$row['b_name'].'</td>
<td>'.$row['class_name'].'</td>
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