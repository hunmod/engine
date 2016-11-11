<?php


/*
 FRANCIAAGY
 HAJSZARITO
 HIDROMASSZAZS-KAD
 IROASZTAL
 KAVE-TEA-BEKESZITES
 KET-FO
 KETAGYAS
 KIRALYI-AGY
 KONTOS
 LCD-TV
 LEGKONDI
 MAGNES-AJTOZAR
 MEGLEPETES
 MINIBAR
 PAPUCS
 PROFI-ZENELEJATSZO
 SZALLAS
 SZEF
 SZOBA-MERETE
 SZOBASZERVIZ
 SZOBATIPUS
 TELJES-ELLATAS
 TOROLKOZO-SZARITO
 TOROLKOZO
 TV
 UDVOZLOITAL
 ZUHANY
*/


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


//ads
$pos1.=',11';
$pos2.=',12';
$pos3.=',13';


if (!$filters['maxegyoldalon']) {
	$filters['maxegyoldalon'] = $maxegyoldalon = 3;
}
if(!$admintemplate){
$filters['today'] = $_SESSION["to"];
	//echo $_SESSION["to"];
}

if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}




//list
$form=new formobjects();
$status=$CsomagClass->status();
//filters

if(!$admintemplate){
$filters['lang']=$_SESSION["lang"];	
}



if ($_GET["status"]&&$_GET["status"]!='all'){
    $filters['status']=$_GET["status"];
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

$qhir=$CsomagClass->get($filters,'',$_GET["page"]) ;
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
hirekhirekelemek="SELECT * FROM  ".$tbl['hir']." WHERE mid in(".$menukalatta.$getparams[2].") ".$where." ORDER BY `sorrend` ASC, `id` DESC  ".$limit;
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

				unset($menufelette[count($menufelette)-1]);
               if(count($menufelette)) foreach(array_reverse($menufelette) as $mef){
                     if ($c<count($menufelette)){$xper=' / ';}
					else {$xper='';}
					$c++;
                                        $breadtext.=$mef["nev"].$xper;
                                         
                                        }
                                       
$page_description.=str_replace(' / ', '-', $breadtext);
if(count($hirekelemek)>0)
foreach($hirekelemek as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$hirekelemek[$n][$megegyname]=$Text_Class->htmlfromchars($megegy);
		
	}
	//kép
	$hirekelemek[$n]["image"]=$homeurl.$hir_class->getimg($egy["id"]) ;
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