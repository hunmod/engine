<?php
$Utolsoelemfile = 'items/konyha/lastbublicpinter.txt';
// Open the file to get existing content
$lastrecid = file_get_contents($Utolsoelemfile);
//$lastrecid = 101;
//echo($lastrecid);
$maxegyoldalon=$filters["maxegyoldalon"]=300;



$order=' id DESC';
$filters["idmin"]=$lastrecid;	

$recipes=$rec_class->get($filters,$order,$oldal);
$dbadat=$recipes['datas'];
//arraylist($recipes);
//echo($recipes['query']);



?>