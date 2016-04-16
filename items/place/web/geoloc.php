<?php
//$leftside[]="./items/user/web/usermenu.php";
//$leftside[]="./items/ads/web/widget_side1.php";

$mydatas=$place_class->get(array("status"=>"all"),$order='',$page='all') ;
$datas=$mydatas["datas"];
//$Sys_Class->arraylist($datas);
$googlemapreq=new gpsa();



foreach ($datas as $data) {

//arraylist($data);
    if ($data["specid"]) {
        $positions = explode(',', $data["specid"]);
        if (isset($positions[1])&& $data["zip"]=='') {
            $point = $gps_class->get_coords($positions[1], $positions[0]);
arraylist($point);
//$data["city"]=$point["city"];
         //   $data["cim"] = $Text_Class->htmltochars($point["street"]);
            $data["hsz"] = $point["num"];
            $data["zip"] = $point["zip"];
            $data["status"] = '2';
           /* $varosarray = $Sys_Class->get_list('location_citys_data', array('city_name' => $point["city"], "status" => 'all'), 'ORDER BY  `city_name` ASC');
            arraylist($varosarray);
            $data["varos"] = $varosarray[0]["city_id"];*/
//$data=geolocation($data);
          //  arraylist($data);
            $place_class->save($data);

        }
    }
}
/*
foreach ($datas as $data){
    $savedatas[]=$savedata;

}
foreach($savedatas as $row){
    $place_class->save($row);
}*/
//$Sys_Class->arraylist($savedatas);
