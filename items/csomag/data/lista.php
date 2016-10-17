<?php

//$CsomagClass->create_table();


//kategoria
$admintemplate=1;
if ($_GET["mid"]<1){
    /*$_GET["mid"]=1;
    $getparams[2]=1;*/
}else{
    $getparams[2]=$_GET["mid"];
}

if (!isset($menustart))$menustart='0';

//list
$maxegyoldalon=100;
$form=new formobjects();
$status=$CsomagClass->status();
//filters
if ($_GET["status"] && $_GET["status"]!='all'){
    $filters['status']=$_GET["status"];
}
if ($_GET["name"]){
    $filters['cim']=$_GET["name"];
}
if ($_GET["s"]){
    $filters['s']=$_GET["s"];
}
if ($_GET["tag"]){
    $filters['tag']=$_GET["tag"];
}

//if (!$adminv)$filters['ido']=$date;

$qhir=$CsomagClass->get($filters,'',$_GET["page"]) ;
$hirekelemek=($qhir['datas']);
$hszlistacount=$qhir['count'];

//arraylist($qhir);

//arraylist($qhir);

$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);
$q=$_GET["q"];

if ($oldal>=$oldalakszama){
    $oldal=$oldalakszama-1;
}
//oldalak kiszámolása

if ($oldalakszama!=""){
    $limit= "LIMIT ".($oldal*$maxegyoldalon).",".$maxegyoldalon;
}


$myparams;
$oldalakszama;
?>