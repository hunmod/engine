<?php
//$rightside[]="./items/user/web/usermenu.php";
//$rightside[]="./items/fnct/web/widget_qr.php";
if ($getparams[4]>0)
{
	$hirid=($getparams[4]);
}else
if ($getparams[3]>0)
{
	$hirid=($getparams[3]);
}
else if (is_numeric ($getparams[2]))
{
	$hirid=($getparams[2]);
}
 



$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

$qhir=$place_class->get($filters) ;
$aprodata=($qhir['datas'][0]);

//
$aprodata["image"]=$place_class->getimg($hirid) ;
	//$menu=egymenuadat($aprodata["mid"]);
	//arraylist($aprodata);
if (count($aprodata)>0)
foreach ($aprodata as $megegyname=>$megegy)
{
	$aprodata[$megegyname]=$Text_Class->htmlfromchars($megegy);
	
}	
//arraylist($aprodata);
$alsolistas=$place_class->get(array("mid"=>$aprodata["tipus"]),' RAND()','all') ;
$alsolistas=$alsolistas["datas"];
//$tags=$place_class->get_ad_tag(array("ad"=>$alsolistas["id"],"status"=>'2'));
//$htags=$class_recipe->get_list('tags',array("status"=>2),"all");
//arraylist($tags);
$count=1;
foreach ($alsolistas as $alist){
if ($alist["id"]!=$hirid){
$alsolista[]=$alist;	
$count++;
if ($count>3)break;
}
}



$page_keywords="";
//$page_ogimage=$homeurl.'/'.$place_class->getimg($hirid,800,533) ;
$page_description="";
//$aprodata["image"]=$homeurl."/".$img;
$page_keywords=$Text_Class->tageketcsupaszit($aprodata["nev"]).",".$Text_Class->tageketcsupaszit($aprodata["cim"]);
$page_description=$Text_Class->levag($Text_Class->tageketcsupaszit($aprodata["leiras"]),350);
$pagetitle=" ".$aprodata["cim"];


?>