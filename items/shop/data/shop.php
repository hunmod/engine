<?php
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/shop/web/widget_kosar.php";
$leftside[]="./items/shop/web/widget_menu.php";

$filters["id"]=$hirid=($getparams[2]);
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

if (($auser["jogid"]>=3)){
$where= " AND status!=4 ";
	$filters["status"]='all';
}
else
{

$where= " AND status=1 ";		
}

/*
$qelemek="SELECT * FROM  ".$tbl['shop']." WHERE id ='".$hirid."' ".$where." LIMIT 1";
$elemek=db_Query($qelemek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
*/
$elemek=$ShopClass->get($filters,$order='',$page='all');
$pagedata=$elemek["datas"][0];
//text
$qgt['id']=$filters['id'];
$datasgt=$ShopClass->get_text('hu',$qgt);
$pagedata+=$datasgt['datas'][0];
//$menu=egymenuadat($pagedata["mid"]);
//arraylist($pagedata);
$page_keywords="";
$page_ogimage="";
$page_description="";

$mappa=$folders["uploads"].$getparams[0]."/".$pagedata["id"];
$mimg=randomimgtofldr("uploads/".$mappa);
if ($mimg!="none"){
	$img="uploads/picture.php?picture=".encode($mappa."/".$mimg)."&y=100&ext=.jpg";
	$page_ogimage=$homeurl."/uploads/picture.php?picture=".encode($mappa."/".$mimg)."&x=600&ext=.jpg";
}
else{
	$img="uploads/".$defaultimg;
}

foreach ($pagedata as $megegyname=>$megegy)
{
	$pagedata[$megegyname]=$Text_Class->htmlfromchars($megegy);
}	

$pagedata["image"]=$homeurl."/".$img;

$page_keywords=$Text_Class->tageketcsupaszit($pagedata["title"]).",".$Text_Class->tageketcsupaszit($pagedata["hir"]);
$page_description=$Text_Class->levag($Text_Class->tageketcsupaszit($pagedata["hir"]),350);
$pagetitle=" ".$pagedata["title"];



?>