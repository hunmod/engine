<?php
$tblmodulom='cars';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."cars";
$file_structuct=array();
$file_structuct["modules"]="cars";


//admin menü
$file_structuct["name"]="autók lista";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;


$file_structuct["name"]="autók lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy autó";
$file_structuct["file"]="car";
$modules[]=$file_structuct;



$carimg_loc='uploads/cars/';

include_once("class.cars.php");
$car_class=new cars();

$car_class->create_table();

//echo $menustart;
if (!isset($menustart))$menustart=0;
$menupontselectbox=$MenuClass->menu_selectbox($menustart,array(),$filtersm,$order='',$page='all');

//arraylist(menupontselectbox(1,$onearray,'','',''));
//arraylist($menupontselectbox);
//csak a hír menüpontok alá lehessen tenni
$menupontselectbox_cars[]=array("id"=>0,"nev"=>'nincs');
foreach ($menupontselectbox as $event_sel)
{
	if ($event_sel["modul"]=="cars" && $event_sel["file"]="list")
        $menupontselectbox_cars[]=$event_sel;
}

for ($i = 1; $i <= 20; $i++) {
	$sorrendarray[$i]["id"]=$i;
	$sorrendarray[$i]["nev"]=$i;	
}



?>