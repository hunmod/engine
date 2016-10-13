<?php
$tblmodulom='hir';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."web_hir";
$file_structuct=array();
$file_structuct["modules"]="place";


/*admin menü*/
$file_structuct["name"]="Hely lista";
$file_structuct["file"]="list";
$adminmenu[]=$file_structuct;

$file_structuct["name"]="Hely lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy hely";
$file_structuct["file"]="place";
$modules[]=$file_structuct;




include_once("class.place.php");
$place_class=new place();
$location_class=new location();

$citys=$location_class->get_city();

$place_class->create_table();

?>