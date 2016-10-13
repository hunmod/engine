<?php
if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$admintemplate=1;

$extrascript[]= '
	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script> 
	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
	<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>	
	';

$form = new formobjects();
$bfstatus = $bf_class->status();
$tipus = $bf_class->tipus();
$form = new formobjects();
$UploadClass = new file_upload();
$hirid=decode($getparams[2]);
if ($_POST['hirsave'] == '1') {
   // arraylist($_POST);
    $_POST["hir"]=$Text_Class->htmltochars($_POST["hir"]);
    $_POST["hir2"]=$Text_Class->htmltochars($_POST["hir2"]);
    $_POST["cim"]=$Text_Class->htmltochars($_POST["cim"]);
    $_POST["street"]=$Text_Class->htmltochars($_POST["street"]);
	
	foreach ($_POST["szamlazas"] as $myname=>$myvalue){
	//jsonarray konvertálása
		$szamlazas[$myname]=$Text_Class->htmltochars($myvalue);	
	}
	$_POST["szamlazas"]=$szamlazas;
	$_POST["szamlazasicim"]=json_encode($_POST["szamlazas"]);
	
    $hirid = $bf_class->save($_POST);
    $_POST["id"] = $hirid;
//$bf_class->save_ad_tags_field($_POST);
//echo $hirid;
//echo "!!!!!!!!!!!!!! ".$bfimg_loc . '/' . $hirid;

    $target = $UploadClass->uploadimg('photo', $bfimg_loc . '/' . $hirid, '' . $hirid, 800, 600, true, true, true);
//echo $target;
//header("Location:".$homeurl."/hirek/edittext/".encode($hirid));

}

if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid > 0) {
    $filters['id'] = $hirid;
    $filters['status'] = "all";
    $news = $bf_class->get($filters, $order = '', $page = 'all');
    $adat = $news['datas'][0];
	$adat["szamlazas"]=json_decode($adat["szamlazasicim"],true);
	$_POST["szamlazasicim"]=json_encode($adat["szamlazasicim"]);
	
    $nimg = $bf_class->getimg($adat['id']);
    //var_dump($nimg);

}





?>