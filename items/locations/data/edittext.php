<?php

if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$imgx=369;
$imgy=254;
$admintemplate=1;

	$extrascript[]= '
	<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>
	';
$extrascript[]= '
	<script src="'.$homeurl.'/scripts/cropit-master/dist/jquery.cropit.js"></script>
	';
$form = new formobjects();
$UploadClass = new file_upload();
$hirid=decode($getparams[2]);
//$adat['id']=$hirid;


if ($_POST['hirsave'] == '1') {
    // save nontextdatas
    $_POST["otherdatas"]=$Text_Class->htmltochars($_POST["otherdatas"]);
    $_POST["services"]=array();

    $cim=$_POST["zip"].', '.$_POST["cim"];
    if ($_POST['longi']==0 && $_POST['city']){
//gps koordináták cím alapján

       $gpsdatas = $Google_Class->get_google_geocoding($cim);
      //  echo($cim);
      //  arraylist($gpsdatas);
        $_POST["lati"] = $gpsdatas[0]["geometry"]["location"]['lat'];
        $_POST["longi"] = $gpsdatas[0]["geometry"]["location"]['lng'];
    }

    if ($_POST["lati"]!=0){
        //gps koordináta szerint a cím
      /*  $locdatas = $Google_Class->get_google_geocdata($adat["longi"], $adat["lati"]);
        $citylocdatas = array();
        foreach ($locdatas[0]["address_components"] as $adddat) {
            if ($adddat['types'][0] == 'postal_code') {
                $adat["zip"] = $adddat['long_name'];
            }
        }*/
    }



    $hirid = $PlacesClass->save($_POST);
    if($_POST["id"]>1)$hirid =$_POST["id"];

    $adat=$_POST;
    $adat["id"]= $hirid;
    //save texttadatas
    foreach ($avaibleLang as $alan){
    if ($_POST[$alan]){
        $_POST[$alan]['id']=$adat["id"];
        $_POST[$alan]['title']=$Text_Class->htmltochars($_POST[$alan]['title']);
        $_POST[$alan]['leadtext']=$Text_Class->htmltochars($_POST[$alan]['leadtext']);
        $_POST[$alan]['longtext']=$Text_Class->htmltochars($_POST[$alan]['longtext']);
        $PlacesClass->save_text($alan,$_POST[$alan]);
    }
    }
//img upload
    $targetfldr = $places_loc.'/'.$hirid.'/';
    $fileup = $places_loc.'/'.$hirid.'/'.$hirid.'.jpg';
//fromtext
 /*   if ($_POST['nimg'] !='' && $_POST['nimg'] !='undefined'){
        $UploadClass->createdir($targetfldr);
        $data = $_POST['nimg'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        file_put_contents($fileup, $data);
    }*/
//from file
arraylist($_POST);
    $target = $UploadClass->uploadimg('photo', $places_loc . '/' . $hirid, '' . $hirid, 1024,768, true, true, true);
    if($_POST["id"]>1) {
        echo $homeurl . "/locations/edittext/" . encode($_POST["id"]);
        header("Location:" . $homeurl . "/locations/edittext/" . encode($_POST["id"]));
    }else{
        echo $homeurl . "/locations/edittext/" ;

        header("Location:" . $homeurl . "/locations/edittext/");

    }
}

if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid > 0 && !isset($adat)) {
    $filters['id'] = $hirid;
    $news = $PlacesClass->get($filters, $order = '', $page = 'all');
    $adat = $news['datas'][0];
    $cfilters["zip"]=$adat["zip"];
    foreach ($avaibleLang as $alan) {
        $adatd[$alan] = $PlacesClass->get_text($alan, array('id' => $adat['id']));
        $adat[$alan] = $adatd[$alan]["datas"][0];
    }
    $nimg = $PlacesClass->getimg($adat['id'],$imgx,$imgy);
}else  
$nimg = $PlacesClass->getimg($adat['id'],$imgx,$imgy);
//$adat=$PlacesClass->jsons_from($adat);

if(!$adat["status"])$adat["status"]=2;
if(!$adat["sorrend"])$adat["sorrend"]=5;

//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);
$citysarray=$location_class->get_city($cfilters);
$citys=$citysarray["datas"];



?>