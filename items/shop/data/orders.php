<?php
$admintemplate=1;


if (!isset($menustart))$menustart='0';

//list
$maxegyoldalon=100;
$form=new formobjects();
$status=$SiteClass->status();
//filters
if ($_GET["status"]){
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
$filters['lang']=$_SESSION["lang"];


//del order
if ($_GET["dtag"]){
    $delid['id']=$_GET["dtag"];
    $delid['status']=4;
    $ShopClass->save_shop_order($delid);
}


//rendelések lekérdezése
//szürö
//$filtersxx["id"]=$getparams[2];

$pmod=$ShopClass->paymod();
$pstatus=$ShopClass->pay_status();
$datas=$ShopClass->get_shop_order($filters);
$orderdatas=$datas["datas"];

//



?>