<?php
//oldalsó menüelemek
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/shop/web/widget_kosar.php";
$leftside[]="./items/shop/web/widget_menu.php";

//ide jöjjön vissza
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];

//if (isset($getparams[2]))$menukalatta_shop=menualatta($getparams[2],$getparams[0]);

//kell a valuta is
if (page_settings("eurhuf")!="")
{$eurhuf=page_settings("eurhuf");}
else $eurhuf=0;

//max elem egy oldalon
if (page_settings("shop_maxitem")!="")
{$maxegyoldalon=page_settings("shop_maxitem");}
else $maxegyoldalon=30;
//lapozó
if (($_GET["oldal"]=="") || ($_GET["oldal"]<=0)){
	$oldal=0;
}
else {
	$oldal=$_GET["oldal"];
}

//oldalak kiszámolása

if (($auser["jogid"]>=3)){
	$filters["status"]="all";
}
else
{
	$filters["status"]="2";

}

/*$qcount="SELECT count(id) as db FROM ".$tbl['shop']." WHERE mid in(".$menukalatta_shop.$getparams[2].")".$where." ORDER BY `sorrend` ASC,`id` DESC";
$hszlistacount = db_Query($qcount, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$hszlistacount=$hszlistacount[0]["db"];
$oldalakszama=ceil ($hszlistacount/$maxegyoldalon);
$q=$_GET["q"];

if ($oldal>=$oldalakszama){
	$oldal=$oldalakszama-1;
}
//oldalak kiszámolása

if ($oldalakszama!=""){
	$limit= "LIMIT ".($oldal*$maxegyoldalon).",".$maxegyoldalon;
}

$qelemek="SELECT * FROM  ".$tbl['shop']." WHERE mid in(".$menukalatta_shop.$getparams[2].") ".$where." ORDER BY `sorrend` ASC, `id` DESC  ".$limit;

$elemek=db_Query($qelemek, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
/*echo $qelemek;
echo ($elem["uid"]);*/
//arraylist ($elemek);
/*
$almenu=menuadat($getparams[2],"hirek");
arraylist($almenu);*/


$datas=$shop_class->get($filters,$order='',$page='all');
//arraylist($datas);
$elemek=$datas["datas"];
$page_keywords="";
$page_ogimage="";
$page_description="";
$n=0;
if ($elemek)foreach($elemek as $egy){
	foreach ($egy as $megegyname=>$megegy)
	{
		$elemek[$n][$megegyname]=$Text_Class->htmlfromchars($megegy);
	}
	//kép
	$mappa=$folders["uploads"].$getparams[0]."/".$egy["id"];
	$img=randomimgtofldr("uploads/".$mappa);
	if ($img!="none"){
		$img="uploads/picture.php?picture=".encode($mappa."/".$img)."&y=100&ext=.jpg";
		$page_ogimage=$img;		
	}
	else{
		$img="uploads/".$defaultimg;
	}
	$elemek[$n]["image"]=$homeurl."/".$img;
//kulcsszavak
$page_keywords.=$Text_Class->htmlfromchars($egy["cim"]);
if ($page_keywords!=""){$page_keywords.=',';}
$page_description.=$Text_Class->levag($Text_Class->tageketcsupaszit($egy["hir"]),200);
	
	
$n++;	
}



//$menu=egymenuadat($getparams[2]);
//echo $page_keywords;

?>