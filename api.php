<?php
//header('Content-Type: application/json');

error_reporting(0); 
 session_start();
include_once ("items/allpagedatas.php");
if (file_exists($file['api'])){
 include_once($file['api']);
}
?>