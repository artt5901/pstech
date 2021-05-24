<?php
require_once __DIR__ . '/../vendor/autoload.php';
class MpdfHelper {
    static function getInstance(array $config = []) {
        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $defaultConfigX = [
            'fontDir' => array_merge($fontDirs, [
                __DIR__ . '/../font',
            ]),
            'fontdata' => $fontData + [
                'sarabun' => [
                    'R' => 'THSarabun.ttf',
                    'I' => 'THSarabun Italic.ttf',
                ]
            ],
            'default_font' => 'sarabun'
            // 'mode' => 'utf-8', 'format' => 'A4-L' ขนาด
        ];
        $mpdf = new \Mpdf\Mpdf(array_merge($defaultConfigX, $config));
        return $mpdf;
    }
}
