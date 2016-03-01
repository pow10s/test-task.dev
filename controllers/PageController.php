<?php

class PageController
{
    public function actionViewPage()
    {
        $export = new libs\XlsParser(PATH_TO_UPLOADS . 'avtokuzov.xls');
        $export->parse_excel_file();
        echo $export->exportToHtml();
    }

    public function actionAddToDb()
    {
        $data = new \libs\XlsParser(PATH_TO_UPLOADS . 'avtokuzov.xls');
        $res = $data->getData();
        $db = new \libs\DBModel();
        foreach ($res as $key => $val) {
            $name_arr = [$val[0], $val[1], $val[2]];
            $comma_sepp = implode(',', $name_arr);
            $db->add('products', ['name' => $comma_sepp, 'price' => $val[7], 'in_stock' => $val[8]]);
        }
        echo 'added';
    }
}