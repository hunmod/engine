<?php
$link="http://api.napiarfolyam.hu/?valuta=eur";
$db = readDatabase($link);
if ($db[0]["penznem"]=="EUR"){
	$arfolyam=($db[0]["vetel"]+$db[0]["eladas"])/2;
	updt_page_settings("eurhuf",$arfolyam);
}

?>