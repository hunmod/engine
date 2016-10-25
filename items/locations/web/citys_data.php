<?php
$cfilters['zip']=$_REQUEST["zip"];


$citysarray=$location_class->get_city($cfilters,' LIMIT 0,10');
$citys=$citysarray["datas"];
echo json_encode($citys);
//arraylist($citysarray);
/*
foreach($citys as $adat){
if($adat["city_name"]&&($adat["lati"]==0 ||!$adat["longi"]==0 )) {
    ($gpsdatas = $Google_Class->get_google_geocoding($adat["city_name"]));
    $adat["lati"] = $gpsdatas[0]["geometry"]["location"]['lat'];
    $adat["longi"] = $gpsdatas[0]["geometry"]["location"]['lng'];

    if ($adat["zip"]=='' && $adat["lati"]!=0){
        $locdatas = $Google_Class->get_google_geocdata($adat["longi"], $adat["lati"]);
        $citylocdatas = array();
        foreach ($locdatas[0]["address_components"] as $adddat) {
            if ($adddat['types'][0] == 'postal_code') {
                $adat["zip"] = $adddat['long_name'];
            }
        }
    }
    $location_class->save_city($adat);
    sleep(1);
}
    // arraylist($locdatas);

}
*/
?>