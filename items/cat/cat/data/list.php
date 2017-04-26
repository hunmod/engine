<?php 
$Sys_Class=new sys();
$status = $category_class->status();

$filters=$_GET;

$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

$maxegyoldalon=8;
if($filterscim['maxegyoldalon'])$maxegyoldalon=$filters['maxegyoldalon']=$filterscim['maxegyoldalon'];

/* Kategória root lekérdezése*/
$filtersmenu['lang']='hu';
$filtersmenu['kat']='root';
$menudata1= $category_class->get($filtersmenu, $order = '', $page = 'all');
// arraylist($menudata1);
$katmenu=array();
$katmenuelem['id']='root';
$katmenuelem['nev']='Root';
$katmenu[]=$katmenuelem;
if(isset($menudata1['datas']))foreach ($menudata1['datas']as $katm){
	$katmenu[]=  $katm;
}
/* Kategória root lekérdezése*/



if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}

if ($_GET["status"]){
	$filters['status']=$_GET["status"];	
}
if ($_GET["name"]){
	$filters['cim']=$_GET["name"];	
}

$filters["lang"]='hu';

//if (!$adminv)$filters['ido']=$date;

$qhir=$category_class->get($filters,'',$_GET["page"]) ;
$hszlistacount=$qhir['count'];
$hirekelemek=$qhir['datas'];

//arraylist($filters);

//arraylist($qhir);

$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);
$q=$_GET["q"];

if ($oldal>=$oldalakszama){
	$oldal=$oldalakszama-1;
}
//oldalak kiszámolása

if ($oldalakszama!=""){
	$limit= "LIMIT ".($oldal*$maxegyoldalon).",".$maxegyoldalon;
}

/*
$qhirekhirekelemek="SELECT * FROM  ".$tbl['hir']." WHERE mid in(".$menukalatta.$getparams[2].") ".$where." ORDER BY `sorrend` ASC, `id` DESC  ".$limit;

$hirekelemek=db_Query($qhirekhirekelemek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");*/
/*echo $qhirekhirekelemek;
echo ($elem["uid"]);*/
//arraylist ($hirekhirekelemek);
/*
$almenu=menuadat($getparams[2],"hirek");
arraylist($almenu);*/
$page_keywords="";
$page_ogimage="";
$page_description="";

$hirekids="";
$n=0;

$c=1;


                                       
$page_description.=str_replace(' / ', '-', $breadtext);
if(count($hirekelemek)>0)
foreach($hirekelemek as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$hirekelemek[$n][$megegyname]=$Text_Class->htmlfromchars($megegy);
		
	}
	//kép
	$hirekelemek[$n]["image"]=$homeurl.$category_class->getimg($egy["id"]) ;
	$hirekids.=$Sys_Class->comasupport($hirekids);
	$hirekids.=$hirekelemek[$n]["id"];
	
//kulcsszavak
$page_keywords.=$Text_Class->htmlfromchars($egy["cim"]);
if ($page_keywords!=""){$page_keywords.=',';}	
	
$n++;	
}
//arraylist($hirekelemek);

$page_keywords.=$Text_Class->htmlfromchars($egy["cim"]);

$page_description.=$Text_Class->levag($Text_Class->tageketcsupaszit($hirekelemek[0]["hir"]),200);
//$tags=$hir_class->get_ad_tag(array("ad"=>$hirekids));
//$tags=$class_recipe->get_list('tags',array("status"=>2),"all");

//echo $hirekids;

?>