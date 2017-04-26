<?php
//Tables
include('class.newletter.php');
$newsletter_loc="uploads/newsletter";

$file_structuct = array();
$file_structuct["modules"] = "newsletter";

/*
$file_structuct["name"] = "Menü lista";
$file_structuct["file"] = "menulist";
$modules[] = $file_structuct;
*/

/*admin menü*/
$adminmenu2=array();
$file_structuct["name"] = lan("sendmails");
$file_structuct["file"] = "sendmails";
$adminmenu2[] = $file_structuct;

$file_structuct["name"] = lan("subscriebe");
$file_structuct["file"] = "subscriebe";
$adminmenu2[] = $file_structuct;
//


$file_structuct["name"] =lan("newsletter");
$file_structuct["file"] = "lista";
$file_structuct["alatta"] = $adminmenu2;


$adminmenu[] = $file_structuct;

unset($adminmenu2);
unset($file_structuct["alatta"]);


?>