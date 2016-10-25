<?php
//Tables

$file_structuct = array();
$file_structuct["modules"] = "locations";

/*
$file_structuct["name"] = "Menü lista";
$file_structuct["file"] = "menulist";
$modules[] = $file_structuct;
*/

/*admin menü*/
$adminmenu2=array();
$file_structuct["name"] = lan("locations");
$file_structuct["file"] = "citys";
$adminmenu2[] = $file_structuct;
//
$file_structuct["name"] = lan("megye");
$file_structuct["file"] = "religion";
$adminmenu2[] = $file_structuct;

$file_structuct["name"] = lan("orszag");
$file_structuct["file"] = "countrys";
$adminmenu2[] = $file_structuct;



//

$file_structuct["name"] = "Helyek";
$file_structuct["file"] = "citys";
$file_structuct["alatta"] = $adminmenu2;


$adminmenu[] = $file_structuct;

unset($adminmenu2);
unset($file_structuct["alatta"]);


?>