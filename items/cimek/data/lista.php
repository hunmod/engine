<?php
//$User_Class->reqgrantuser(6);
if ($_GET["mid"]<1){
}else{
	$getparams[2]=$_GET["mid"];
}

if (!isset($menustart))$menustart='0';
/*$filtersm["modul"]="hirek";*/

$menuk=$MenuClass->menu_selectboxfilter($menustart,array("modul"=>"hirek"),$filtersm,$order='',$page='all');

//arraylist($menuk);
$myparams='cimek/lista';
foreach ($_GET as $nam=>$req )
{
if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page'&&$nam!='mr')
	
$myparams.='&'.$nam.'='.$req;
}

include('list.php');
?>