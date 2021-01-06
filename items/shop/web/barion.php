<style>
    body{
       // color: greenyellow;
    }
</style>
<?php

$myPosKey = page_settings("barion_PosKey"); // <-- Replace this with your POSKey!
$myEmailAddress = page_settings("barion_email"); // <-- Replace this with your e-mail address in Barion!


//product

//decode($getparams[2]);

$filtersxx["id"]=($getparams[2]);
$datas=$ShopClass->get_shop_order($filtersxx);
$orderdatas=$datas["datas"][0];
$orderdatas["articles"]=str_replace('
','',$orderdatas["articles"]);
$orderdatas["articles"]=str_replace('/r/n','',$orderdatas["articles"]);
$oder_articlesid=json_decode($orderdatas["articles"],true);

//arraylist($oder_articlesid);
/*
*  Barion PHP library usage example
*
*  Starting an immediate payment with two payee transactions
*
*  � 2015 Barion Payment Inc.
*/
require_once("class/barion-web-php-master/library/BarionClient.php");
// Barion Client that connects to the TEST environment
$BC = new BarionClient($myPosKey, 2, BarionEnvironment::Prod);

// create the transaction
$trans = new PaymentTransactionModel();
$trans->POSTransactionId = $orderdatas["id"];
$trans->Payee = $myEmailAddress; // no more than 256 characters
$trans->Total = $orderdatas["oder_priece"];
$trans->Comment =  ( $orderdatas["subject"]); // no more than 640 characters
/*
// create the item model
$item = new ItemModel();
$item->Name = $pagedata["title"]; // no more than 250 characters
$item->Description = $pagedata["title"]; // no more than 500 characters
$item->Quantity = 1;
$item->Unit = "piece"; // no more than 50 characters
$item->UnitPrice = $pagedata["priece"];
$item->ItemTotal = $pagedata["priece"];
$item->SKU = $pagedata["id"]; // no more than 100 characters
$trans->AddItem($item); // add the item to the transaction
*/
foreach ($oder_articlesid["articles"] as $article){
    $item = new ItemModel();
    $item->Name = $TextClass->ekezeteketvissza( $article["title"]); // no more than 250 characters
    $item->Description = $TextClass->tageketcsupaszit($TextClass->ekezeteketvissza($article["title"])); // no more than 500 characters
    $item->Quantity = 1*$article["db"]; ;
    $item->Unit = "piece"; // no more than 50 characters
    $item->UnitPrice = 1*$article["priece"];
    $item->ItemTotal = (1*$article["priece"]);
    $item->SKU = $article["id"]; // no more than 100 characters
    $trans->AddItem($item); // add the item to the transaction

}


// create the shipping address
$shippingAddress = new ShippingAddressModel();
$shippingAddress->Country = "HU";
$shippingAddress->Region = null;
$shippingAddress->City = $orderdatas['city'];
$shippingAddress->Zip = $orderdatas['zip'];
$shippingAddress->Street = $orderdatas['address'];
$shippingAddress->Street2 = "";
$shippingAddress->Street3 = "";
$shippingAddress->FullName = $orderdatas['name'];

// create the request model
$psr = new PreparePaymentRequestModel();
$psr->PaymentRedirectUrl = homeurl.'/shop/barionok';
$psr->RedirectUrl = homeurl.'/shop/barionok';
$psr->GuestCheckout = false; // we allow guest checkout
$psr->PaymentType = PaymentType::Immediate; // we want an immediate payment
$psr->FundingSources = array(FundingSourceType::All); // both Barion wallet and bank card accepted
$psr->PaymentRequestId ="ORDER-". $orderdatas['id']; // no more than 100 characters
$psr->PayerHint = $orderdatas['email']; // no more than 256 characters
$psr->Locale = UILocale::HU; // the UI language will be English
$psr->Currency = Currency::HUF;
$psr->OrderNumber = $orderdatas['id']; // no more than 100 characters
$psr->ShippingAddress = $shippingAddress;
$psr->AddTransaction($trans); // add the transaction to the payment
//var_dump($psr);

// send the request
$myPayment = $BC->PreparePayment($psr);

if ($myPayment->RequestSuccessful === true) {
    // redirect the user to the Barion Smart Gateway
     header("Location: " . BARION_WEB_URL_PROD. "?id=" . $myPayment->PaymentId);
}
//echo '<hr>';
//var_dump($psr);
//echo '<hr>';
//var_dump($myPayment->Errors[0]->Title);
//echo '<hr>';
//var_dump($orderdatas);
//echo '<hr>';
//var_dump($oder_articlesid["articles"]);

?>
<H2>Sajnos a fizetés nem sikerült!</H2>
kérlek próbáld meg később, vagy válassz más módot.<br>
<small>Hibakód:<?= $myPayment->Errors[0]->Title ?></small>
