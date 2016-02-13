<?php
$tblmodulom='gmrec';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."web_gmrec";
$file_structuct=array();
$file_structuct["modules"]="gmrec";


/*admin menü*/
$file_structuct["name"]="gmrecek lista";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;


$file_structuct["name"]="Recept lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy recept";
$file_structuct["file"]="rec";
$modules[]=$file_structuct;


$hirimg_loc='uploads/gmrec/';
$defaultimg='_engine/noimage.jpg';
include_once("class.gmrec.php");
$gmrec_class=new gmrec();

$gmrec_class->create_table('allergen');
$gmrec_class->create_list('allergen');
//list load
/*
$data = array(`id` ,`name` ,`status`)
$gmrec_class->save_list('allergen',$data);
$filter = array(`id` ,ids,`name` ,`name2` ,`status`)
$gmrec_class-get_list('allergen',$filter)
*/



//echo $menustart;
/*if (!isset($menustart))*/$menustart=0;
$menupontselectbox=$MenuClass->menu_selectbox($menustart,array(),$filtersm,$order='',$page='all');

//arraylist(menupontselectbox(1,$onearray,'','',''));
//arraylist($menupontselectbox);
//csak a hír menüpontok alá lehessen tenni
$menupontselectbox_hirek[]=array("id"=>0,"nev"=>'nincs');
foreach ($menupontselectbox as $event_sel)
{
	//if ($event_sel["modul"]=="hirek" && $event_sel["file"]="list")
	$menupontselectbox_hirek[]=$event_sel;
}

for ($i = 1; $i <= 20; $i++) {
	$sorrendarray[$i]["id"]=$i;
	$sorrendarray[$i]["nev"]=$i;	
}



?>