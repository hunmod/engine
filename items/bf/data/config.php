<?php
$tblmodulom='bf';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."bf";
$file_structuct=array();
$file_structuct["modules"]="bf";

$file_structuct["name"] = "Balaton list";
$file_structuct["file"] = "list";
$modules[] = $file_structuct;

/*admin menü*/
$file_structuct["name"]="Balaton list";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;
$bfimg_loc='uploads/bf/';

include_once("class.bf.php");
$bf_class=new bf();
//$bf_class->create_table();

?>