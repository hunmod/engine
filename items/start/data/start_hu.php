<?php


$extrascript[]= ' 
<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="'.$homeurl.$makemin->css('/scripts/owl-carousel/owl.carousel.css','/scripts/owl-carousel/owl.carousel.min.css').'" />
 <!-- Default Theme -->
 <link rel="stylesheet" href="'.$homeurl.$makemin->css('/scripts/owl-carousel/owl.theme.css','/scripts/owl-carousel/owl.theme.min.css').'" />
 <!-- Include js plugin -->
<script src="'.$homeurl.'/scripts/owl-carousel/owl.carousel.min.js"></script>';




//Új receptek
$filtersk["maxegyoldalon"]=3;
$dbkiemelt=$rec_class->get($filtersk,'`id` DESC','0');
$kiemeltreceptek=$dbkiemelt['datas'];
//arraylist($kiemeltrecept);


//Új receptek
$filtersk["maxegyoldalon"]=8;
$dbrec=$rec_class->get($filtersk,'`id` DESC','1');
$receptekreceptek=$dbrec['datas'];
//arraylist($kiemeltrecept);



//friss magazin cikkek
$filtersm['mid']=94;
$filtersm["maxegyoldalon"]=6;
$qhir=$hir_class->get($filtersm,'',$_GET["page"]) ;
$hirekelemek1=($qhir['datas']);


//friss magazin cikkek
$filtersm['mid']=94;
$filtersm["maxegyoldalon"]=8;
$qhir=$hir_class->get($filtersm,'',$_GET["page"]) ;
$hirekelemek2=($qhir['datas']);


//friss hírcsatrona elemek1
$dfiltersf['mid']=172;
$qeszkoztipus=$rss_class->chanel_get($dfiltersf,$order='',$page='all');
//arraylist($qeszkoztipus);
$eszkozok=$qeszkoztipus['datas'];
	// $eszkozok=$output["valasztomb"];
	//arraylist($eszkozok);
	$chanelsid="";
	foreach ($eszkozok as $egyeszkoz){
		if ($chanelsid!=""){$chanelsid.=",";}
		$chanelsid.=$egyeszkoz["id"];
	}
$dfilters["chanelid"]=$chanelsid;
$dfilters["maxegyoldalon"]=3;
$rssdatasq=$rss_class->get($dfilters,$order='',$page=$_REQUEST['page']);
$rssdatas=$rssdatasq['datas'];


$page_ogimage=$homeurl.'/'.$stylefolder.'img/fblink.jpg';
$page_description="Abrak a hasba a speciális diétás szakácskönyv. gluténmentes, laktózmentes, cukormentes, diabetikus recepetek kalóriatáblázattal. Tölsd fel te is kedvenc recepted!";

?>