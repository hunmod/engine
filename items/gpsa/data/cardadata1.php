<?php
//arraylist($adatbazis);
//$gps_class->create_tbl('2016-01-25');

$get=$_GET;

if (!$_GET["tol"]){
//$get["rsz"]='867948017577984';
//$get["rsz"]='356895036977984';
$get["tol"]="2016-02-01 05:13:11";
$get["ig"]="2016-02-05 23:13:23";
}
if ($get["rsz"]==''){
$get["rsz"]='867948017577984';
}

$allstatus=$gps_class->status();

$trdatas=$gps_class->get_gpsdata($get);
//echo ($trdatas["query"]);
foreach ($trdatas["datas"] as $row){
$garray=$gps_class->get_coords_tbl($row["lng"],$row["lat"]);
$row["addres"]=$garray["zip"].",".$garray["city"]." ".$garray["street"]." ".$garray["num"];
$backdatas[]=$row;
}

?>