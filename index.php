<?php
session_set_cookie_params(36000);
session_start();
header("Content-Type: text/html; charset=utf-8"); 
header("Cache-Control: max-age=31536000");
//30days (60sec * 60min * 24hours * 30days)
    /*date_default_timezone_set('Europe/Budapest');
    ini_set('error_reporting', E_ALL);
    error_reporting(E_ALL);
    ini_set('log_errors',TRUE);
    ini_set('html_errors',FALSE);
    ini_set('error_log','syslog/php_' . date('Y-m-d-H') . '.log');
    ini_set('display_errors',FALSE);*/
//ini_set('error_reporting', E_ALL);

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
$start_time = MICROTIME(TRUE);
//
include_once("items/allpagedatas.php");

 if (is_file($urlpre.$template.".php"))
{
 include_once($urlpre.$template.".php");
}
else {include_once("./styl/default/index.php");}
?>