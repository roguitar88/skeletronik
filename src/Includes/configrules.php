<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

//The main rules for the variables retrieved in config.php are defined here
#MAIN URL OR DOMAIN ROOT
if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1") {
    $innerFolder = "mvc/";
    $urlHost = "/";
} else {
    $innerFolder = "";
    if (isset($_SERVER['HTTPS'])) {  //$_SERVER['HTTP] = on
        $protocol = "https://";
    } else {
        $protocol = "http://";
    }
    $urlHost = $protocol . $_SERVER['HTTP_HOST'] . "/";   // Beware with slashes (/) in the end
}
$root = $urlHost.$innerFolder;


#DOCUMENT ROOT
if (substr($_SERVER['DOCUMENT_ROOT'],-1) == '/') {
    $docRoot = $_SERVER['DOCUMENT_ROOT'].$innerFolder;
}else{
    $docRoot = $_SERVER['DOCUMENT_ROOT'].'/'.$innerFolder;
}        

//$docRoot = $docRoot.'public/';
//echo $docRoot;

#CURRENT LOCAL DATE AND TIME (TIME ZONE)
$tz = 'America/Sao_Paulo';  //Change the time zone here
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set($tz);
$timestamp = time();
$dt = new \DateTime("now", new \DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$curtime = $dt->format("Y-m-d H:i:s");
//$currentdate = $dt->format("Y-m-d");
//$currentday = $dt->format("d");   
    

#IP AND HOSTNAME
/*
$user_ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
*/

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //ip pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}        

$hostname = gethostbyaddr($ip);


#RANDOM CODE GENERATOR
$code = substr(md5(uniqid(mt_rand(), true)), 0, 8);