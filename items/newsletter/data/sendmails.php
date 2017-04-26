<?php
$admintemplate=1;

$extrascript[] = '
	<script src="' . $server_url . '/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="' . $server_url . '/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>
	';

$emailvalaki=$emailkiknek=array();

$emailvalaki['admins']=lan('adminoknak');
$emailvalaki['users']=lan('users');
$emailvalaki['list0']=lan('feliratkozottak');


$hirid = decode($getparams[2]);
if($hirid > 0) {
    $filtermsg['id'] = $hirid;
    $mailtextsaray = $SparksendClass->get_messages($filtermsg, '', 'all');
    $adat = $mailtextsaray['datas'][0];

    //arraylist($adat);

}

?>