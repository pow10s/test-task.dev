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
        $db = new \libs\DBModel();
        $objPHPExcel = $data->parse_excel_file();
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                false,
                false,
                true);
            $res = array_filter(
                $rowData[0],
                function ($cell) {
                    return !empty($cell);
                }
            );
            if (count($res) < 6) {
                continue;
            }
            $name_arr = [$res[0], $res[1], $res[2]];
            $comma_sepp = implode(',', $name_arr);
            $db->add('products', ['name' => $comma_sepp, 'price' => $res[7], 'in_stock' => $res[8]]);
        }


    }

    public function actionSearchInDb()
    {

        $select = new \models\ProductModel();
        $json = json_encode($select->selectAllProduct($_POST['search_name']));
        echo $json;
    }
    public function actionViewAJAX()
    {
        $select = new \models\ProductModel();
        $view = new \libs\View();
        $view->render('searchProducts');
        if(isset($_POST['submit_btn'])&& isset($_POST['search_name'])){
           $res = $select->selectMatchProduct($_POST['search_name']);
            $view->render('viewResult',['res'=>$res]);
        }
    }

}