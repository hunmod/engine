<?php

//include system classes
include_once("remotedb3.php");
include_once("items/admin/data/class/sys.class.php");
include_once('items/admin/data/class/menu.class.php');
include_once('items/admin/data/class/file_upload.class.php');
include_once('items/admin/data/class/form.class.php');
include_once('items/admin/data/class/text.class.php');
include_once('items/admin/data/class/time.class.php');
include_once('items/admin/data/class/location.class.php');
include_once('items/admin/data/class/lang.class.php');
include_once('items/user/class/users.class.php');
//construct classes
$MenuClass = new menu();
$Upload_Class = new file_upload();
$Form_Class = new formobjects();
$Text_Class = new texttotext();
$Sys_Class = new sys();
$lang_Class = new lang();
$Time_Class = new time();
$Sys_Class = new sys();
$User_Class=$UserClass=new user();

//fileminimizer
include('class/minimize.class.php');
$MakeMin = $makemin = new hnmdminimize();

include_once("fugvenyek.php");
include_once("class/class.yandextranslate.php");
$Translate = $trnslate = new yandextranslate();



$default_lang = "hu";
$default_deviza = "HUF";

//Ez a file az oldal beállításait végzi.

/*
if ($_SESSION["country_code"] == "") {
    $json = file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn=' . $Sys_Class->getIP_cdata());
    $data = json_decode($json, true);
    //arraylist($data);
    $_SESSION["country_code"] = $data["geobytesinternet"];
}
*/

//nyelv beállítása
if (isset($_GET["lang"]))
    if ($_GET["lang"] != "") {
        $_SESSION["lang"] = $_GET["lang"];
    }

if ($_SESSION["lang"] == "") {
    $_SESSION["lang"] = $default_lang;
}
$lang = $_SESSION['lang'];
switch ($_SESSION['lang']) {
    case 'hu':
        $xlslangid = 1;
        break;
    case 'de':
        $xlslangid = 2;
        break;
    case 'en':
        $xlslangid = 3;
        break;

}
//idő változók
date_default_timezone_set('UTC');
$t = time();
$date = date("YmdHis");

include_once("config.php");

//pagesetup
if (isset($_SESSION["page_install"]) && $_SESSION["page_install"] == "1") {
    //config file létrehozó script
    //echo "Not found database settings";
    header("Location: setting.php?filename=" . $sfilename);
    exit;
}

//lekérdezem a táblákat
$sqlmytables = "SHOW TABLES FROM " . $adatbazis["db1_db"];
$mytables = db_Query($sqlmytables, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "select");
foreach ($mytables as $tbls) {
    $tblexists[$adatbazis["db1_db"] . "." . $tbls["Tables_in_" . $adatbazis["db1_db"]]] = 1;
}

$domain = $_SERVER["HTTP_HOST"];
$homeurl = "http://" . $domain . $homefolder . '';
$server_url = $homeurl . '/';
$thisulr = $domain . $homefolder . "" . $_SERVER["REQUEST_URI"];
$folders["uploads"] = '_' . $oldalid . '/';
$folders["uploads2"] = '_' . $oldalid . '/';
$defaultimg = "_" . $oldalid . "/noimage.jpg";

define("domain", $domain);
define("homeurl", $homeurl);
define("serverurl", $server_url);
define("uploadfolder", $folders["uploads"]);
define("defaultimg",$defaultimg);
define("lang",$_SESSION["lang"]);

//serverurl to js
$extrascript[] = '<script> var server_url="' .serverurl. '";</script>';

//separator if exist .htacces is ok else ? &
$separator = "/";
$separator2 = "?";



//include_once ("fnct/web/belepetuser.php"); 
//include_once ("fnct/chron/index.php");

/*     modules configs */
$items_mappa = dirlist($urlpre . "items/");
foreach ($items_mappa as $onefolder) {
    $configfile = $urlpre . "items/" . $onefolder . "/data/config.php";
    if (file_exists($configfile)) {
        include_once($configfile);
    }
}


//read page settings from db


