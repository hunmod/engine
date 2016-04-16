<?php
$admintemplate=1;

//table create if not exist
$createtbl=1;
if($mytables)foreach($mytables as $mytab){
	$tname= $mytab["Tables_in_" . $adatbazis["db1_db"]]."<br>";
	if ($tname==$tbl['gmrec']) $createtbl=0;
}else{
	$createtbl=0;
}
if ($createtbl==1) {
	//$Sys_Class->create_list($tbl['gmrec']);
	echo 'TADAM';
}


if ($_GET["mid"]<1){
	/*$_GET["mid"]=1;
	$getparams[2]=1;*/
}else{
	$getparams[2]=$_GET["mid"];
}

if (!isset($menustart))$menustart='0';
/*$filtersm["modul"]="hirek";*/

//$menuk=$MenuClass->menu_selectboxfilter($menustart,array("modul"=>"hirek"),$filtersm,$order='',$page='all');

//arraylist($menuk);
//$myparams='hirek/lista';

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