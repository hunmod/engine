<?php
if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$admintemplate=1;
//	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
//	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script> 

$extrascript[]= '
	<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>	
	';
$Form_Class=$form = new formobjects();
$bfstatus = $bf_class->status();
$tipus = $bf_class->tipus();
$form = new formobjects();
$UploadClass = new file_upload();
$hirid=decode($getparams[2]);
if ($_POST['hirsave'] == '1') {
    $_POST["nev"]=$Text_Class->htmltochars($_POST["nev"]);
    $_POST["leiras"]=$Text_Class->htmltochars($_POST["leiras"]);
    $_POST["megjegyzes"]=$Text_Class->htmltochars($_POST["megjegyzes"]);
    $_POST["cim"]=$Text_Class->htmltochars($_POST["cim"]);
    $_POST["szamlazasicim"]=$Text_Class->htmltochars($_POST["szamlazasicim"]);
    $hirid = $bf_class->save($_POST);
    $_POST["id"] = $hirid;

    $target = $UploadClass->uploadimg('photo', $bfimg_loc . '/' . $hirid, '' . $hirid, 800, 600, true, true, true);
//echo $target;
//header("Location:".$homeurl."/bf/edittext/".encode($hirid));

}

if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid > 0) {
    $filtersa['id'] = $hirid;
    $filtersa['status'] = "all";
    $bfdats = $bf_class->get($filtersa, $order = '', $page = 'all');
	
    $adat = $bfdats['datas'][0];
    $nimg = $bf_class->getimg($adat['id']);
	
	if ($adat['status']<1){$adat['status']=2;}

}





?>