<?php
require_once './mpdf/helper.php';

include('connect.php');

$sql = "SELECT *
			FROM branch AS d1
				INNER JOIN department AS d2
					on (d1.d_id = d2.d_id) 
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
<h1>รายงานข้อมูลสาขาทั้งหมด</h1>

<table>
        <tr>
            <th>ลำดับ</th>
			<th>สาขา</th>
            <th>แผนก</th>
        </tr>
       
';



while($row = mysqli_fetch_assoc($result)) {
$html .= ' <tr>
<td>'.$row['b_id'].'</td>
<td>'.$row['b_name'].'</td>
<td>'.$row['d_name'].'</td>
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