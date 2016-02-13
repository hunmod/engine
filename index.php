<?php session_start();
header("Content-Type: text/html; charset=utf-8"); 
header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
    /*date_default_timezone_set('Europe/Budapest');
    ini_set('error_reporting', E_ALL);
    error_reporting(E_ALL);*/
	
    ini_set('log_errors',TRUE);
    ini_set('html_errors',false);
    ini_set('error_log','syslog/php_' . date('Y-m-d-H') . '.log');
    ini_set('display_errors',false);
	
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); 
$start_time = MICROTIME(TRUE);
//

include_once("items/allpagedatas.php");
/*define('FACEBOOK_SDK_V4_SRC_DIR', './Facebook/src/Facebook/');
include ('./Facebook/autoload.php');
*/
 if (is_file('.'.$template.".php"))	
{
 include_once('.'.$template.".php");	
}
else {include_once("./styl/default/index.php");}
 ?>