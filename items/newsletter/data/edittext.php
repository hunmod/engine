<?php

if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$admintemplate = 1;

/*$extrascript[]= '
	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script>
	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
	';*/
$extrascript[] = '
	<script src="' . $server_url . '/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="' . $server_url . '/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>
	';

$hirid = decode($getparams[2]);




if ($_POST['hirsave'] == '1') {
    $_POST['status'] = '2';
    $_POST['lang'] = 'hu';
    $_POST['msg'] = $Text_Class->htmltochars($_POST["msg"]);
    $_POST['subj'] = $Text_Class->htmltochars($_POST["subj"]);
//arraylist($_POST);
    $hirid = $SparksendClass->save_messages($_POST);
}


if($hirid >0) {
    $filtermsg['id'] = $hirid;
    $roomtypesarray = $SparksendClass->get_messages($filtermsg, '', 'all');
    $adat = $roomtypesarray['datas'][0];
    //arraylist($adat);

}

//arraylist($menupontselectbox);


?>