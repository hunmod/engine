<?php
/*
[HUNMOD WEB ENGINE]
Ez a file Behúzza a beállítási változókat..
*/
//var_dump($_SERVER['SERVER_NAME']);
$urlpre = "";
$page_config_file = '';
$_SESSION["page_install"] = "1";
//$server_url='http://'.$_SERVER["HTTP_HOST"].'/';
//$server_url.='sajat_publicv/';
switch ($_SERVER["HTTP_HOST"]) {
    case "hunmod.dyndns.hu":
    case "nagy.idiota.hu":
        $sfilename = "hnmd_local.txt";
        break;
    case "abrakahasba.hu":
    case "www.abrakahasba.hu":
    case "WWW.abrakahasba.hu":
        $sfilename = "abrakahasba.txt";
        break;
    case "hunmod.eu":
        $sfilename = "hnmd.txt";
        break;
    case "test.hunmod.eu":
        $sfilename = "test_hnmd.txt";
        break;
    /*case "localhost":
        $sfilename="hnmd_local.txt";
    break;*/
    case "ingatlan.landver.eu":
        $sfilename = "landver_ingatlan.txt";
        break;
    case "landver.eu":
        $sfilename = "landver.txt";
        break;
    default:
        $sfilename = $_SERVER['SERVER_NAME'].".txt";
        break;
}
$sfile = "/items/config_files/" . $sfilename;
$urlpre = "../";
$urlpre = "./";

if (file_exists($sfile)) {
    $urlpre = "";
    unset($_SESSION["page_install"]);

} else if (file_exists($urlpre . $sfile)) {
    unset($_SESSION["page_install"]);
} else $urlpre = "";
$sfile = $urlpre . $sfile;
if (!isset($_SESSION["page_install"])) {
    $string = file_get_contents($sfile);
    $datas = json_decode($string, true);
    $adatbazis = $datas["db_conf"];
    $oldalid = $datas["oldalid"];
    $homefolder = $datas["homefolder"];
    $prefix = $datas["prefix"];
    $prefix_pagesetting = $datas["prefix_pagesetting"];
}

?>