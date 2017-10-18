<?php 
function numformat_to_paypal($szam)
{
	global $currencyCodeType;
	$ret =	sprintf("%01.2f", $szam);
	if ($currencyCodeType=="HUF"){
		$ret =	round ($szam);
	}
	return $ret;
}
/*
Fizetés paypal-al
*/


$currencyCodeType=$default_deviza;
$paymentType = "Sale";

$paypaldatas=array();



$orderid=decode($getparams[2]);
	if ($orderid>0){

	$whereorderlist=" WHERE id=".decode($getparams[2]);
	$qorderlist="SELECT * FROM  ".$tbl['shop_order'].$whereorderlist." ".$order." ".$limit;
	$orderlistlemek=db_Query($qorderlist, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
	$orderdatas=$orderlistlemek[0];
		


	$oder_articlesid=json_decode(htmlfromchars($orderdatas["articles"]), true);
	//arraylist($oder_articlesid);
		$paypaldatas["PAYMENTREQUEST_0_CURRENCYCODE"]=$currencyCodeType;
		$paypaldatas["PAYMENTREQUEST_0_PAYMENTACTION"]=$paymentType;
		$paypaldatas["RETURNURL"]=$returnURL;
		$paypaldatas["CANCELURL"]=$cancelURL;
		$paypaldatas["PAYMENTREQUEST_0_AMT"]=numformat_to_paypal($oder_articlesid["summa"]["end_priece_vat"]); //vegosszeg
		$_SESSION["paypalamount"]=$paypaldatas["PAYMENTREQUEST_0_AMT"];

if ($currencyCodeType!="HUF"){
//termékek
$sum=0;
	for ($i = 0; $i < count($oder_articlesid["articles"]); $i++) {
		$oder_articles=$oder_articlesid["articles"][$i];
		$paypaldatas["L_PAYMENTREQUEST_0_NAME".$i]=$oder_articles["cim"];
		$paypaldatas["L_PAYMENTREQUEST_0_QTY".$i]=$oder_articles["db"];
		$paypaldatas["L_PAYMENTREQUEST_0_AMT".$i]=numformat_to_paypal($oder_articles["endpriece"]/$oder_articles["db"]);
		//$sum=$sum+$paypaldatas["L_PAYMENTREQUEST_0_AMT".$i];
		//$paypaldatas["L_PAYMENTREQUEST_0_TAXAMT".$i]=numformat_to_paypal($oder_articles["ar"]*$oder_articles["vat"]/100);
		//arraylist($paypaldatas);
	}
}
else{
$i = 0;	
		$paypaldatas["L_PAYMENTREQUEST_0_NAME".$i]="rendelés ".$orderdatas['id'];
		$paypaldatas["L_PAYMENTREQUEST_0_QTY".$i]=1;
		$paypaldatas["L_PAYMENTREQUEST_0_AMT".$i]=$paypaldatas["PAYMENTREQUEST_0_AMT"];
}
//echo $sum."=".$paypaldatas["PAYMENTREQUEST_0_AMT"];

//$resArray = CallShortcutExpressCheckout( $paypaldatas["PAYMENTREQUEST_0_AMT"], $paypaldatas["PAYMENTREQUEST_0_CURRENCYCODE"], $paypaldatas["PAYMENTREQUEST_0_PAYMENTACTION"], $paypaldatas["RETURNURL"], $paypaldatas["RETURNURL"]);

arraylist($paypaldatas);
//&PAYMENTREQUEST_0_CURRENCYCODE=HUF&PAYMENTREQUEST_0_PAYMENTACTION=sale&RETURNURL=http://hunmod.dyndns.hu/sajat_publicv?q=paypal/ok&CANCELURL=http://hunmod.dyndns.hu/sajat_publicv?q=paypal/cancel&PAYMENTREQUEST_0_AMT=11791.88
$resArray = CallShortcutExpressCheckoutWithAlldata($paypaldatas);
$ack = strtoupper($resArray["ACK"]);
if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")
{
	$q="INSERT INTO  `hunmod_db`.`paypal` (`token` ,`userid` ,`transid`)VALUES ('".$resArray["TOKEN"]."',  '',  '".$mypaymentid."');";
	$returnquery=db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'hunmod_db', "insert");
	
	RedirectToPayPal ( $resArray["TOKEN"] );
} 
else  
{
	//Display a user friendly Error on the page using any of the following error information returned by PayPal
	$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
	$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
	$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
	$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
	
	echo "<hr>SetExpressCheckout API call failed. ";
	echo "Detailed Error Message: " . $ErrorLongMsg;
	echo "Short Error Message: " . $ErrorShortMsg;
	echo "Error Code: " . $ErrorCode;
	echo "Error Severity Code: " . $ErrorSeverityCode;
}


		
}





?>