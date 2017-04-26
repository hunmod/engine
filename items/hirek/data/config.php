<?php
$tblmodulom='hir';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."web_hir";
$file_structuct=array();
$file_structuct["modules"]="hirek";


//admin menü
$file_structuct["name"]="Hirek lista";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;


$file_structuct["name"]="Hirek lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="Hirek paralax lista";
$file_structuct["file"]="list_paralax";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy hir";
$file_structuct["file"]="hir";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy hir2";
$file_structuct["file"]="hir2";
$modules[]=$file_structuct;


$hirimg_loc='uploads/hirek/';

include_once("class.hir.php");
$hir_class=new hir();

$hir_class->create_table();

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



function youtoubecserel($text)
{
$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
$ideglenes=$text;
$notgood=0;
do {
	$matches=array();
	preg_match($pattern, $ideglenes, $matches);
//arraylist($matches);

  if (isset($matches[1])){
	  $cserel[]="http://www.".$matches[0];
	  $cserel[]="https://www.".$matches[0];

	  $mire[]='<iframe style="max-width:560px;width:100%;" height="315" src="valdermort/embed/'. $matches[1].'" frameborder="0" allowfullscreen></iframe>';
	  	  $mire[]='<iframe style="max-width:560px;width:100%;" height="315" src="valdermort/embed/'. $matches[1].'" frameborder="0" allowfullscreen></iframe>';
	  $ideglenes = str_replace ($cserel,$mire,$ideglenes);
	  // echo $ideglenes."<br>";   
  }
  else {$notgood=1;}

} while ($notgood==0);
  	$ideglenes = str_replace ("valdermort","http://www.youtube.com",$ideglenes);   
//arraylist($mire);
return $ideglenes;
}
?>