<?php

$Sys_Class=new sys();

if ($_GET["s"]!=""){
	//echo ("fdfsd");
	$breadtext="Search / ".$_GET["s"];
	//arraylist($bcat);
}

if ($_GET["tag"]!=""){
	//echo ("fdfsd");
	$breadtext="Tag / ".$_GET["tag"];
	//arraylist($bcat);
}

//$leftside[]="./items/user/web/usermenu.php";
//$leftside[]="./items/ads/web/widget_side1.php";  
$filters=$_GET;

$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

if($maxegyoldalon<1){$maxegyoldalon=8;}else{$filters['maxegyoldalon']=$maxegyoldalon;}

if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}



//list
$form=new formobjects();
$status=$SiteClass->status();


//filters
if ($_GET["status"]){
    $filters['status']=$_GET["status"];
}
else $filters['status']=2;
$filters['lang']=$_SESSION['lang'];
if ($getparams[2]){
    $filters['mid']=$getparams[2];
}
if ($_GET["mid"] && $_GET["mid"]!='all'){
    $filters['mid']=$_GET["mid"];
}
/*if ($_GET["name"]){
    $filters['cim']=$_GET["name"];
}
if ($_GET["s"]){
    $filters['s']=$_GET["s"];
}
if ($_GET["tag"]){
    $filters['tag']=$_GET["tag"];
}
*/
//if (!$adminv)$filters['ido']=$date;

$qhir=$SiteClass->get($filters,'',$_GET["page"]) ;
$hirekelemek=($qhir['datas']);
$hszlistacount=$qhir['count'];

//arraylist($qhir);

//arraylist($qhir);

$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);
$q=$_GET["q"];

if ($oldal>=$oldalakszama){
    $oldal=$oldalakszama-1;
}
//oldalak kiszámolása
/*
if ($oldalakszama!=""){
    $limit= "LIMIT ".($oldal*$maxegyoldalon).",".$maxegyoldalon;
}
*/
$page_keywords="";
$page_ogimage="";
$page_description="";

$hirekids="";
$n=0;

$c=1;

$menu=$MenuClass->get_one_menu($filters['mid']);



unset($menufelette[count($menufelette)-1]);
if(count($menufelette)) foreach(array_reverse($menufelette) as $mef){
if ($c<count($menufelette)){$xper=' / ';}
else {$xper='';}
$c++;
$breadtext.=$mef["title"].$xper;
 
}
                                       
$page_description.=str_replace(' / ', '-', $breadtext);
if(count($hirekelemek)>0)
foreach($hirekelemek as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$hirekelemek[$n][$megegyname]=$Text_Class->htmlfromchars($megegy);

	}
	//kép
	/*$hirekelemek[$n]["image"]=$homeurl.$hir_class->getimg($egy["id"]) ;
	$hirekids.=$Sys_Class->comasupport($hirekids);
	$hirekids.=$hirekelemek[$n]["id"];*/
	

	
	
//kulcsszavak
$page_keywords.=$Text_Class->htmlfromchars($egy["title"]);
  $page_description.=$Text_Class->levag($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($egy["leadtext"])),50);

if ($page_keywords!=""){$page_keywords.=',';}
	
$n++;	
}
//arraylist($hirekelemek);

/*$page_keywords.=$Text_Class->htmlfromchars($egy["title"]);

$page_description.=$Text_Class->levag($Text_Class->tageketcsupaszit($hirekelemek[0]["hir"]),200);
//$tags=$hir_class->get_ad_tag(array("ad"=>$hirekids));
//$tags=$class_recipe->get_list('tags',array("status"=>2),"all");
*/
//echo $hirekids;

?>