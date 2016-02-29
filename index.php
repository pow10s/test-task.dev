<?php
require('config.php');
require_once(__DIR__ . '/vendor/autoload.php');
$router = new libs\Router();
$router->run();


$test = new libs\XlsParser();
$res =$test->parse_excel_file( PATH_TO_UPLOADS.'avtokuzov.xls' );
for ($i=0;$i<count($res);$i++){
    print_r($res[$i]);
}
