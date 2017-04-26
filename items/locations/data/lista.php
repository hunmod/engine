<?php

$admintemplate=1;
if ($_GET["mid"]<1){
	/*$_GET["mid"]=1;
	$getparams[2]=1;*/
}else{
	$getparams[2]=$_GET["mid"];
}

if (!isset($menustart))$menustart='0';
/*$filtersm["modul"]="hirek";*/

//$menuk=$MenuClass->menu_selectboxfilter($menustart,array("modul"=>"page"),$filtersm,$order='',$page='all');

//arraylist($menuk);
$myparams='locations/lista';
foreach ($_GET as $nam=>$req )
{
if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page'&&$nam!='mr')
	
$myparams.='&'.$nam.'='.$req;
}
$adminv=1;

if ($auser["jog"]>=3){
$filters['status']='all';
}
else{
	
}
include('list.php');
?>