<?php
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];
/*
$filtersm["mid"]=19;
$filtersm["status"]=1;
$qmenu=$MenuClass->get_menu($filtersm,$order='',$page='all');
*/
/*$filtersm["modul"]="video";*/
$qmenu=$MenuClass->menu_selectbox($getparams[2],array(),$filtersm,$order='',$page='all');


$video_class=new video();
$vdatas=$video_class->get($_GET);
//arraylist($datas);


$page_keywords=$page_description="Videos";

foreach ($qmenu as $data){
$page_description.=	','.$data['nev'];
$page_keywords.=','.$data['nev'];
}

 $thmenu= ($MenuClass->get_one_menu($getparams[2])) ;


$page_ogimage="";
$pagetitle=$thmenu["nev"];

//arraylist($qmenu);
?>