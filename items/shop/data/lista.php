<?php
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
$status=$SiteClass->status();
//filters
if ($_GET["status"]){
    $filters['status']=$_GET["status"];
}
else{
    $filters['status']="2";
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
if ($_GET["mid"]&&$_GET["mid"]!='all'){
    $filters['mid']=$_GET["mid"];
}
    $filters['lang']=$_SESSION["lang"];



$myparams=$getparams[0]."/".$getparams[1];
foreach ($_GET as $nam=>$req )
{
    if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page'&&$nam!='mr')

        $myparams.='&'.$nam.'='.$req;
}
//if (!$adminv)$filters['ido']=$date;
$filters['maxegyoldalon']=$maxegyoldalon;

$qhir=$ShopClass->get($filters,$_GET["order"],$_GET["page"]) ;
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

//menü select
$menuk=$MenuClass->menu_selectboxfilter($menustart,array("modul"=>"shop"),$filtersm,$order='',$page='all');



?>