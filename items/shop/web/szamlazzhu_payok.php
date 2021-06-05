<?php
$df["get"]=$_GET;
$df["post"]=$_POST;

if ($_POST["szlahu_rendelesszam"])
{
    $delid['id']=$_POST["szlahu_rendelesszam"];
    $delid['payment_date']=$date;
    $delid['pstatus']=1;
        // arraylist($delid);
    $ShopClass->save_shop_order($delid);
$df["data"]=$delid;





}
$the_xml=json_encode($df);
$myfile = fopen("!szamlazz/get_".$delid['id'].".json", "w");
fwrite($myfile, $the_xml);
fclose($myfile);
?>