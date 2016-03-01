<?php
class PageController
{
    public function actionViewPage()
    {
        $view = new \libs\View();
        $export = new libs\XlsParser(PATH_TO_UPLOADS.'avtokuzov.xls');
        $export->parse_excel_file();
        echo $export->exportToHtml();
    }

    public function actionAddToDb()
    {
        $data  =new \libs\XlsParser(PATH_TO_UPLOADS.'avtokuzov.xls');
        $res = $data->getData();
        $db = new \libs\DBModel();
        $name_arr = [$res[0],$res[1],$res[2]];
        $comma_sepp = implode(',',$name_arr);
        $db->add('products',['name'=>$comma_sepp,'price'=>$res[7],'in_stock'=>$res[8]]);
        echo 'added';
    }
}