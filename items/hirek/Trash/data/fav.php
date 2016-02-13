


<?php
//$leftside[]="./items/user/web/usermenu.php";
//$leftside[]="./items/ads/web/widget_side1.php";  

$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];


if ($_GET['dfav']>0)
{
		$hir_class->user_favorite_ads($_SESSION['uid'],$_GET['dfav'],'4');
		//megszámolom hány érvényes elem van.
		$en=$hir_class->get_user_favorite_ads(array("ad_id"=>$_GET['dfav']));
		$c=count($en);
		//visszaírom a jobs táblába
		$en=$hir_class->save(array("id"=>$_GET['dfav'],"favorite_count"=>$c));
}


$maxegyoldalon=30;
if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}


$filters["fav"]=$auser['id'];


$qhir=$hir_class->get($filters,'',$_GET["oldal"]) ;
$hirekelemek=($qhir['datas']);
$hszlistacount=$qhir['count'];

//arraylist($filters);



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
if (count($hirekelemek))foreach($hirekelemek as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$hirekelemek[$n][$megegyname]=htmlfromchars($megegy);
		
	}
	//kép
	$hirekelemek[$n]["image"]=$homeurl.$hir_class->getimg($egy["id"]) ;
	$hirekids.=$Sys_Class->comasupport($hirekids);
	$hirekids.=$hirekelemek[$n]["id"];
	
//kulcsszavak
$page_keywords.=htmlfromchars($egy["cim"]);
if ($page_keywords!=""){$page_keywords.=',';}
$page_description.=levag(tageketcsupaszit($egy["hir"]),200);
	
	
$n++;	
}
$tags=$hir_class->get_ad_tag(array("ad"=>$hirekids));
//echo $hirekids;

?>