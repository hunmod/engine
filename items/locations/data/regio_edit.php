<?php
$admintemplate=1;

$id=decode($getparams[2]);
$adat=array();
if ($id>0) {
    $regiofilter['regio_id']=$id;
    $regiodatas=$location_class->get_region($regiofilter);

    $adat = $regiodatas["datas"][0];
}

if($_POST)$adat+=$_POST;
//arraylist($adat);


// arraylist($locdatas);


$countryfilter=array();
$countrydatas=$location_class->get_country($countryfilter);
if ($adat["country_id"]){
  //  $regiofilter["country_id"]=$adat["country_id"];
}
$regiodatas=$location_class->get_region($regiofilter);
//arraylist($countrydatas);

if ($_POST['hirsave']){
    $location_class->save_region($adat);
}
?>