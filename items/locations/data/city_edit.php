<?php
$admintemplate=1;

$id=decode($getparams[2]);
$adat=array();
if ($id>0) {
    $cfilters['city_id']=$id;
    $citysarray = $location_class->get_city($cfilters, '', 'all');
    $adat = $citysarray["datas"][0];
}

if($_POST)$adat+=$_POST;
//arraylist($adat);

if($adat["city_name"]&&($adat["lati"]==0 || $adat["longi"]==0 )) {
    ($gpsdatas=$Google_Class->get_google_geocoding($adat["city_name"]));
    //arraylist($gpsdatas);
    $adat["lati"]=$gpsdatas[0]["geometry"]["location"]['lat'];
    $adat["longi"]=$gpsdatas[0]["geometry"]["location"]['lng'];

    if(!$adat["zip"]) {
        $locdatas = $Google_Class->get_google_geocdata($adat["longi"], $adat["lati"]);
        $citylocdatas = array();
        foreach ($locdatas[0]["address_components"] as $adddat) {
            if ($adddat['types'][0] == 'postal_code') {
                $adat["zip"] = $adddat['long_name'];

            };
        }
    }
// arraylist($locdatas);

}


if(!$adat["country_id"]){
    $adat["country_id"]=1;
}

$countryfilter=array();
$countrydatas=$location_class->get_country($countryfilter);
if ($adat["country_id"]){
    $regiofilter["country_id"]=$adat["country_id"];
}
$regiodatas=$location_class->get_region($regiofilter);
//arraylist($countrydatas);

if ($_POST['hirsave']){
    $location_class->save_city($adat);
}


?>