<?php 
if ($getparams[2]>0){
$dfilters["id"]=$getparams[2];
}
if ($getparams[3]>0){
$dfilters["id"]=$getparams[3];
}
if ($getparams[4]>0){
$dfilters["id"]=$getparams[4];
}
$rssdatasq=$rss_class->get($dfilters);
$data=($rssdatasq["datas"][0]);
//arraylist($data);
$page_keywords="";
$page_ogimage="";
$page_description="";
$pagetitle=$data['title'];

$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
$widgets[]="items/ads/web/widget_side1.php";
?>