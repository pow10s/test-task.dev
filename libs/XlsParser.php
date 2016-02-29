<?php

namespace libs;

class XlsParser
{
    function parse_excel_file($filename)
    {
        include_once 'vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
        $result = [];
        $file_type = \PHPExcel_IOFactory::identify($filename);
        $objReader = \PHPExcel_IOFactory::createReader($file_type);
        $objPHPExcel = $objReader->load($filename);
        $result = $objPHPExcel->getActiveSheet()->toArray();
        return $result;
    }

}

;
