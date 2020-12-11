<?php
include(__DIR__ . "./../src/Includes/configrules.php");

#TIME ZONE
define('CURTIME', $curtime);

#DOCUMENT ROOT
define('DIRREQ', $docRoot);

#URL/DOMAIN ROOT
define('DIRPAGE', $root);

#Specific Directories
define('DIRIMG', DIRPAGE.'public/assets/images/');
define('DIRJS', DIRPAGE.'public/assets/js/');
define('DIRCSS', DIRPAGE.'public/assets/css/');
define('DIRBOOTSTRAP', DIRPAGE.'public/assets/bootstrap/4.4.1/');
define('DIRSLICK', DIRPAGE.'public/assets/slick/');

#REMOTE DATABASE CONNECTION SETTINGS
define('HOST','localhost');
define('DB','nome_do_banco');
define('USER','root');
define('PASS','sua_senha');

#LOCAL DATABASE CONNECTION SETTINGS
define('LH_HOST','localhost');
define('LH_DB','paoleitecafe');
define('LH_USER','root');
define('LH_PASS','');


#EMAIL CONFIGURATION
define('ST_EMAIL','email@empresa.com');
define('MAIL_MAILER', 'smtp');
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);
define('MAIL_USERNAME', 'meuemail@gmail.com');
define('MAIL_PASSWORD', 'senha');
define('MAIL_ENCRYPTION', 'tls');


#USER'S IP AND HOSTNAME
define('IP', $ip);
define('HOSTNAME', $hostname);


#GEOLOCATION
/*
define('CITY', $city);
define('REGION', $region);
define('COUNTRY', $country);
*/

#lANGUAGE
define('LANG','pt-br');


#CONSTANTS FOR BOOLEANS
define('ONE', 1);  //TRUE or yes
define('ZERO', 0);  //FALSE or no


#RANDOM CODE GENERATOR
define('CODE', $code);
