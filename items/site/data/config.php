<?php
$site_loc = 'uploads/site';
$tblmodulom = 'site';
$tbl[$tblmodulom] = $adatbazis["db1_db"] . "." . $prefix . "site";
$file_structuct = array();
$file_structuct["modules"] = "site";


/*admin menü*/




$file_structuct["name"] = "Oldalak";
$file_structuct["file"] = "lista";
//$file_structuct["alatta"] = $adminmenu2;
$adminmenu[] = $file_structuct;

$file_structuct["name"] = "Oldalak lista";
$file_structuct["file"] = "list";
$modules[] = $file_structuct;
$file_structuct["name"] = "Oldalak lista1";
$file_structuct["file"] = "list1";
$modules[] = $file_structuct;
$file_structuct["name"] = "Oldalak lista2";
$file_structuct["file"] = "list2";
$modules[] = $file_structuct;
$file_structuct["name"] = "Egy Oldal";
$file_structuct["file"] = "site";
$modules[] = $file_structuct;

include('site.class.php');

foreach ($avaibleLang as $alan){
    $SiteClass->create_table_text($alan);
}



?>