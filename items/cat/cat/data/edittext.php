<?php
if(function_exists ( 'hotelcss_data')){
    $myicons['CSOMAGAJANLAT'] = hotelcss_data('CSOMAGAJANLAT');
    $myicons['FOGLALAS-INFOK'] = hotelcss_data('FOGLALAS+INFOK');
    $myicons['NYELV'] = hotelcss_data('NYELV');
    $myicons['SZOBA'] = hotelcss_data('SZOBA');
    $myicons['WELLNESS-KOZOSSEGI'] = hotelcss_data('WELLNESS+KOZOSSEGI');
    $myicons['RENDEZVENY'] = hotelcss_data('RENDEZVENY');
}  else {
    $myicons=array();
}
if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$imgx = 900;
$imgy = 320;
$admintemplate = 1;
$extrascript[] = '
	<script src="' . $server_url . '/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="' . $server_url . '/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>
	';
$extrascript[] = '
	<script src="' . $homeurl . '/scripts/cropit-master/dist/jquery.cropit.js"></script>
	';
$form = new formobjects();
$form = new formobjects();
$UploadClass = new file_upload();
$hirid = decode($getparams[2]);
$sorrend= $category_class->sorrend();



//$adat['id']=$hirid;
if ($_POST['catpost'] == '1') {
    $hirid = $category_class->save($_POST);
    $_POST["id"] = $hirid;
    foreach ($avaibleLang as $mlan) {
        $category_class->create_table_text($mlan);
        if (isset($_POST[$mlan])) {
            $savesubdata = $_POST[$mlan];
            $savesubdata['id'] = $_POST["id"];
            $savesubdata['id'] = $_POST["id"];
            $savesubdata["nev"] = $Text_Class->htmltochars($savesubdata["nev"]);
            $savesubdata['leiras'] = $Text_Class->htmltochars($savesubdata["leiras"]);
            $savesubdata['leirash'] = $Text_Class->htmltochars($savesubdata["leirash"]);

            $category_class->savetext($mlan, $savesubdata);
        }
    }
    $adat = $_POST;
//img upload
    $targetfldr = 'uploads/categorie/' . $hirid . '/';
    $fileup = 'uploads/categorie/' . $hirid . '/' . $hirid . '.jpg';
//fromtext
    //arraylist($_POST);
    if ($_POST['nimg'] != '') {
        $UploadClass->createdir($targetfldr);
        $data = $_POST['nimg'];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        file_put_contents($fileup, $data);
    }
//from file
    $target = $UploadClass->uploadimg('photo', 'uploads/categorie/' . $hirid, '' . $hirid, $imgx, $imgy, true, true, true);
//header("Location:".$homeurl."/rooms/edittext/".encode($hirid));
}
if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid != "" && !isset($adat)) {
    $filters['id'] = $hirid;
    $news = $category_class->get($filters, $order = '', $page = 'all');
   // arraylist($news);
    $adat = $news['datas'][0];
    foreach ($avaibleLang as $alan) {
        $adatd[$alan] = $category_class->get_text($alan, array('id' => $adat['id']));
        $adat[$alan] = $adatd[$alan]["datas"][0];
    }
    $nimg = $category_class->getimg($adat['id'], $imgx, $imgy);
    //$tags = $RoomsClass->get_ad_tag(array("ad" => $filters["id"], "active" => 'all'));
    //var_dump($nimg);
} else  $nimg = $category_class->getimg($adat['id'], $imgx, $imgy);
if ($_GET['kat']){
	$adat['kat']=$_GET['kat'];
	$filterscim['lang']='hu';
	$filterscim['id']=$_GET['kat'];
	$menudatcimarray= $category_class->get($filterscim, $order = '', $page = 'all');
	$menudatcim=$menudatcimarray['datas'][0][nev].' ';
}


/* Kategória root lekérdezése*/
$filtersmenu['lang']='hu';
$filtersmenu['kat']='root';
$menudata1= $category_class->get($filtersmenu, $order = '', $page = 'all');
// arraylist($menudata1);
$katmenu=array();
$katmenuelem['id']='root';
$katmenuelem['nev']='Root';
$katmenu[]=$katmenuelem;
if(isset($menudata1['datas']))foreach ($menudata1['datas']as $katm){
    $katmenu[]=  $katm;
}
/* Kategória root lekérdezése*/


?>