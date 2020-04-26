<?php
//email szövegek
/*$whereorderlist=" WHERE id=".decode($getparams[2]);

	//Módosítások mentése
	//fizetve
	if ($_POST["formname"]=="payok")
	{
		$pstatus=1;
			//ha a helyiszínen veszi meg, egyből le is zárjuk
			if ($_POST["pmod"]=="0") $pstatus=6;

			//ha a utánvét volt és megjött a lé
			if ($_POST["pstatus"]=="3") $pstatus=6;

			$qadd=" pstatus=".$pstatus.",payment_date='".$date."'";
			$qsave="UPDATE  ".$tbl['shop_order']." SET ".$qadd.$whereorderlist." LIMIT 1 ;";
			db_Query($qsave, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
			//echo $qsave;
	}

	if (($_POST["formname"]=="postok"))
		{
			
		$pstatus=2;
			//ha a helyiszínen veszi meg, egyből le is zárjuk
			if ($_POST["pmod"]=="2") $pstatus=3;
						
			$qadd=" pstatus=".$pstatus.",post_date='".$date."',post_id='".$_POST["post_id"]."'";
			$qsave="UPDATE  ".$tbl['shop_order']." SET ".$qadd.$whereorderlist." LIMIT 1 ;";
			db_Query($qsave, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
			//echo $qsave;
	}
	if (($_POST["formname"]=="orderok"))
		{
			$qadd=" pstatus=6 ";
			$qsave="UPDATE  ".$tbl['shop_order']." SET ".$qadd.$whereorderlist." LIMIT 1 ;";
			db_Query($qsave, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
			//echo $qsave;
	}



	$qorderlist="SELECT * FROM  ".$tbl['shop_order'].$whereorderlist." ".$order." ".$limit;
	$orderlistlemek=db_Query($qorderlist, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$orderdatas=$orderlistlemek[0];

$_SESSION["paythis_shop"]=$orderdatas["id"];



$oder_articlesid=json_decode(htmlfromchars($orderdatas["articles"]), true);
//arraylist($oder_articlesid);
for ($i = 0; $i < count($oder_articlesid["articles"]); $i++) {
$oder_articles=$oder_articlesid["articles"][$i];
//arraylist($oder_articlesid["articles"][$i]);
$elemdtat=egy_shop($oder_articlesid["articles"][$i]["id"]);
//arraylist($elemdtat);
$oder_articlesid["articles"][$i]["hir"]=$elemdtat["hir"];
}
*/

?>