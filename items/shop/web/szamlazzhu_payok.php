<?php

if ($_GET["szlahu_rendelesszam"])
{
    $delid['id']=$_GET["szlahu_rendelesszam"];
    $delid['payment_date']=$datetime;
    $delid['pstatus']=1;
        // arraylist($delid);
    $ShopClass->save_shop_order($delid);

}

?>