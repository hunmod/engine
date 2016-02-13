<?php
/*
[HUNMOD WEB ENGINE]
Ez a file Behúzza a beállítási változókat..
*/
$urlpre="";
$page_config_file='';
$_SESSION["page_install"]="1";
//$server_url='http://'.$_SERVER["HTTP_HOST"].'/';
//$server_url.='sajat_publicv/';
switch ($_SERVER["HTTP_HOST"])
{
//
case "hunmod.dyndns.hu":
case "nagy.idiota.hu":
	$sfilename="hnmd_local.txt";
	//include_once("config_files/abrakahasba.php");	
break;

case "abrakahasba.hu":
case "www.abrakahasba.hu":
case "WWW.abrakahasba.hu":
	$sfilename="abrakahasba.txt";
break;

//
case "hunmod.eu":
	$sfilename="hnmd.txt";
break;
case "test.hunmod.eu":
	$sfilename="test_hnmd.txt";
break;
/*case "localhost":
	$sfilename="hnmd_local.txt";
break;*/
case "ingatlan.landver.eu":
	$sfilename="landver_ingatlan.txt";
break;

case "landver.eu":
	$sfilename="landver.txt";
break;

default:
	$sfilename="default.txt";
break;
}
$sfile = "items/config_files/".$sfilename;	

//if (file_exists("./items/config_files/".$page_config_file))
if (file_exists($sfile))
{
	unset($_SESSION["page_install"]);	

}
else if (file_exists("../".$sfile)){
	$urlpre="../";
	unset($_SESSION["page_install"]);
}
else $urlpre="";

$sfile=$urlpre.$sfile;

if(!isset($_SESSION["page_install"])){
	//include_once("./items/config_files/".$page_config_file);		
$string = file_get_contents($sfile);
$datas=json_decode($string,true);
$adatbazis=$datas["db_conf"];
$oldalid=$datas["oldalid"];
$homefolder=$datas["homefolder"];
$prefix=$datas["prefix"];
$prefix_pagesetting=$datas["prefix_pagesetting"];
}


$leftside=array();
$rightside =array();
$file=array();
$usermenu=array();
$chronemenu=array();
$menulistafel=array();
//$menukalatta =array();

$kezdooldal="";
$pagetitle="";
$pagedescription ="";
$fb_page_name ="";
$googleplus_id ="";

$updtrecords ="";
$mezok  ="";
$ertekek  ="";
$mezo_ertek  ="";
$ido_time  ="";
$keywordsarray  ="";
$googleplus_id ="";

  

/*
$datas["db_conf"]=$adatbazis;
$datas["homefolder"]=$homefolder;
$datas["oldalid"]=$oldalid;
$datas["homefolder"]=$homefolder;
$datas["prefix"]=$prefix;
$datas["prefix_pagesetting"]=$prefix_pagesetting;
file_put_contents($file,json_encode($datas));
*/
/*
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= "John Smith\n";
// Write the contents back to the file
file_put_contents($file, $current);
*/
?>