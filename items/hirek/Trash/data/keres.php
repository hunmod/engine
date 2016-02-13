<?php
$maxegyoldalon=30;
if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}
if ($_REQUEST["keres"]) {
	
$where=" AND (`cim` LIKE  '%".$_REQUEST["keres"]."%'";
$where.=" OR `hir` LIKE  '%".$_REQUEST["keres"]."%'";
$where.=" OR `hir2` LIKE  '%".$_REQUEST["keres"]."%' ";


$where.=" OR `cim` LIKE  '%".ekezetekeoda($_REQUEST["keres"])."%'";
$where.=" OR `hir` LIKE  '%".ekezetekeoda($_REQUEST["keres"])."%'";
$where.=" OR `hir2` LIKE  '%".ekezetekeoda($_REQUEST["keres"])."%' )";
};

//oldalak kiszámolása

$qcount="SELECT count(id) as db FROM ".$tbl['hir']." WHERE status=1".$where." ORDER BY `sorrend` ASC,`id` DESC";
$hszlistacount = db_Query($qcount, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$hszlistacount=$hszlistacount[0]["db"];
$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);
$q=$_GET["q"];

if ($oldal>=$oldalakszama){
	$oldal=$oldalakszama-1;
}
//oldalak kiszámolása

if ($oldalakszama!=""){
	$limit= "LIMIT ".($oldal*$maxegyoldalon).",".$maxegyoldalon;
}

$qhirekelemek="SELECT * FROM  ".$tbl['hir']." WHERE status=1".$where." ORDER BY `sorrend` ASC, `id` DESC  ".$limit;

$hirekelemek=db_Query($qhirekelemek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
//echo $qhirekelemek;
//arraylist ($hirekelemek);
/*
$almenu=menuadat($getparams[2],"hirek");
arraylist($almenu);*/
foreach($hirekelemek as $egy){
$c=0;
$pagekeywords.=",".$egy["cim"];
$pagedescription=",".$egy["cim"];

	if ($_REQUEST["keres"]){
$search  = array($_REQUEST["keres"], ekezetekeoda($_REQUEST["keres"]));
$replace = array('<span class="keresett">'.$_REQUEST["keres"].'</span>',
'<span class="keresett">'.ekezetekeoda($_REQUEST["keres"]).'</span>');

 $hirekelemek[$c]["hir"]=str_replace($search, $replace, $egy["hir"]);
				
	}
$c++;
}

$menu=egymenuadat($getparams[2]);
?>