<?php
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/ads/web/widget_side1.php";


$xmlfile="uploads/gmterkep.xml";
$mydatas=$Sys_Class->readxml($xmlfile);
$datas=$mydatas["Document"]["Folder"][0]["Placemark"];
//$Sys_Class->arraylist($datas);
$googlemapreq=new gpsa();
foreach ($datas as $data){
    $savedata=array();
    $savedata["nev"]=$data['name'];
    $savedata["leiras"]=$data['description'];
    $savedata["specid"]=$data['Point']['coordinates'];
    $coords=explode(',',$savedata["coordinates"]);
    $gdatas=$googlemapreq->get_coords($coords[1],$coords[0]);
    $savedata["zip"]=$gdatas["zip"];
    //getvaros
    //$Sys_Class->get_list('location_citys_data',array('city_name'=>$gdatas["city"]));
    //$savedata["varos"]=$gdatas["country"];
    $savedata["varos"]=$gdatas["city"];
    $savedata["cim"]=$gdatas["street"];
    $savedata["hsz"]=$gdatas["num"];
    $savedata["lat"]=$gdatas["lat"];
    $savedata["lon"]=$gdatas["lon"];

    if (strpos(strtolower ($savedata["leiras"]), strtolower ('laktózmentes')))$savedata["lactose"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('laktóz-')))$savedata["lactose"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('tej-')))$savedata["lactose"]=1;

    if (strpos(strtolower ($savedata["leiras"]), strtolower ('cukor-')))$savedata["diab"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('cukorérzékeny')))$savedata["diab"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('cukormentes')))$savedata["diab"]=1;

    if (strpos(strtolower ($savedata["leiras"]), strtolower ('Gluténmentes')))$savedata["gluten"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('lisztmentes')))$savedata["gluten"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('gm')))$savedata["gluten"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('glutén-')))$savedata["gluten"]=1;
    if (strpos(strtolower ($savedata["leiras"]), strtolower ('liszt-')))$savedata["gluten"]=1;

    //url keresés
    // $urlpattern="#(\s*)(http(s?)://)?(.*)#is";
    //$savedata["web"]=1;
    //$savedata["web2"]=1;


    $savedata["tipus"]=0;
    $savedata["uid"]=1;
    $savedata["status"]=1;
    //koordináták lekérdezése



    $savedatas[]=$savedata;

}
$Sys_Class->arraylist($savedatas);
