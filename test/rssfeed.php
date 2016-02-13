<?php session_start();?>
<?php 
header('Content-Type: application/xml; charset=utf-8');
$q = "?";
echo '<'.$q.'xml version="1.0" encoding="utf-8" '.$q.'>'; 
?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
<?php
$rssmode=1;
include_once("items/allpagedatas.php");
$q = "?";
$auser["jogid"]=0;
?>
<channel>
	<title><?php echo $oldalneve;?></title>
	<link><?php echo $homeurl.$separator.$MenuClass->shorturl_get($getparams[0]."/".$getparams[1]."/".$getparams[2]);?></link>
    <description><![CDATA[<?php if ($pagedescription=="") {echo $metadescription;} else {echo $Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($pagedescription));}?>]]></description>
	<language>hu-HU</language>
	<copyright>Copyright 2013 Hunmod.</copyright>
	<generator>hunmod v2.0 http://www.hunmod.eu/</generator>
<?php if (file_exists ($file["rss"])){include_once($file["rss"]);}?> 
 </channel>        
</rss>
