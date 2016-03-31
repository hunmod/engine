<?php
if ($auser["id"]>0) {
}else{
    //arraylist($auser);
    header('Location: '.$server_url."user/noacces");
    exit;
}

$allstatus = $gps_class->status();

$carlist=$gpsacars_class->create_tbl_usercar();
//$carlist=$gpsacars_class->cars_table_update1();
$regisztracio = $gpsacars_class->get_regisztracio($filters);


//arraylist($regisztracio);


?>
