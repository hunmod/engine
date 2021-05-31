<?php

$admintemplate=1;
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

if ($_POST["formname"]=="payok" && $getparams[2]>0)
{
    $pstatus=1;

    $delid=$_POST;
    $delid['id']=$getparams[2];
    $delid['payment_date']=$datetime;
    if($pstatus)$delid['pstatus']=$pstatus;
   // arraylist($delid);
    $ShopClass->save_shop_order($delid);
}


if ($_POST["formname"]=="postok" && $getparams[2]>0)
{
    //ha Feladtam a csomagot
    $delid=$_POST;
    $delid['id']=$getparams[2];
    $delid['post_date']=date("Y-m-d H:i:s");
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



?>