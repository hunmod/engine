<?php
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
$widgets[]="items/ads/web/widget_side1.php"; 

$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

$maxegyoldalon=30;
if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}
//oldalak kiszámolása
if (($auser["jogid"]>=3)){
$where= " AND status!=4 ";	
}
else
{
$where= " AND status=1 ";		
}


$hirekelemekq=$MenuClass->get_menu(array('mid'=>$getparams[2]),'`sorrend` ASC,`id` DESC','all');

$hirekelemek=$hirekelemekq["datas"];

$page_keywords="";
$page_ogimage="";
$page_description="";


$n=0;
foreach($hirekelemek as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$hirekelemek[$n][$megegyname]=$Text_Class->htmlfromchars($megegy);
	}
	//kép
	$thisid=$egy["id"];
	if ($egy["item"]>0){
	$thisid=$egy["item"];	
	}
	$hirekelemek[$n]["this"]=$thisid;
	$mappa="uploads/"."menu_img/".$thisid;
	//echo $mappa;
	$img=randomimgtofldr($mappa);
	if ($img!="none"){
		$img="picture2.php?picture=".encode($mappa."/".$img)."&x=300&y=200&ext=.jpg";
		$page_ogimage=$img;		
	}
	else{
		$img="uploads/".$defaultimg;
	}
	$hirekelemek[$n]["image"]=$homeurl."/".$img;
//kulcsszavak
$page_keywords.=$Text_Class->htmlfromchars($egy["cim"]);
if ($page_keywords!=""){$page_keywords.=',';}
$page_description.=$Text_Class->levag($Text_Class->tageketcsupaszit($egy["hir"]),200);
	
	
$n++;	
}

$menu=$MenuClass->get_one_menu($getparams[2]);

?>