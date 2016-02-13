<?php 
include('class.yandextranslate.php');
$yandextranslate=new yandextranslate;
$b=$yandextranslate->translate('hu','en','lisztkeverék');
var_dump($b);
?>