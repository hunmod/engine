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



//
$filters['id']=$hirid;

if ($_GET["forcelook"]){
$filters['status']='all';
unset($filters['ido']);
}

$qhir=$bf_class->get($filters) ;
$aprodata=($qhir['datas'][0]);

//
$aprodata["image"]=$bf_class->getimg($hirid) ;
	//$menu=egymenuadat($aprodata["mid"]);
		$menu=$MenuClass->get_one_menu($aprodata["mid"]);
	//arraylist($aprodata);
if (count($aprodata)>0)
foreach ($aprodata as $megegyname=>$megegy)
{

	$aprodata[$megegyname]=$Text_Class->htmlfromchars($megegy);
	
}
$citydata=$Location_Class->get_city(array('id'=>$aprodata["varos"]));
$aprodata["varos_nev"]=$citydata['datas'][0]["city_name"];
//arraylist($aprodata);
$alsolistas=$bf_class->get(array("mid"=>$aprodata["mid"],"ido"=>$date),' RAND()','all') ;
$alsolistas=$alsolistas["datas"];
//$tags=$hir_class->get_ad_tag(array("ad"=>$alsolistas["id"],"status"=>'2'));
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
$page_ogimage=$bf_class->getimg($hirid,800,533) ;
$page_description="";
//$aprodata["image"]=$homeurl."/".$img;
$page_keywords=$Text_Class->tageketcsupaszit($aprodata["cim"]).",".$Text_Class->tageketcsupaszit($aprodata["hir"]);
$page_description=$Text_Class->levag($Text_Class->tageketcsupaszit($aprodata["hir"]),350);
$pagetitle=" ".$aprodata["cim"];


?>