<?php 


$Sys_Class=new sys();



$filters=$_GET;

$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];
if($getparams[2]!=''){
	//$menu=egymenuadat($getparams[2]);
	$menu=$MenuClass->get_one_menu($getparams[2]);
	//arraylist($menu);
	$menualatta=$MenuClass->get_menus_down($getparams[2],array());
	//arraylist($menualatta);
	$menufelette=$MenuClass->menulistafel($getparams[2]);
	//arraylist($menufelette);
	$wherein.=$Sys_Class->comasupport($wherein);
	$wherein.=$getparams[2];
}

//ads






$maxegyoldalon=8;
if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}



/*if ($auser["jog"]>=3){
$filters['status']='all';
}
else{
	
}*/
if ($_GET["status"]){
	$filters['status']=$_GET["status"];	
}
if ($_GET["name"]){
	$filters['cim']=$_GET["name"];	
}
if ($_GET["s"]){
	$filters['s']=$_GET["s"];	
}


$qhir=$cimek_class->get($filters,'',$_GET["page"]) ;
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
	$hirekelemek[$n]["image"]=$homeurl.$cimek_class->getimg($egy["id"]) ;
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
//$tags=$cimek_class->get_ad_tag(array("ad"=>$hirekids));
//$tags=$class_recipe->get_list('tags',array("status"=>2),"all");

//echo $hirekids;

?>