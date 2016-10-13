<?php
$tblmodulom='page';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."page";
$file_structuct=array();
$file_structuct["modules"]="page";


/*admin menü*/
$file_structuct["name"]="Oldal lista";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;


$file_structuct["name"]="Oldal lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy oldal";
$file_structuct["file"]="hir";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy oldal2";
$file_structuct["file"]="hir2";
$modules[]=$file_structuct;


$hirimg_loc='uploads/page/';

include_once("class.page.php");
$page_class=new page();

$page_class->create_table();

//echo $menustart;
/*if (!isset($menustart))*/$menustart=0;
$menupontselectbox=$MenuClass->menu_selectbox($menustart,array(),$filtersm,$order='',$page='all');

//arraylist(menupontselectbox(1,$onearray,'','',''));
//arraylist($menupontselectbox);
//csak a hír menüpontok alá lehessen tenni
$menupontselectbox_hirek[]=array("id"=>0,"nev"=>'nincs');
foreach ($menupontselectbox as $event_sel)
{
	if ($event_sel["modul"]=="hirek" && $event_sel["file"]="list")
	$menupontselectbox_hirek[]=$event_sel;
}

for ($i = 1; $i <= 20; $i++) {
	$sorrendarray[$i]["id"]=$i;
	$sorrendarray[$i]["nev"]=$i;	
}




?>