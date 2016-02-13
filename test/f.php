<?php session_start();?>
<?php 
include_once ("items/allpagedatas.php");

//var_dump($_GET);


$file3=("".$_GET["ff"].".php");


if (file_exists($file3)){
include_once($file3);
}

if (file_exists($file['web'])){
include_once($file['web']);
}
?>
