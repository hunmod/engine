<?php
$orderdata["id"]=decode($getparams[2]);

//echo $orderid;

//felfrissít fizetett állapotra.

if ($orderdata["id"]>0){
    $orderdata["pstatus"]='1';
    $orderdata["payment_date"]=date("Y-m-d H:i:s");
    //$orderdata["payment_date"]='NOW()' ;
    //arraylist($orderdata);
    ($ShopClass->save_shop_order($orderdata));
//var_dump($a);
}

header("Location: ".$separator."shop/order_view/".$getparams[2]);






 ?>
