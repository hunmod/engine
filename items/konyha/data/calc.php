<?php
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/konyha/web/widget_receptkeres.php";
$leftside[]="./items/konyha/web/widget_submenu.php";
$leftside[]="./items/ads/web/widget_side1.php";

$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

$pagekeywords=(page_settings("keywords"));
$pagetitle=$lan["receptkalkulator"];
$page_description=$lan["kakulatormeta"];
//echo $pagekeywords;


/* lekérdezés*/
$qlekerdez="
SELECT * 
FROM  ".$tbl['recept']." WHERE id=".$getparams[2]."
";
//$egyelem=db_Query($qlekerdez, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
//$elem=$egyelem[0];
/* lekérdezés*/


/*$formelements=recept_text_form($dbadat);*/

$typ["value"]="id";
$typ["name"]="nev";
$elem["typ"];
?>