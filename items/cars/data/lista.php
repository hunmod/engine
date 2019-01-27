<?php
$admintemplate=1;
//$User_Class->reqgrantuser(6);
if ($_GET["mid"]<1){
	/*$_GET["mid"]=1;
	$getparams[2]=1;*/
}else{
	$getparams[2]=$_GET["mid"];
}

if (!isset($menustart))$menustart='0';
/*$filtersm["modul"]="hirek";*/

$menuk=$MenuClass->menu_selectboxfilter($menustart,array("modul"=>"cars"),$filtersm,$order='',$page='all');


$adminv=1;

if ($auser["jog"]>=3){
$filters['status']='all';
}
else{
	
}
include('list.php');
?>