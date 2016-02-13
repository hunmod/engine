<?php
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];
$filters=$_REQUEST;
if ($filters['user'])$filters['uid']=$filters['user'];
if ($filters['search'])$filters['s']=$filters['search'];
if (($getparams[2]!='72')&&($getparams[2]>0) ){
$filters['mid']=$getparams[2];
	}else
	if ($getparams[2]=='user'&&$getparams[3]<1){
		$filters['uid']=$auser['id'];
		if ($filters['status']==''){
		$filters['status']='all';
		}
	}
if ($auser["id"]>0)
{
$maxegyoldalon=$filters["maxegyoldalon"]=11;
}
else
{
$maxegyoldalon=$filters["maxegyoldalon"]=12;
}
//sitemap
if ($smmode==1){
$maxegyoldalon=$filters["maxegyoldalon"]='100';	
}


if (($_GET["page"]=="") || ($_GET["page"]<=0)){
	$oldal='0';
}
else {
	$oldal=$_GET["page"];
}


$order="id DESC ";
if (($_GET["search"]!="")||($auser["id"]>0)){
	$order="nev ASC ";
}

if ($rssmode==1){
	$order="id DESC ";
}
//sitemap, ha romlanak a helyezések ki kell venni
if ($smmode==1){
$order="RAND()";
}



//ne legyen benne adott hozzávaló
if($_REQUEST["not"]){

$filtersalapa["nevtrim"]=$_REQUEST["not"];
$tiltottalap=$rec_class->get_alapanyag($filtersalapa,$order='',$page='all'); 
	//arraylist($tiltottalap);
$notingr='';
if(count($tiltottalap['datas']))
{
	foreach ($tiltottalap['datas']as $elem){
	$notingr.=$Sys_Class->comasupport($notingr);
	$notingr.=$elem["id"];
	}
	//echo $notingr;	
	$filtersbf["ingrname"]=$notingr;
	$recipesbf=$rec_class->get($filtersbf,$order,'all');
	$notrec="";
	if(count($recipesbf['datas']))
	foreach ($recipesbf['datas']as $elem){
	$notrec.=$Sys_Class->comasupport($notrec);
	$notrec.=$elem["id"];
	}
$filters["notid"]=$notrec;
}
//echo $notrec;
//arraylist($dbadatbf);

}

//ne legyen benne adott hozzávaló
if($_REQUEST["is1"]){
$alapokdata=explode(',',$_REQUEST["is1"]);
$notingr='';

	foreach($alapokdata as $adta){
	$notingr2='';
	$filtersalapa["nev"]=$adta;
	$tiltottalap=$rec_class->get_alapanyag($filtersalapa,$order='',$page='all'); 
			//	arraylist($tiltottalap);

	if(count($tiltottalap['datas']))
		foreach ($tiltottalap['datas']as $elem2){

		$notingr2.=$Sys_Class->comasupport($notingr2);
		$notingr2.=$elem2["id"];
	}
		if($notingr!=""&&$notingr2!="")$notingr.='|';
		$notingr.=$notingr2;

	}
	echo $notingr;
	$filters['ingridsand']=$notingr;
}


$recipes=$rec_class->get($filters,$order,$oldal);
$dbadat=$recipes['datas'];
//arraylist($recipes);
//echo($recipes['query']);

$hszlistacount=$recipes['count'];
$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);

if (count($_GET)>0){
 foreach ($_GET as $name=>$value)
 {
	 if (($name!="q") && ($name!="page"))
	 {
		 $addoldalazoparam.="&".$name."=".$value;
	 }
 }	
}




$page_keywords="";
$page_ogimage="";
$page_description="";


$n=0;
foreach($dbadat as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$dbadat[$n][$megegyname]=$Text_Class->htmlfromchars($megegy);
	}
//arraylist($dbadat);


//kulcsszavak
$page_keywords.=$Text_Class->htmlfromchars($egy["nev"]);
if ($page_keywords!=""){$page_keywords.=',';}
$page_description.="#recept #speciálisdiéta ".$Text_Class->levag($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($egy["bevezeto"])),160);
	
$n++;	
}


//kiemelt
$dbkiemelt=$rec_class->get($filtersk,'`id` DESC','0');
$kiemeltrecept=$dbkiemelt['datas'][rand(0,count($dbkiemelt['datas'])-1)];
//arraylist($kiemeltrecept);




//echo ($qlekerdez);
/* lekérdezés*/
//arraylist($auser["id"]);

//kulcsszavak,leírás összegyűlytése
$pagekeywords="";
foreach ($dbadat as $egy){
	if ($pagekeywords!=""){
	$pagekeywords.=",";
	}
	$pagekeywords.=$egy["nev"];
	
}
if ($pagekeywords==""){
$pagekeywords=(page_settings("keywords"));
}
$pagetitle="Receptek speciális diétához";
//$pagedescription=$text."Receptek sepciális diétához,diabetikus és gluténmentes ételek. Receptkalkulátor, hozzávalók alapján.";

$pagedescription=substr($Text_Class->htmlfromchars($text."Receptek keresése ".$pagekeywords), 0, 140);
//echo $pagekeywords;

	$maxoldalazonum=10;
if ($oldalakszama>$maxoldalazonum){
	
	$start=$oldal-round($maxoldalazonum/2);
	if ($start<1){
		$start=0;
		$end=$maxoldalazonum;	
	}
	else{
		
		$end=$start+$maxoldalazonum;
		if ($end>$oldalakszama)
		{
		$end=$oldalakszama;
		$start=$oldalakszama-$maxoldalazonum;
		}
		
	}
}
else
{
	$start=0;
	$end=$oldalakszama-1;
}
?>