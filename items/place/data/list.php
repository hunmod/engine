<?php
$Sys_Class=new sys();

if ($_GET["s"]!=""){
	//echo ("fdfsd");
	$breadtext="Search / ".$_GET["s"];
	//arraylist($bcat);
}

$filters=$_GET;


$maxegyoldalon=20;
if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}


if($menukalatta!="")$filters['mid']=$menukalatta;

/*if ($auser["jog"]>=3){
$filters['status']='all';
}
else{
	
}*/
if ($_GET["status"]){
	$filters['status']=$_GET["status"];	
}


$qhir=$place_class->get($filters,'',$_GET["page"]) ;
//arraylist($qhir);
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
$title="Diétás boltok, helyek ";
$page_description="Helyet keresel ahol biztonságosan vásárolhatsz, vagy ehetsz, de nem tudod van e a közleben olyan hely ahol nem néznek UFO-nak ha gluténmentes,laktózmentes vagy cukormentes kaját kérsz?";

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
	$hirekids.=$Sys_Class->comasupport($hirekids);
	$hirekids.=$hirekelemek[$n]["id"];
	
//kulcsszavak
if ($page_keywords!=""){$page_keywords.=',';}	
$page_keywords.=$Text_Class->htmlfromchars($egy["nev"]);

$n++;	
}
//arraylist($hirekelemek);

//$tags=$place_class->get_ad_tag(array("ad"=>$hirekids));
//$tags=$class_recipe->get_list('tags',array("status"=>2),"all");

//echo $hirekids;

?>