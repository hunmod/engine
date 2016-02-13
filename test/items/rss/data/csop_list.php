<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
$widgets[]="items/ads/web/widget_side1.php";       


include_once "class.AbsRssReader20.php";
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

$dfilters=array();
$dfilters["maxegyoldalon"]=20;
if ($getparams[2]>0)$dfilters["mid"]=($getparams[2]);
$dfilters["status"]=$_GET['status'];
$qeszkoztipus=$rss_class->chanel_get($dfilters,$order='',$page='all');
//arraylist($qeszkoztipus);
$eszkozok=$qeszkoztipus['datas'];
	// $eszkozok=$output["valasztomb"];
	//arraylist($eszkozok);
	




$estatus=$rss_class->status();


/*
if ($chanelsid!=''){
$WHERE=" WHERE chanelid in (".$chanelsid.") ";	
}
$qeszkoztipus="
SELECT * 
FROM  ".$tbl['rssdata'].$WHERE." ORDER BY `pubDate2` DESC LIMIT 21
";
$rssdatas=db_Query($qeszkoztipus, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
*/


$page_keywords="";
$page_ogimage="";
$page_description="";
$pagetitle="rsscsoplist";




   // $eszkozok=$output["valasztomb"];
	//arraylist($eszkozok);
	
?>