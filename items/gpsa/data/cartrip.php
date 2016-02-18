<?php
//arraylist($adatbazis);
//$gps_class->create_tbl('2016-01-25');

$get = $_GET;

if (!$_GET["tol"]) {
//$get["rsz"]='867948017577984';
//$get["rsz"]='356895036977984';
    $get["tol"] = "2016-02-01 05:13:11";
    $get["ig"] = "2016-02-05 23:13:23";
}
if ($get["rsz"] == '') {
    $get["rsz"] = '867948017577984';
}
if ($getparams[2] != "" && strlen($getparams[2]) > 5) {
    $_GET["rsz"] = $get["rsz"] = $getparams[2];
}


$get["order"] = "datum ASC,ido ASC";
$allstatus = $gps_class->status();
//var_dump($get);
$idotipus=$gps_class->idotipus();


$trdatas = $gps_class->get_gpsdata($get);
//echo($trdatas["query"]);
$beforestatus = 'F';//áll

foreach ($trdatas["datas"] as $row) {
    if ($row['statusz'] != $beforestatus && ($row['statusz'] == 'F' || $row['statusz'] == 'E')) {
        $beforestatus = $row['statusz'];
        $garray = $gps_class->get_coords($row["lng"], $row["lat"]);
        //arraylist($row);

        $backdata[$row['statusz']] = $row;
        $backdata[$row['statusz']]['lng'] = $row["lat"];
        $backdata[$row['statusz']]['lat'] = $row["lng"];
        $backdata[$row['statusz']]["addres"] = $garray["zip"] . "," . $garray["city"] . " " . $garray["street"] . " " . $garray["num"];


        if ($row['statusz'] == 'F') {
            $backdata['disance'] = $gps_class->distance($backdata["E"]['lat'], $backdata["E"]['lng'], $backdata["F"]['lat'], $backdata["F"]['lng']);

            $backdatas[] = $backdata;
        }


    }
    /*
    $garray=$gps_class->get_geocode($row["lng"],$row["lat"]);
    $row["addres"]=$garray["zip"].",".$garray["city"]." ".$garray["street"]." ".$garray["num"];
    $backdatas[]=$row;
    */


}

?>