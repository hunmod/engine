<?php
include_once "class.AbsRssReader20.php";

/*$links[]="http://itcafe.hu/hirfolyam/anyagok/rss.xml";*/
//$links[]="http://belsoseg.blog.hu/rss";
$links[]="http://www.a5.hu/cikkek/rss.xml";

/*$links[]="http://totalcar.hu/24ora/rss/";
$links[]="http://www.autonavigator.hu/rss/gepjarmu_tavirati_iroda";
$links[]="http://www.autonavigator.hu/rss/sztori";*/

foreach ($links as $link){
	$xml = new AbsRssReader20();
	$xml->Load($link);
	// Get Items
	$chItems = $xml->GetItems();
		if (is_array($chItems) and count($chItems)>0)
	{?>
        <?php  //echo print_r($chItems);
		foreach ($chItems as $chItem) {
$chItem["pubDate2"]=strtotime($chItem["pubDate"]);
			$rssarray[]=$chItem;
		}
	}
}

//var_dump($rssarray[0]);

function cmp($a, $b)
{
    if ($a["pubDate2"] == $b["pubDate2"]) {
        return 0;
    }
    return ($a["pubDate2"] > $b["pubDate2"]) ? -1 : 1;
}
usort($rssarray, "cmp");

foreach ($rssarray as $chItem) {
$pagewords.=$chItem["title"];
}