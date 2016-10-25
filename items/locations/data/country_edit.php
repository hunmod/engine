<?php
$admintemplate=1;

$id=decode($getparams[2]);
$adat=array();
if ($id>0) {
    $regiofilter['country_id']=$id;
    $regiodatas=$location_class->get_country($regiofilter);

    $adat = $regiodatas["datas"][0];
}
if($_POST)$adat+=$_POST;
if ($_POST['hirsave']){
    $location_class->save_region($adat);
}
?>