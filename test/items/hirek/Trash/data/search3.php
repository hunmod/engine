<?php
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

if (!$_GET["mid"]){
	$_GET["mid"]=20;
	$getparams[2]=20;
}else{
	$getparams[2]=$_GET["mid"];
	
}
$_GET["s"]=$_REQUEST["s"];
$menuk=$MenuClass->get_menus_down(20,array());

include('list.php');
$hszlistacount3=$hszlistacount;
//arraylist( $qhir);
//
	$s2=15;
	$menuk2=$MenuClass->get_menus_down($s2,array());
	$menu2=$MenuClass->get_one_menu($s2);
	$menualatta2=$MenuClass->get_menus_down($s2,array());
	$wherein2.=$s2;
	if (count($menualatta2))foreach($menualatta2 as $mea)
	{
		$wherein2.=$Sys_Class->comasupport($wherein2);
		$wherein2.=$mea["id"];
	}
//echo  $wherein;
$menukalatta2=$wherein2;
if($menukalatta2!="")$filters2['mid']=$menukalatta2;
if ($_GET["name"]){
	$filters2['cim']=$_GET["name"];	
}
if ($_GET["s"]){
	$filters2['s']=$_GET["s"];	
}
if ($_GET["tag"]){
	$filters2['tag']=$_GET["tag"];	
}
if ($_GET["ido"]){
	$filters2['ido']=$date;	
}
$qhir2=$hir_class->get($filters2,'',1) ;
$hszlistacount2=$qhir2['count'];

//ingred
	$s3=17;
	$menuk3=$MenuClass->get_menus_down($s3,array());
	$menu3=$MenuClass->get_one_menu($s3);
	$menualatta3=$MenuClass->get_menus_down($s3,array());
	$wherein3.=$s3;
	if (count($menualatta3))foreach($menualatta3 as $mea)
	{
		$wherein3.=$Sys_Class->comasupport($wherein3);
		$wherein3.=$mea["id"];
	}
//echo  $wherein;
$menukalatta3=$wherein3;
if($menukalatta3!="")$filters3['mid']=$menukalatta3;
if ($_GET["name"]){
	$filters3['cim']=$_GET["name"];	
}
if ($_GET["s"]){
	$filters3['s']=$_GET["s"];	
}
if ($_GET["tag"]){
	$filters3['tag']=$_GET["tag"];	
}
if ($_GET["ido"]){
	$filters3['ido']=$date;	
}
//echo "<br />ING: ";
$qhir3=$hir_class->get($filters3,'',1) ;
$hszlistacount1=$qhir3['count'];


$sf['s']=$_REQUEST["s"];
if ($_GET["tag"]){
	$sf['tag']=$_GET["tag"];	
}

//arraylist ($sf);
//sys:arraylist($arrcepies);
$arrcepies=$class_recipe->get($sf,'',$_REQUEST["page"]);
$allrecipes=$arrcepies["datas"];
$countrecipe=$arrcepies["count"];

$datass=$s_class->get($_GET,$order='',$page='all');
$hszlistacount4=$datass["count"];

$page_description="Offers:";
foreach($hirekelemek as $egy){

//kulcsszavak
$page_keywords.=tageketcsupaszit(htmlfromchars($egy["cim"]));
if ($page_keywords!=""){$page_keywords.=',';}
$page_description.=levag(tageketcsupaszit($egy["hir2"]),200);
	
	
$n++;	
}

?>