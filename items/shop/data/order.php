<?php
$paymod=$ShopClass->paymod();
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



//ha be van épve, kitöltjük neki
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


unset($kosar);

//hány elem van a kosárban?
$pieces=count($_SESSION["kosaram"]["elem"]);
if ($pieces>0){
		foreach($_SESSION["kosaram"]["elem"] as $id=>$value)
		{
            $filters['id']=$id;
			$segyelem=$elemek = $ShopClass->get($filters, $order = '', $page = 'all');
			$segyelemtext=$elemek = $ShopClass->get_text('hu',$filters, $order = '', $page = 'all');
			$egyelem=$segyelem["datas"][0];
			$segyelemtext["datas"][0]["title"]=$TextClass->tageketcsupaszit($segyelemtext["datas"][0]["title"]);
            $egyelem+=$segyelemtext["datas"][0];
			$egyelem["db"]=$value;
			//$egyelem["ar"]=numformat_convert($egyelem["ar"],$deviza);
			//$egyelem["endpriece"]=numformat_convert($egyelem["priece"],$deviza);
			$egyelem["endpriece"]=($egyelem["priece"]+$egyelem["priece"]*$egyelem["vat"]/100)*$egyelem["db"];

			$egyelem["sum"]=$egyelem["priece"]*$egyelem["db"];
			//$egyelem["endpriece"]=numformat_convert(($egyelem["ar"]+$egyelem["ar"]/100*$egyelem["vat"])*$value,$deviza);
			$summa1+=$egyelem["endpriece"];
			$summa+=$egyelem["sum"];
            $endval["articles_piece"]+=$egyelem["db"];
			//img
			$img=$ShopClass->getimg($egyelem["id"]);
            $egyelem["img"]=$img;
			unset($egyelem["status"]);
			unset($egyelem["jsondatas"]);
            unset($egyelem["img"]);
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




/*
if ($orderdata["post_mod"]>0){
//postázási adatok hozzáadása a termékekhez....
	///át kell dolgozni ha akarom használni, de ügyi.
    $postdatas['id']="post";
    $postdatas['mid']="post";
    $postdatas['cim']=$post_mod[$_POST["post_mod"]]["nev"];
    $postdatas['db']+=$egyelem["db"];
    //$postdatas['ar']=page_settings("priece_post_mode_".$post_mod[$_POST["post_mod"]]["id"]);
    $postdatas['vat']="0";
    $postdatas['sum']=$postdatas['ar'];
    $postdatas['endpriece']=$postdatas['ar'];

    $summa1+=$postdatas["endpriece"];
    $summa+=$postdatas["sum"];
    $kosar_db[]=$postdatas;
}
*/
		//arraylist($post_mod);

//posta ára
	$postpriece=0;

	//ha pp, vagy utalás
if($orderdata["post_mod"]==1 || $orderdata["post_mod"]==3){
		$postpriece=650;

	if ($endval["articles_piece"]>2){
		$postpriece="650";
	}
	if ($endval["articles_piece"]>10){
            $postpriece="1600";
		}
}
	//utánvét
if($orderdata["pmod"]==2) {
    $postpriece="2600";
}
		$endval["postpriece"]=$postpriece;
		$endval["articles_num"]=$pieces;
		$endval["articles_piece"];
		$endval["end_priece"]=$summa+$postpriece;
		$endval["end_priece_vat"]=$summa1+$postpriece;
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

    $orderdata["articles"]=str_replace('\r\n','',$orderdata["articles"]);
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

//ha kp, csak személyes átvétel lehet
	if($orderdata["pmod"]==0 && $orderdata["post_mod"]!=0){
        $orderdata["ordok"]="";
        $orderdata["ok"]="";
        $error[]='akkor tudsz csak KP-val fizetni, ha találkozunk.!';

    }
//ha kp, csak személyes átvétel lehet
	if($orderdata["pmod"]!=0 && $orderdata["post_mod"]==0){
        $orderdata["ordok"]="";
        $orderdata["ok"]="";
        $error[]='ha személyesen veszed át, akkor tudsz csak KP-val fizetni!';
    }



   // $orderdata=$_SESSION["myorder"];
	if ($orderdata["ordok"]!=""){
	//adatok mentése
		//Rendelés táblára összerak!!!!!
       // unset($orderdata["articles"]);
       // $orderdata["articles"]=json_encode($_SESSION["kosaram"]["elem"]);
        $orderdata["post_priece"]=$endval["postpriece"];
        $orderdata["oder_piece"]=$endval["articles_piece"];
        $orderdata["oder_priece"]=$endval["end_priece_vat"];


         arraylist($orderdata);

        $Orderid=$ShopClass->save_shop_order($orderdata);
        $discord->sendmessage("server",$orderdata["name"]. "vásárol") ;

        //echo $Orderid;
      // var_dump($Orderid);


//rendelésemail külldése.
	
	$ORDER_URL=$domain.$separator."/".$getparams[0].'/order_view/'.encode($Orderid).'/sid-'.rand(346202,99999999);
	$from_text=array("VEVO_NEV","ORDER_URL","ORDER_OSSZEG","ORDER_ID");
	$to_text=array($orderdata["name"],$ORDER_URL,$orderdata["oder_priece"],$Orderid);
	


//Ha előreutalás. küldjük ki az instrukciókat!!!
//arraylist($orderdata);
        if($orderdata["pmod"]==1) {
            $eml_text_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay1_text_".$_SESSION["lang"]));
            $eml_head_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay1_subject_".$_SESSION["lang"]));
            emailkuldes($orderdata["email"],$orderdata["name"],$eml_head_to_buyer,$eml_text_to_buyer);
        }else
//Ha utánvét. küldjük ki az instrukciókat!!!

        if($orderdata["pmod"]==2) {
            $eml_text_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay2_text_".$_SESSION["lang"]));
            $eml_head_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_pay2_subject_".$_SESSION["lang"]));
            emailkuldes($orderdata["email"],$orderdata["name"],$eml_head_to_buyer,$eml_text_to_buyer);
        }else{
            $eml_text_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_mail_text_".$_SESSION["lang"]));
            $eml_head_to_buyer=str_replace($from_text,$to_text,page_settings("shop_order_mail_subject_".$_SESSION["lang"]));
            emailkuldes($orderdata["email"],$orderdata["name"],$eml_head_to_buyer,$eml_text_to_buyer);
        }
        unset($_SESSION["kosaram"]);
        unset($_SESSION["myorder"]);
        unset($orderdata);

//átdobjuk a fizetés oldalra.
 header("Location: ".homeurl.$separator."shop/order_view/".encode($Orderid));
	}

	//arraylist($_SESSION);
	//arraylist($orderdatas);
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
