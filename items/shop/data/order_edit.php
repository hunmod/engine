<?php

$admintemplate=1;

if ($_POST["formname"]=="payok" && $getparams[2]>0)
{
    $pstatus=2;
    //ha a helyiszínen veszi meg, egyből le is zárjuk
    if ($_POST["pmod"]=="0") {$pstatus=6;}
    //ha a utánvét volt és megjött a lé
    if ($_POST["pstatus"]=="3") {$pstatus=6;}

    $delid=$_POST;
    $delid['id']=$getparams[2];
    $delid['payment_date']=$date;
    if($pstatus)$delid['pstatus']=$pstatus;
   // arraylist($delid);
    $ShopClass->save_shop_order($delid);
}


if ($_POST["formname"]=="postok" && $getparams[2]>0)
{
    //ha Feladtam a csomagot
    $delid=$_POST;
    $delid['id']=$getparams[2];
    $delid['post_date']=$date;
    $delid['post_id']=$_POST["post_id"];
    $delid['post_status']=2;
    // arraylist($delid);
    $ShopClass->save_shop_order($delid);
    //email
    $from_text=array('ORDER_URL' ,'VEVO_NEV','ORDER_OSSZEG','ORDER_ID');
    $to_text= array($homeurl.$separator."/".$getparams[0].'/order_view/'.encode($orderdatas['id']).'/sid-'.rand(346202,99999999),$orderdatas['name'],$orderdatas['oder_priece'],$orderdatas['id']) ;
    $eml_text_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay_post_subject_".$_SESSION["lang"]));
    $eml_head_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay_post_subject_".$_SESSION["lang"]));
    emailkuldes($orderdatas["email"],$orderdatas["name"],$eml_head_to_buyer,$eml_text_to_buyer);


}





$filtersxx["id"]=$getparams[2];
$filtersxx["status"]="all";
$datas=$ShopClass->get_shop_order($filtersxx);
$post_status=$ShopClass->post_status();
$orderdatas=$datas["datas"][0];

//order articles datas
$orderdatas["articles"]=str_replace('
','',$orderdatas["articles"]);
$orderdatas["articles"]=str_replace('/r/n','',$orderdatas["articles"]);

$oder_articlesid=json_decode(($orderdatas["articles"]), true);




//arraylist($datas);
if ($_POST["formname"]=="rememberpay")
{
    $orderdatas['email'];

    $from_text=array('ORDER_URL' ,'VEVO_NEV','ORDER_OSSZEG','ORDER_ID');
    $to_text= array($homeurl.$separator."/".$getparams[0].'/order_view/'.encode($orderdatas['id']).'/sid-'.rand(346202,99999999),$orderdatas['name'],$orderdatas['oder_priece'],$orderdatas['id']) ;
    $eml_text_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay_pay1_text_".$_SESSION["lang"]));
    $eml_head_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay_pay1_subject_".$_SESSION["lang"]));

    emailkuldes($orderdatas["email"],$orderdatas["name"],$eml_head_to_buyer,$eml_text_to_buyer);


}

//if ($_POST["formname"]=="postok" && $getparams[2]>0 )
if ($_POST["formname"]=="postok" && $getparams[2]>0)
{
    //ha Feladtam a csomagot
//leveszem készletről
//$oder_articlesid=$ShopClass->jsons_from($oder_articlestext);

    foreach ($oder_articlesid["articles"] as $thw){
        $myfilter=array();
        $myfilter['id']=$thw['id'];
        $myret=$ShopClass->get($myfilter);
     //  arraylist($myret);
        $retpar['id'] = $thw['id'];
        $retpar['storage'] =  $myret['datas'][0]["storage"]-$thw["db"];
        $myretb=$ShopClass->save($retpar);



    }


}


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