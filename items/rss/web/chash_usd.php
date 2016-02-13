<?php
$link="http://api.napiarfolyam.hu/?valuta=usd";


$db = readDatabase($link);
if ($db[0]["penznem"]=="USD"){
	$arfolyam=($db[0]["vetel"]+$db[0]["eladas"])/2;
	updt_page_settings("usdhuf",$arfolyam);
}







?>