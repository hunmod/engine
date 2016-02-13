<?php
//arraylist($adatbazis);
//$gps_class->create_tbl('2016-01-25');

$get=$_GET;

if (!$_GET["rsz"]){
$get["rsz"]='867948017577984';
$get["rsz"]='356895036977984';
}
if (!$_GET["tol"]){
$get["tol"]="2016-01-01 05:13:11";
$get["ig"]=date("Y-m-d H:i:s" , strtotime($date));
$get["limit"]="0,1";

}

$trdatas=$gps_class->get_gpsdata($get);
//echo ($trdatas["query"]);
foreach ($trdatas["datas"] as $row){
$garray=$gps_class->get_coords($row["lng"],$row["lat"]);
$row["addres"]=$garray["zip"].",".$garray["city"]." ".$garray["street"]." ".$garray["num"];
$backdatas[]=$row;
}
echo json_encode($backdatas);
	
?>
