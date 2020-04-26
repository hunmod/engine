<?php
$filtersxx["id"]=decode($getparams[2]);
$datas=$ShopClass->get_shop_order($filtersxx);
$orderdatas=$datas["datas"][0];


$orderdatas["articles"]=str_replace('
','',$orderdatas["articles"]);


//$oder_articlesid=$ShopClass->jsons_from($oder_articlestext);
$oder_articlesid=json_decode($orderdatas["articles"],true);

$paymod=$ShopClass->paymod();
$post_mod=$ShopClass->post_mod();
$pay_status=$ShopClass->pay_status();
$order_status=$ShopClass->order_status();
$post_status=$ShopClass->post_status();
$order_status=$ShopClass->order_status();
$paypal["email"]=page_settings('paypal_email');
//paypalkonfig
//$paypal["email"]="mode@uw.hu";
$paypal["returl"]=$homeurl."/shop/paypal1/";
// PayPal configuration
define('PAYPAL_ID', $paypal["email"]);
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE
//echo encode($orderdatas["id"]);
define('PAYPAL_RETURN_URL', $paypal["returl"].''.encode($orderdatas["id"]).'/2156875');
define('PAYPAL_CANCEL_URL', $paypal["returl"].'cancel');
define('PAYPAL_NOTIFY_URL', $paypal["returl"].'error');
define('PAYPAL_CURRENCY', 'HUF');
define('PAYPAL_URL', (PAYPAL_SANDBOX == false)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


?>