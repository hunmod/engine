<?php session_start();?>
<?php header("Content-Type: text/html; charset=utf-8"); ?>
<?php
        error_reporting(0);

include_once($urlpre."items/allpagedatas.php");
$thisulr=$_SERVER["HTTP_HOST"]."".$_SERVER["REQUEST_URI"];
 ?>
<?php
/*
var_dump($_REQUEST);
echo "<hr>";
var_dump($_FILES);
echo "<hr>";
var_dump($_POST);
echo "<hr>";
var_dump($_GET);
echo "<hr>";
*/
$targetfldr="uploads/".$_POST['file_location'];

		$extension1 = pathinfo($_FILES['photo']['name']);
		$extension = strtolower($extension1[extension]);
		//$extension = kierjeztes($extension1);
		$imagenamenew=$date.".".$extension;
        $source = $_FILES['photo']['tmp_name'];
		$Upload_Class->createdir($targetfldr);
		$target = $targetfldr.$imagenamenew;
		move_uploaded_file($source, $target);
		$Upload_Class->filetablaba($target,$_FILES['photo']['name']);
//echo $target;

$return["endfile"]=$target;
$return["target"]=$target;
$return["getfile"]=$_FILES['photo']['name'];
$return["file_location"]=$_POST['file_location'];

$return["script"]=$_POST['script'];//ezt a scriptet hívja meg feltöltés után

$return["extension"]=$extension;
//$return["size"]=filesize($target);

$return["r_w"]=$_POST['r_w'];//kroppoló aránya és végleges képméret
$return["r_h"]=$_POST['r_h'];//kroppoló aránya és végleges képméret
$return["fnct"]=$_POST['fnct']; //mijen függvénnyel térjen vissza
$return["param"]=$_POST['param']; //tetszőleges paramééter


if ($return["r_w"]==""){
$return["r_w"]=0;	
}
if ($return["r_h"]==""){
$return["r_h"]=0;	
}



echo json_encode($return);