if (page_settings("title") != "") $oldalneve = page_settings("title");
if (page_settings("keywords") != "") $metakey_words = page_settings("keywords");
if (page_settings("description") != "") $meta_description = page_settings("description");
if (page_settings("sitemail") != "") $sitemail = page_settings("sitemail");
if (page_settings("analitics_id") != "") $analitics_id = page_settings("analitics_id");
if (page_settings("googleplus_id") != "") $googleplus_id = page_settings("googleplus_id");
if (page_settings("google_api_key") != "") $google_api_key = page_settings("google_api_key");
if (page_settings("fb_ap_id") != "") $fb_ap_id = page_settings("fb_ap_id");
if (page_settings("google_ad_client") != "") $google_ad_client = page_settings("google_ad_client");
if (page_settings("fb_ap_secret") != "") $fb_ap_secret = page_settings("fb_ap_secret");
if (page_settings("fb_page_id") != "") $fb_page_id = page_settings("fb_page_id");
if (page_settings("fb_page_name") != "") $fb_page_name = page_settings("fb_page_name");
//ezt még a nyelvekhez kell hangolni.....
if (page_settings("menu_root_" . $_SESSION["lang"]) != "") $menustart = page_settings("menu_root_" . $_SESSION["lang"]);
if (page_settings("menu_root_admin") != "") $menuadmin = page_settings("menu_root_admin");

if (page_settings("start_page_" . $_SESSION["lang"]) != "") {
    if (!isset($_GET["q"]) && $_GET["q"] == '') {
        $_GET["q"] = page_settings("start_page_" . $_SESSION["lang"]);
    }

}
if (page_settings("timezone") != 0) {
    $timezone = page_settings("timezone");
    if ($timezone > 0) {
        $timezone = "+" . $timezone;
    }
    $shift = $timezone . " hours"; //SZERVER időhöz képest +/-
    $date = date("YmdHis", strtotime($shift, strtotime($date)));
}

//deafult keywords
$keywords = $metakeywords;


//userlogin
include('items/user/data/login.php');


//Modul Select
    if ($_GET["q"] != "") {
        $getparams = explode("/", $_GET["q"]);
        //ha egy elemből áll a kapott érték
        if (count($getparams) == 1) {
            //SEO URL
            $getparams = explode("/", $Sys_Class->shorturl_getparams($_GET["q"]));
        }
        //other routes
        include("seoredirect.php");
        if ($getparams[0] == 'm') {
            //Menu_id
            $getparams2 = $getparams;
            $egymenuadat = $MenuClass->get_one_menu($getparams[1]);
            //arraylist($egymenuadat);
            if ($egymenuadat["item"] == "") {
                $egymenuadat["item"] = $getparams[1];
            }
            $getparams_uri = $egymenuadat["modul"] . "/" . $egymenuadat["file"] . $MenuClass->menulink($egymenuadat["item"]);
            $getparams = explode("/", $getparams_uri);
        }

    } else {
//error page
        $getparams[0] = "start";
        $getparams[1] = "e404";
        $getparams[2] = "";
    }
//arraylist($getparams);

//lang
    //default lang
    $inputFileName = './lang.xls';
    $lan = $lang_Class->xlstoarray($inputFileName, $xlslangid);
    //abrakahasbanhoz kell az egyéb szövegek miatt
    $inputFileName = 'items/' . 'konyha' . '/lang/lang.xls';
    if (file_exists($inputFileName)) {
        $lan += $lang_Class->xlstoarray($inputFileName, $xlslangid);
    }
    //az aktuálisan megnyitott modul nyelvi állománya
    $inputFileName = 'items/' . $getparams[0] . '/lang/lang.xls';
    if (file_exists($inputFileName)) {
        $lan += $lang_Class->xlstoarray($inputFileName, $xlslangid);
    }

    //az aktuálisan megnyitott file nyelvi állománya
    $inputFileName = 'items/' . $getparams[0] . '/lang/' . $getparams[1] . '.xls';
    if (file_exists($inputFileName)) {
        $lan += $lang_Class->xlstoarray($inputFileName, $xlslangid);
    }

    //a rendszer által hasnálatos fájlok.
    $file = array();

    if (isset($getparams[0]) && isset($getparams[1]))
        if (($getparams[0] != '') && ($getparams[1] != '')) {
            $file['web'] = "items/" . $getparams[0] . "/web/" . $getparams[1] . ".php";
            $file['css'] = "items/" . $getparams[0] . "/css/" . $getparams[1] . ".css";
            $file['js'] = "/items/" . $getparams[0] . "/js/" . $getparams[1] . ".js";
            $file['rss'] = "items/" . $getparams[0] . "/rss/" . $getparams[1] . ".php";
            $file['sitemap'] = "items/" . $getparams[0] . "/sitemap/" . $getparams[1] . ".php";
            $file['adat'] = "items/" . $getparams[0] . "/data/" . $getparams[1] . ".php";

            $inputFileName = 'items/' . $getparams[0] . '/lang/' . $getparams[1] . '.xls';
            if (file_exists($inputFileName)) {
                $lan += $lang_Class->xlstoarray($inputFileName, $xlslangid);
            }

        }
    $fomenu = $MenuClass->get_menus_down($menustart);
