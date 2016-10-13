<?php
$deviza="HUF";

$tblmodulom='termek';
//$tblmodulom='shop_order';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."termek";

$file_structuct=array();
$file_structuct["modules"]="term";

$file_structuct["name"]="termek lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
/*
$file_structuct["name"]="egy termek";
$file_structuct["file"]="termek";
$modules[]=$file_structuct;


$file_structuct["name"]="Shop admin";
$file_structuct["file"]="admin";
$adminmenu[]=$file_structuct;
*/

include('class.termekek.php');

//echo $menustart;
//$menupontselectbox=menupontselectbox('103',$onearray,'','','');
//arraylist(menupontselectbox(1,$onearray,'','',''));

//shop megrendelés email
if (page_settings("shop_order_mail_subject_".$_SESSION["lang"])!="")$shop_order_mail_subject=page_settings("shop_order_mail_subject_".$_SESSION["lang"]);
if (page_settings("shop_order_mail_text_".$_SESSION["lang"])!="")$shop_order_mail_text=page_settings("shop_order_mail_text_".$_SESSION["lang"]);

foreach ($menupontselectbox as $event_sel)
{
	if ($event_sel["modul"]=="shop")
	$menupontselectbox_shop[]=$event_sel;
}




	






?>