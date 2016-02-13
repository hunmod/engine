<?php
//include_once("../../allpagedatas.php");
if ($_POST["id"]!=""){
	$Upload_Class->filetablaba(decode($_POST["id"]),$_POST["leiras"]);
}
?>