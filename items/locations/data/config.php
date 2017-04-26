<?php
//Tables
include('places_class.php');
$places_loc="uploads/places";

$file_structuct = array();
$file_structuct["modules"] = "locations";

/*
$file_structuct["name"] = "Menü lista";
$file_structuct["file"] = "menulist";
$modules[] = $file_structuct;
*/

/*admin menü*/
$adminmenu2=array();
$file_structuct["name"] = lan("events");
$file_structuct["file"] = "lista";
$adminmenu2[] = $file_structuct;

$file_structuct["name"] = lan("citys");
$file_structuct["file"] = "citys";
$adminmenu2[] = $file_structuct;
//
$file_structuct["name"] = lan("megye");
$file_structuct["file"] = "regions";
$adminmenu2[] = $file_structuct;

$file_structuct["name"] = lan("events");
$file_structuct["file"] = "list";
$modules[] = $file_structuct;

//



$file_structuct["name"] = lan("event");
$file_structuct["file"] = "location";
$modules[] = $file_structuct;


$file_structuct["name"] =lan("events");
$file_structuct["file"] = "lista";
$file_structuct["alatta"] = $adminmenu2;


$adminmenu[] = $file_structuct;

unset($adminmenu2);
unset($file_structuct["alatta"]);


?>