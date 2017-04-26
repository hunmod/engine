<?php

if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$admintemplate=1;

$filters["mindate"]=$dateprint;
$filterse["lang"]=$filterss["lang"]=$filters["lang"]="hu";
$filterse["status"]=$filterss["status"]=$filters["status"]=2;

//$csomagokarray=$CsomagClass->get($filters,'',$_GET["page"]) ;
$sitesarray=$SiteClass->get($filterss,'',$_GET["page"]) ;
//$eventsarray=$PlacesClass->get($filterse,'',$_GET["page"]) ;


if ($_POST) {
    $datas = $_POST;
    $values=json_encode($datas);
    updt_page_settings('homelements',$values);
}
else{
    $datas = json_decode(page_settings("homelements"),true);

}
//arraylist($datas);
?>