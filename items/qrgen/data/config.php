<?php
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."web_hir";
$file_structuct=array();
$file_structuct["modules"]="qrgen";

$file_structuct["name"]="QR generator";
$file_structuct["file"]="vcard";
$modules[]=$file_structuct;
if (isset($getparams[0]))
if ($getparams[0]==$file_structuct["modules"]){
$pagekeywords="QR,vcard,link,wifi";
$pagedescription="QR kód generátor,vcard névjegy,wifibeállítás,szöveg....";
}
?>