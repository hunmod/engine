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
$status = $hir_class->status();
$sorrend = $hir_class->sorrend();
$form = new formobjects();
$UploadClass = new file_upload();
$hir_class = new hir();
$hirid=decode($getparams[2]);
if ($_POST['hirsave'] == '1') {
   // arraylist($_POST);
    $_POST["hir"]=$Text_Class->htmltochars($_POST["hir"]);
    $_POST["hir2"]=$Text_Class->htmltochars($_POST["hir2"]);
    $_POST["cim"]=$Text_Class->htmltochars($_POST["cim"]);
    $hirid = $hir_class->save($_POST);
    $_POST["id"] = $hirid;
//$hir_class->save_ad_tags_field($_POST);
//echo $hirid;
//echo "!!!!!!!!!!!!!! ".$hirimg_loc . '/' . $hirid;

    $target = $UploadClass->uploadimg('photo', $hirimg_loc . '/' . $hirid, '' . $hirid, 800, 600, true, true, true);
//echo $target;
//header("Location:".$homeurl."/hirek/edittext/".encode($hirid));

}

if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid > 0) {
    $filters['id'] = $hirid;
    $filters['status'] = "all";
    $news = $hir_class->get($filters, $order = '', $page = 'all');
    $adat = $news['datas'][0];
    $nimg = $hir_class->getimg($adat['id']);
    $tags = $hir_class->get_ad_tag(array("ad" => $filters["id"], "active" => 'all'));

    //var_dump($nimg);

    /*
    if ($getparams[2]!=''){
    $qadatok="SELECT * FROM  ".$tbl['hir']." WHERE id='".base64_decode($getparams[2])."'";
    $adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
    $adat=$adatok[0];*/
}

//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);



?>