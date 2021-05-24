<?php
require_once './mpdf/helper.php';
$html = '
<table border="2px">
        <tr>
            <th>ชื่อบริษัท</th>
            <th>ดิดต่อ</th>
            <th>ประเทศ</th>
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
        </tr>
        <tr>
            <td>Ernst Handel</td>
            <td>Roland Mendel</td>
            <td>Austria</td>
        </tr>
        <tr>
            <td>Island Trading</td>
            <td>Helen Bennett</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Laughing Bacchus Winecellars</td>
            <td>Yoshi Tannamuri</td>
            <td>Canada</td>
        </tr>
        <tr>
            <td>Magazzini Alimentari Riuniti</td>
            <td>Giovanni Rovelli</td>
            <td>Italy</td>
        </tr>
    </table>
';
/**
 * ตังค่าต่าง ๆ
 * https://mpdf.github.io/reference/mpdf-functions/construct.html
 * 
 * Document https://mpdf.github.io/
 */
$mpdf = MpdfHelper::getInstance();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>