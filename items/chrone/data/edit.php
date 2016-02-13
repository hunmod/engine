<?php
$rightside[]="./items/user/web/usermenu.php";
$rightside[]="./items/fnct/web/widget_qr.php";

/* kapott adat feldolgozása*/

if (count($_POST))
{
//	$kapott=$_POST;
$formelements=cron_editform_form($_POST);	
arraylist($_POST);
gen_form_save($formelements,"chron",$_POST);
header("Location: ".$separator."chrone/list");

}
else
{
	$dbadat=array();
	if ($getparams[2]>0)
	{
	$dbadat=select_one_cron($getparams[2]);	
	//arraylist($dbadat);	
	}
	$formelements=cron_editform_form($dbadat);
}
/* kapott adat feldolgozása*/

/*
$qchrone="
INSERT INTO  `system_chron` (
`id` ,
`name` ,
`file` ,
`lastrun` ,
`interval` ,
`status`
)
VALUES (
NULL ,  'euroarfolyam',  'items\\rss\\web\\chash.php', NOW( ) ,  '1',  '1'
);";
*/
?>