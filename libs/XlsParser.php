<?php

namespace libs;

class XlsParser

{
    private $reader;
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function parse_excel_file()//reader
    {

        try {
            $file_type = \PHPExcel_IOFactory::identify($this->filename);;
            $objReader = \PHPExcel_IOFactory::createReader($file_type);
            return $this->reader = $objReader->load($this->filename);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($this->filename, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
    }

    public function exportToHtml()//export in HTML variable
    {
        $objWriter = \PHPExcel_IOFactory::createWriter($this->reader, 'HTML');
        ob_start();
        $objWriter->save('php://output');
        $excelOutput = ob_get_clean();
        return $excelOutput;
    }
}