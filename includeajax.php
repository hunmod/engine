<?php session_start();?>
<? header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <s:head theme="ajax"/>
<?php 
include_once ("items/allpagedatas.php");
?>
<?php 
if (count($extrascript)>=1){

foreach ($extrascript as $xtra){
	echo $xtra;
	}
	
}

?>
</head>
<body>
<?php
//var_dump($_GET);


$file3=("".$_GET["ff"].".php");


if (file_exists($file3)){
include_once($file3);
}

if (file_exists($file['web'])){
include_once($file['web']);
}
?>
</body>
</html>