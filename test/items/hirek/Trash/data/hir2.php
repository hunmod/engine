<?php
//$rightside[]="./items/user/web/usermenu.php";
//$rightside[]="./items/fnct/web/widget_qr.php";

$hirid=($getparams[2]);
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];



//
$filters['id']=$hirid;
$filters['status']='all';

$qhir=$hir_class->get($filters) ;
$aprodata=($qhir['datas'][0]);

//
$aprodata["image"]=$hir_class->getimg($hirid) ;


	$menu=egymenuadat($aprodata["mid"]);
	
	$page_keywords="";
	$page_ogimage="";
	$page_description="";



if (count($aprodata)>0)
foreach ($aprodata as $megegyname=>$megegy)
{
	$aprodata[$megegyname]=htmlfromchars($megegy);
}	

//$aprodata["image"]=$homeurl."/".$img;

$page_keywords=tageketcsupaszit($aprodata["cim"]).",".tageketcsupaszit($aprodata["hir"]);
$page_description=levag(tageketcsupaszit($aprodata["hir"]),350);
$pagetitle=" ".$aprodata["cim"];





?>