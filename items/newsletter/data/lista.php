<?php

//$CsomagClass->create_table();


//kategoria
$admintemplate=1;


//list
$maxegyoldalon=100;
$form=new formobjects();

//filters
if ($_GET["status"]&&$_GET["status"]!='all'){
    $filters['status']=$_GET["status"];
}
if ($_GET["lan"]&&$_GET["lan"]!='all'){
    $filters['lang']=$_GET["lan"];
}
if ($_GET["subj"]){
    $filters['subj']=$_GET["subj"];
}
//if (!$adminv)$filters['ido']=$date;

$qhir=$SparksendClass->get_messages($filters,'',$_GET["page"]) ;

$hirekelemek=($qhir['datas']);
$hszlistacount=$qhir['count'];

//arraylist($qhir);

/*
$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);
$q=$_GET["q"];

if ($oldal>=$oldalakszama){
    $oldal=$oldalakszama-1;
}
//oldalak kiszámolása

if ($oldalakszama!=""){
    $limit= "LIMIT ".($oldal*$maxegyoldalon).",".$maxegyoldalon;
}
*/

$myparams;
$oldalakszama;
?>