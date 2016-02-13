<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/ads/web/widget_side1.php";
$widgets[]="items/konyha/web/widget_submenu.php";

if (($_GET["page"]=="") || ($_GET["page"]<=0)){
	$oldal='0';
}
else {
	$oldal=$_GET["page"];
}


$order="nev ASC ";
if ($_GET["nev"]=="" && $_GET["mid"]=="" && $auser["id"]<1){
	$order="RAND()";
}
if ($rssmode==1){
	$order="id DESC ";
}

$acsopq=$Sys_Class->get_list('alapanyag_csoport',array('status=2'));
$acsopqdd['id']='';
$acsopqdd['name']=$lan['minds'];

$acsopq[]=$acsopqdd;
$eszkozokmezok=$rec_class->table_alapanyag();
$filters=$_GET;

if ($auser["jog"]>3){
$maxegyoldalon=$filters["maxegyoldalon"]=50;
}
else
{
$maxegyoldalon=$filters["maxegyoldalon"]=20;
}
$getdatas=$rec_class->get_alapanyag($filters,$order,$oldal);
//echo($getdatas['query']);
$alapanyaglist=$getdatas["datas"];
$hszlistacount=$getdatas['count'];
$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);

if (count($_GET)>0){
 foreach ($_GET as $name=>$value)
 {
	 if (($name!="q") && ($name!="page"))
	 {
		 $addoldalazoparam.="&".$name."=".$value;
	 }
 }	
}

	$maxoldalazonum=10;
if ($oldalakszama>$maxoldalazonum){
	
	$start=$oldal-round($maxoldalazonum/2);
	if ($start<1){
		$start=0;
		$end=$maxoldalazonum;	
	}
	else{
		
		$end=$start+$maxoldalazonum;
		if ($end>$oldalakszama)
		{
		$end=$oldalakszama;
		$start=$oldalakszama-$maxoldalazonum;
		}
		
	}
}
else
{
	$start=0;
	$end=$oldalakszama-1;
}
$page_keywords.="Kalóriatáblázat,Szénhidrát,Energia,Zsír";

$pagetitle.=" Kalóriatáblázat";
//$pagekeywords.=$Text_Class->htmltochars($recept_data["leiras"]);
$page_description.="Kalória és szénhidrát táblázat. több, mint 1500 alapanyag #szénhidrát,#kalória,#rost táblázata, allergén információkkal.";
