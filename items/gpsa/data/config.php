<?php
/*
$tblmodulom='hir';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."web_hir";*/
$file_structuct=array();
$file_structuct["modules"]="gpsa";


/*admin menü*/
$file_structuct["name"]="geocode";
$file_structuct["file"]="rgeocode";
$adminmenu[]=$file_structuct;

/*választhatómodul*/
$file_structuct["name"]="geocode";
$file_structuct["file"]="rgeocode";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy auto";
$file_structuct["file"]="cardadata1";
$modules[]=$file_structuct;
$file_structuct["name"]="Most";
$file_structuct["file"]="now";
$modules[]=$file_structuct;


$adatbazis["db2_srv"]=$adatbazis["db1_srv"];
$adatbazis["db2_db"]="navigacio";
$adatbazis["db2_user"]=$adatbazis["db1_user"];
$adatbazis["db2_pass"]=$adatbazis["db1_pass"];

$adatbazis["db3_srv"]=$adatbazis["db1_srv"];
$adatbazis["db3_db"]="geocode";
$adatbazis["db3_user"]=$adatbazis["db1_user"];
$adatbazis["db3_pass"]=$adatbazis["db1_pass"];


$tbl['geocode']="gecode";
$tbl['gpscars']="elofizeto";
$tbl['usercar']="usercar";
$tbl['usergroup']="usergroup";
$tbl['groupcar']="groupcar";

include_once("class.gpsa.php");
include_once("class.gpsusers.php");
$file['js']="scripts/hngps.js";
if (is_file($file['js'])){
 $ejs=$makemin->js($file['js'],str_replace('.js','.min.js',$file['js']),false);
 $extrascript[]='<script src="'.$server_url.$ejs.'" type="text/javascript"></script>';
}

?>