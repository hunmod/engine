<?php
$deviza="HUF";

$tblmodulom='shop';
$tblmodulom='shop_order';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."shop_order";
$shop_loc='uploads/'.uploadfolder.'shop';

$file_structuct=array();
$file_structuct["modules"]="shop";

$file_structuct["name"]="shop lista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="egy termek";
$file_structuct["file"]="shop";
$modules[]=$file_structuct;

//almenu
$adminmenu2=array();
$file_structuct["name"] = lan("settings");
$file_structuct["file"] = "shopsettings";
$adminmenu2[] = $file_structuct;
$file_structuct["name"] = lan("orders");
$file_structuct["file"] = "orders";
$adminmenu2[] = $file_structuct;
$file_structuct["name"] = lan("list");
$file_structuct["file"] = "lista";
$adminmenu2[] = $file_structuct;



$file_structuct["name"]="Shop admin";
$file_structuct["file"]="lista";
$file_structuct["alatta"] = $adminmenu2;

$adminmenu[]=$file_structuct;


include('class.shop.php');
//echo $menustart;
//$menupontselectbox=menupontselectbox('103',$onearray,'','','');
//arraylist(menupontselectbox(1,$onearray,'','',''));

//shop megrendelés email
if (page_settings("shop_order_mail_subject_".$_SESSION["lang"])!="")$shop_order_mail_subject=page_settings("shop_order_mail_subject_".$_SESSION["lang"]);
if (page_settings("shop_order_mail_text_".$_SESSION["lang"])!="")$shop_order_mail_text=page_settings("shop_order_mail_text_".$_SESSION["lang"]);


//shop rootmenü db-ből
if (page_settings("shop_root_menu_".$_SESSION["lang"])!="")
{$shopmenustart=page_settings("shop_root_menu_".$_SESSION["lang"]);}
else $shopmenustart=0;


//$sidemenu1=menuadat($shopmenustart);


	

//kosárba rakás
if (isset($_REQUEST["kosarba"]))
if ($_REQUEST["kosarba"]>0)
{
	if ($_REQUEST["num"]>1)
	{
		$knum=$_REQUEST["num"];
	}
	else
	{
		$knum=1;
	}
	
	if ($_REQUEST["p"]=="add")
	{
		$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]=$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]+$knum;
	}
	if ($_REQUEST["p"]=="neg")
	{
		$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]=$_SESSION["kosaram"]["elem"][$_REQUEST["kosarba"]]-$knum;
	}
	
	$kosar=$_SESSION["kosaram"]["elem"];
	foreach($kosar as $id=>$value)
	{
		if ($_SESSION["kosaram"]["elem"][$id]<1)
		{
			unset($_SESSION["kosaram"]["elem"][$id]);
		}
	}
}









function numformat_convert($szam,$currencyCodeTyp)
{
	$ret =	sprintf("%01.2f", $szam);
	if ($currencyCodeTyp=="HUF"){
		$ret =	round ($szam);
	}
	return $szam;
}




?>
