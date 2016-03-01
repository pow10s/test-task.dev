<?php
require('config.php');
require_once(__DIR__ . '/vendor/autoload.php');
$router = new libs\Router();
$router->run();