<?php
//header("Content-Type: text/html; charset=utf-8");
//ob_start();

require_once(__DIR__ . "./../config/config.php");
require_once(__DIR__ . "./../src/vendor/autoload.php");

//use App\Dispatch;
$dispatch = new App\Dispatch();

$parseUrl = explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
//echo count($parseUrl);
echo "<pre>";
var_dump($parseUrl);
echo "</pre>";
echo $parseUrl[0];
echo "<br/>";
echo $dispatch->getRoute();
echo "<br/>";
//echo "Tá funcionando...<br/>";

$dispatch->addParam();
//ob_end_flush();