//arraylist($getparams);
//$fomenu=menuadat($menustart);

//aktuális modul adatainak betöltése
    if (isset($file['adat']))
        if (file_exists($file['adat'])) {
            include_once($file['adat']);
        }


    if (!isset($metakey_words)) {
        $metakey_words = "";
    }
//ha nincs a modulnak kulcsszava akkor az alap kulcsszavakat vegye 
    if (!isset($page_keywords)) {
        $page_keywords = $metakey_words;
    } else {
        $page_keywords = $Text_Class->htmlfromchars($page_keywords);
//$page_keywords =createpagekeywords($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars(str_replace('	', "",$page_keywords))),6);
    }

    if (!isset($meta_description)) {
        $meta_description = "";
    }
//ha nincs a modulnak leírása akkor az alap leírást vegye 
    if (!isset($page_description)) {
        $page_description = $meta_description;
    } else {
        $page_description = $Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($page_description));
        $page_description = str_replace('	', "", $page_description);
        if (strlen($page_description) > 165) {
            $page_description = substr($page_description, 0, 162) . '...';
        }
    }

    if (!isset($meta_ogimage)) {
        $meta_ogimage = "";
    }
//ha nincs a modulnak og képe akkor az alap og képet vegye 
    if (!isset($page_ogimage)) {
        $page_ogimage = $meta_ogimage;
    } else {

    }


//ez igy nem ok
//if (isset($getparams[2]))$menunavigaciohoz=menulistafel($getparams[2],"");
//arraylist($menunavigaciohoz);


    /* CHRONE run */
    include_once("chrone/web/action.php");
    /* CHRONE run */

if (page_settings("site_css") != "") {
    $template = "/styl/" . page_settings("site_css") . "/index";
    $stylefolder = "/styl/" . page_settings("site_css") . "/";
    $menuimg_folder = '.' . $stylefolder . "menu_img/";
}
if ($admintemplate==1){
    $template = "/styl/admin/index";
    $stylefolder = "/styl/admin/";
}
//acces
$sni = 0;
$jogok[$sni]["nev"] = "Guest";
$jogok[$sni]["id"] = $sni;
$sni = 1;
$jogok[$sni]["nev"] = "User";
$jogok[$sni]["id"] = $sni;
$sni = 2;
$jogok[$sni]["nev"] = "Member";
$jogok[$sni]["id"] = $sni;
$sni = 3;
$jogok[$sni]["nev"] = "Moderator";
$jogok[$sni]["id"] = $sni;
$sni = 4;
$jogok[$sni]["nev"] = "Admin";
$jogok[$sni]["id"] = $sni;

//statuszok
$status = array();
$sni = 1;
$status[$sni]["nev"] = "Aktiv";
$status[$sni]["id"] = $sni;
$sni = 2;
$status[$sni]["nev"] = "Szerkesztés alatt";
$status[$sni]["id"] = $sni;
$sni = 3;
$status[$sni]["nev"] = "Jóváhagyásra vár";
$status[$sni]["id"] = $sni;
$status[$sni]["nev"] = "Törölve";
$status[$sni]["id"] = $sni;
//staticvars
$selected = 'selected="selected"';
$checked = 'checked="checked"';

//gombok,ikonok
$bname = "edit";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/repair.gif" width="14px" height="14px" alt="' . $bname . '" />';
$bname = "del";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/pirosx.gif" width="14px" height="14px" alt="' . $bname . '" />';
$bname = "cut";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/ollo.gif" width="14px" height="14px" alt="' . $bname . '" />';
$bname = "plus";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/Orb-Blue-Plus.gif" width="14px" height="14px" alt="' . $bname . '" />';
$bname = "trash";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/kuka.gif" width="14px" height="14px" alt="' . $bname . '" />';
$bname = "refresh";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/refresh.gif" width="14px" height="14px" alt="' . $bname . '" />';
$bname = "reszletek";
$buttons["$bname"] = '<img src= "http://aux.iconpedia.net/uploads/1086757764169290854.png" height="16px" alt="' . $bname . '" />';
$bname = "like";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/like.png" width="16px" height="16px" alt="' . $bname . '" />';
$bname = "dislike";
$buttons["$bname"] = '<img src= "' . $homeurl . '/uploads/system/buttons/dislike.png" width="16px" height="16px" alt="' . $bname . '" />';

?>