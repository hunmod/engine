<?php
$menupontselectbox=$MenuClass->menu_selectbox(0,array(),$filtersm,$order='',$page='all');

$tblmodul='rsschanel';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."rsschanel";
$tblmodul='rssdata';
$tbl[$tblmodul]=$adatbazis["db1_db"].".".$prefix."rssdata";

$file_structuct["modules"]="rss";

$file_structuct["name"]="rss hírcsatorna";
$file_structuct["file"]="list";
$modules[]=$file_structuct;

$file_structuct["name"]="EURO napi árfolyam";
$file_structuct["file"]="items/".$file_structuct["modules"]."/web/chash_eur.php";
$chronemenu[]=$file_structuct;
$file_structuct["name"]="USD napi árfolyam";
$file_structuct["file"]="items/".$file_structuct["modules"]."/web/chash_usd.php";
$chronemenu[]=$file_structuct;

include('class_rss.php');
$rss_class=new rss();

$menupontselectbox_rss[]=array("id"=>0,"nev"=>'nincs');
foreach ($menupontselectbox as $event_sel)
{
	if ($event_sel["modul"]=="rss" && $event_sel["file"]="list")
	$menupontselectbox_rss[]=$event_sel;
}



function readDatabase($filename) 
{
    // read the XML database of aminoacids
    $data = implode("", file($filename));
    $parser = xml_parser_create();
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, $data, $values, $tags);
    xml_parser_free($parser);

    // loop through the structures
    foreach ($tags as $key=>$val) {
        if ($key == "item") {
            $molranges = $val;
            // each contiguous pair of array entries are the 
            // lower and upper range for each molecule definition
            for ($i=0; $i < count($molranges); $i+=2) {
                $offset = $molranges[$i] + 1;
                $len = $molranges[$i + 1] - $offset;
                $tdb[] = parseMol(array_slice($values, $offset, $len));
            }
        } else {
            continue;
        }
    }
    return $tdb;
}

function parseMol($mvalues) 
{
    for ($i=0; $i < count($mvalues); $i++) {
        $mol[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
    }
    return ($mol);
}


/*tábla létrehozása ha nincs*/
if ($tblexists[$tbl["rsschanel"]]!=1)
{
$qreatetbl="CREATE TABLE IF NOT EXISTS ".$tbl["rsschanel"]." (
  `id` int(11) NOT NULL auto_increment,
  `mid` int(11) NOT NULL,
  `url` text NOT NULL,
  `period` int(11) NOT NULL,
  `ido` timestamp NULL default NULL,
  `status` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `ido` (`ido`),
  KEY `mid` (`mid`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
$returnquery=db_Query($qreatetbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");
$qreatetbl="CREATE TABLE IF NOT EXISTS ".$tbl["rssdata"]." (
  `id` int(11) NOT NULL auto_increment,
  `chanelid` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `category` varchar(230) NOT NULL,
  `group` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `content` TEXT NOT NULL,
  `link` varchar(230) NOT NULL,
  `pubDate2` datetime NOT NULL,
  `comments` varchar(230) NOT NULL,
  `guid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `link` (`link`,`guid`),
  KEY `category` (`category`,`group`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
$returnquery=db_Query($qreatetbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");
}
?>