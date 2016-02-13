<?php
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

$pagerurl=$homeurl.$separator.'video/'.$getparams[1].'/'.$getparams[2];


$maxegypageon=8;
if (($_GET["page"]=="") || ($_GET["page"]<=0)){
	$page=0;
}
else {
	$page=$_GET["page"];
}


$qmenu=$MenuClass->get_menu(array('id'=>$getparams[2]),'',0);
//arraylist($qmenu);



  $datas=$video_class->get(array("mid"=>$getparams[2])," id DESC",$_GET["page"]);

$count=$datas["count"];
$pageakszama=ceil ($count/$maxegypageon);
//arraylist($datas);


$page_keywords=$page_description="Videos,".$qmenu['datas'][0]['nev'];




$page_ogimage="";
$page_description=$pagetitle=$lan['videok'].' '.$qmenu['datas'][0]['nev'];

?>