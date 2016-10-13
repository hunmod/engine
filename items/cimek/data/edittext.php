<?php

$form = new formobjects();
$status = $cimek_class->status();
$sorrend = $cimek_class->sorrend();
$form = new formobjects();
$UploadClass = new file_upload();
$hirid=decode($getparams[2]);
if ($_POST['hirsave'] == '1') {
   // arraylist($_POST);
    $_POST["nev"]=$Text_Class->htmltochars($_POST["nev"]);
    $_POST["cim"]=$Text_Class->htmltochars($_POST["cim"]);
    $_POST["szar"]=$Text_Class->htmltochars($_POST["szar"]);
    $_POST["uid"]=$auser['id'];
    $hirid = $cimek_class->save($_POST);
    $_POST["id"] = $hirid;
//$cimek_class->save_ad_tags_field($_POST);
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
    $news = $cimek_class->get($filters, $order = '', $page = 'all');
    $adat = $news['datas'][0];

    //var_dump($nimg);

    /*
    if ($getparams[2]!=''){
    $qadatok="SELECT * FROM  ".$tbl['hir']." WHERE id='".base64_decode($getparams[2])."'";
    $adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
    $adat=$adatok[0];*/
}


$pagetitle="Hibalista Elmünek 2016.09.14.";
$page_description="2016.09.14. keletkezett káresemények összegyüjtése egy független szerelő számára.
	Holnap felhívok 2 egymástől független nagyobb elektromos céget, akik tudnak hiteles kárlapot írni.
	És átadom nekik a címlistát. mivel sok címről van szó, kedvezményt szeretnék kialkudni.<br>
	Holnapután este törlöm a teljes listát.<br>
	Köszönettel: 
	Nagy Péter. Kálvin 26.";

//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);



?>