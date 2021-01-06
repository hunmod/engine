<style>
    body{
       // color: greenyellow;
    }
</style>
<?php

//product

$filters['id']=1;


$elemek = $ShopClass->get($filters, $order = '', $page = 'all');
$pagedata = $elemek["datas"][0];
//text
$qgt['id'] = $filters['id'];
$datasgt = $ShopClass->get_text('hu', $qgt);
$pagedata += $datasgt['datas'][0];



/*
*  Barion PHP library usage example
*
*  Starting an immediate payment with two payee transactions
*
*  � 2015 Barion Payment Inc.
*/
require_once("class/barion-web-php-master/library/BarionClient.php");

$myPosKey = page_settings("barion_PosKey"); // <-- Replace this with your POSKey!
$myEmailAddress = page_settings("barion_email"); // <-- Replace this with your e-mail address in Barion!


// Barion Client that connects to the TEST environment
$BC = new BarionClient($myPosKey, 2, BarionEnvironment::Prod);

// send the request
$paymentDetails = $BC->GetPaymentState($paymentId);

//arraylist($paymentDetails);
//arraylist($paymentDetails);

// TODO: process the information contained in $paymentDetails
?>


<h1>Köszönjük a vásárlást!</h1>