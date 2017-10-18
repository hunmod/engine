<?php
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/shop/web/widget_kosar.php";
$leftside[]="./items/shop/web/widget_menu.php";
$orderdata=array();
//ha nincs elküldve a form
if ($_POST["order"]!="ok")
{ 
	if ($_SESSION["myorder"]["order"]=="ok") 
	{
		$_POST=$_SESSION["myorder"];
		$orderdata=$_POST;
	}
}
else
{
	$_SESSION["myorder"]=$_POST;	
	$orderdata=$_POST;

}

if ($auser["id"]>0){

	if ($orderdata["name"]=="")
	{
		$orderdata["name"]=$auser["nev"];
	}
	if ($orderdata["email"]=="")
	{
		$orderdata["email"]=$auser["email"];
	} 	



}


//megrendelés
$summa=0;
$summa1=0;

$pieces=count($_SESSION["kosaram"]["elem"]);
$kosar=array();
if ($pieces>0){
		foreach($_SESSION["kosaram"]["elem"] as $id=>$value)
		{
			$segyelem=egy_shop($id);
			$egyelem=$segyelem;
			$egyelem["db"]=$value;
			$egyelem["ar"]=numformat_convert($egyelem["ar"],$deviza);
			$egyelem["endpriece"]=numformat_convert($egyelem["endpriece"],$deviza);

			$egyelem["sum"]=$egyelem["ar"]*$value;
			$egyelem["endpriece"]=numformat_convert(($egyelem["ar"]+$egyelem["ar"]/100*$egyelem["vat"])*$value,$deviza);
			$summa1+=$egyelem["endpriece"];
			$summa+=$egyelem["sum"];
			$mappa=$folders["uploads"]."shop/".$egyelem["id"];
			$img=randomimgtofldr("uploads/".$mappa);
			if ($img!="none"){
				$img="uploads/picture.php?picture=".encode($mappa."/".$img)."&y=100&ext=.jpg";
			}
			else{
				$img=$homefolder."/uploads/".$defaultimg;
			}
		
		
			$kosarban[]=$egyelem;
			unset($egyelem["status"]);
			unset($egyelem["uid"]);
			unset($egyelem["ar_old"]);
			unset($egyelem["hir"]);
			unset($egyelem["ido"]);
			unset($egyelem["sorrend"]);
			$kosar_db[]=$egyelem;
						//arraylist($egyelem);

		}
	}
	if ($orderdata["post_mod"]>0){
	//postázási adatok hozzáadása
		$postdatas['id']="post";
		$postdatas['mid']="post";
		$postdatas['cim']=$post_mod[$_POST["post_mod"]]["nev"];
		$postdatas['db']="1";
		$postdatas['ar']=page_settings("priece_post_mode_".$post_mod[$_POST["post_mod"]]["id"]);
		$postdatas['vat']="0";
		$postdatas['sum']=$postdatas['ar'];
		$postdatas['endpriece']=$postdatas['ar'];
		$summa1+=$postdatas["endpriece"];
		$summa+=$postdatas["sum"];
		$kosar_db[]=$postdatas;
	}
		//arraylist($kosar_db);

	$endval["articles_num"]=$pieces;
	$endval["end_priece"]=$summa;
	$endval["end_priece_vat"]=$summa1;
	$endval["vat_sum"]=$summa1-$summa;
	
	if ($default_deviza=="HUF"){
		$roundedvalue=round($endval["end_priece_vat"]);
		$endval["round"]=round($endval["end_priece_vat"]-$roundedvalue,2);
		$endval["end_priece_vat"]=$roundedvalue;
	}
	
	$shoppingcart['articles']=$kosarban;
	$shoppingcart['summa']=$endval;

	$shoppingcartorder['articles']=$kosar_db;
	$shoppingcartorder['summa']=$endval;
	
	
if ($orderdata["order"]=="ok"){
	//$orderdatas["uid"]=$auser["id"];
	$orderdata["articles"]=json_encode($shoppingcartorder);
	//var_dump($orderdatas["articles"]);
	$orderdata["pstatus"]=0;//megrendelve,fizetésrevár,fizetve,elküldve,átadva
	$orderdata["order_date"]=$date;	

	
//ellenorzes
$ordererror1="Kötelező nevet megadni!";
$ordererror2="Kötelező emailcímet megadni!";
$ordererror2="Hibás telefonszam";


$error=array();
if ($orderdata["name"]=="")
{
	$error[]=$ordererror1;
}
if ($orderdata["email"]=="")
{
	$error[]=$ordererror2;
}
if ($orderdata["phone"]=="")
{
	$error[]=$ordererror2;
}
	

	if ($orderdata["ordok"]!=""){
	//adatok mentése
	$kapott=shop_sendorder_form($orderdata);	
	$back=gen_form_save($kapott,"shop_order",$orderdata);
//	arraylist($back);

	//email
	//VEVO_NEV,
	/*
	$emltobuyer='Kedves VEVO_NEV!<br>
	megerendelésed megkaptuk.
	Az alábbi linken érhető el a megrendelésed állapota <a href="ORDER_URL">ITT</a> érhető el. 
	';*/
	
	$ORDER_URL=$domain.$separator."/".$getparams[0].'/order_edit/';
	$from_text=array("VEVO_NEV","ORDER_URL");
	$to_text=array($orderdata["name"],$ORDER_URL);
	
	$eml_text_to_buyer=str_replace($from_text,$to_text,page_settings("form_shop_order_mail_text_".$_SESSION["lang"]));
	$eml_head_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_mail_subject_".$_SESSION["lang"]));

//emailkuldes($orderdata["email"],$orderdata["name"],$eml_head_to_buyer,$eml_text_to_buyer);	

	unset($_SESSION["kosaram"]);
	unset($_SESSION["myorder"]);
	unset($orderdata);
//headert dobjuk a megrendelésre
header("Location: ".$separator."shop/order_edit/".encode($back[0]["id"]));
	}

//	arraylist($orderdatas);
}
else{
	if (isset($auser["id"])&&$auser["id"]>0)
	{
		$orederdata["uid"]=$auser["id"];
		$orederdata["name"]=$auser["nev"];
		$orederdata["email"]=$auser["email"];
		
	}
	
}

?>
