<?php
error_reporting(0); 
 session_start();?>
<?php
include_once ("items/allpagedatas.php");


if (file_exists($file['web'])){
include_once($file['web']);
}
?>