<?php

if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$admintemplate = 1;

/*$extrascript[]= '
	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script>
	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
	';*/


$hirid = decode($getparams[2]);

if ($_POST['hirsave'] == '1') {
    $_POST['status'] = '2';
    $_POST['lang'] = 'hu';
    $_POST['msg'] = $Text_Class->htmltochars($_POST["msg"]);
//arraylist($_POST);
    $hirid = $SparksendClass->save_users($_POST);
}


if($hirid!='') {
    $filtermsg['email'] = $hirid;
    $roomtypesarray = $SparksendClass->get_users($filtermsg, '', 'all');
    $adat = $roomtypesarray['datas'][0];
    //arraylist($adat);

}

//arraylist($menupontselectbox);


?>