<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT *
			FROM class AS class
				INNER JOIN branch AS branch ON (class.b_id = branch.b_id)
					ORDER BY class_id DESC 
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
<h1>รายงานข้อมูลหมู่เรียนทั้งหมด</h1>

<table>
        <tr>
            <th>#</th>
			<th>หมู่เรียน</th>
            <th>สาขา</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td>'.$row['class_id'].'</td>
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