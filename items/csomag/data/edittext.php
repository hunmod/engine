<?php

if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$imgx = 369;
$imgy = 254;
$admintemplate = 1;

/*$extrascript[]= '
	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script>
	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
	';*/
$extrascript[] = '
	<script src="' . $server_url . '/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="' . $server_url . '/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>
	';
$extrascript[] = '
	<script src="' . $homeurl . '/scripts/cropit-master/dist/jquery.cropit.js"></script>
	';
$form = new formobjects();
$status = $CsomagClass->status();
$form = new formobjects();
$UploadClass = new file_upload();
$hirid = decode($getparams[2]);
//$adat['id']=$hirid;


//szobák lekérdezése
$filtersroomlist = array();
$filtersroomlist['lang'] = $_SESSION['lang'];
$roomtypesarray = $RoomsClass->get($filtersroomlist, '', $_GET["page"]);
$roomslistid = $roomtypesarray['datas'];
$roomslist = array();
if ($roomslistid)
    foreach ($roomslistid as $roomelem) {
        $filtersroom = array();
        $filtersroom['id'] = $roomelem['id'];
        $elemhuid = $RoomsClass->get_text('hu', $filtersroom);
        $roomelem['title'] = $Text_Class->htmlfromchars($elemhuid['datas'][0]['title']);
        $roomelem['leadtext'] = $Text_Class->htmlfromchars($elemhuid['datas'][0]['leadtext']);
        $roomslist[] = $roomelem;
    }


if ($_POST['hirsave'] == '1') {
    if ($_POST["services"]["rooms"]) {
        foreach ($_POST["services"]["rooms"] as $selectedrooms) {
            if ($selectedrooms["exist"]) $ideglenes[] = $selectedrooms;
        }
        $_POST["services"]["rooms"] = $ideglenes;
    }
    $_POST["connectedservices"] = (csomagtags_json_to($_POST));
    //$_POST["services"] = array();
    $hirid = $CsomagClass->save($_POST);
    $_POST["id"] = $hirid;
    $adat = $_POST;
    $adat["id"] = $hirid;
    //save texttadatas
    foreach ($avaibleLang as $alan) {
        if ($_POST[$alan]) {
            $_POST[$alan]['id'] = $_POST["id"];
             $CsomagClass->save_text($alan,$_POST[$alan]);
        }
    }
//img upload
    $targetfldr = $csomag_loc . '/' . $hirid . '/';
    $fileup = $csomag_loc . '/' . $hirid . '/' . $hirid . '.jpg';
//fromtext
    if ($_POST['nimg'] != '') {
        $UploadClass->createdir($targetfldr);
        $data = $_POST['nimg'];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        file_put_contents($fileup, $data);
    }
//from file
    $target = $UploadClass->uploadimg('photo', $csomag_loc . '/' . $hirid, '' . $hirid, 1024, 768, true, true, true);
header("Location:".$homeurl."/csomag/edittext/".encode($hirid));
}

if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid > 0 && !isset($adat)) {
    $filters['id'] = $hirid;
    $news = $CsomagClass->get($filters, $order = '', $page = 'all');
    $adat = $news['datas'][0];

    $adatd["hu"] = $CsomagClass->get_text('hu', array('id' => $adat['id']));
    $adat["hu"] = $adatd["hu"]["datas"][0];
    $nimg = $CsomagClass->getimg($adat['id'], $imgx, $imgy);
} else  $nimg = $CsomagClass->getimg($adat['id'], $imgx, $imgy);

$puffer1 = szobatags_json_from($adat);

//arraylist($puffer1);
$idegelenes=array();
foreach ($puffer1['services']['rooms'] as $servicesarray){
    $idegelnes[$servicesarray['id']]=$servicesarray;
}
$puffer1['services']['rooms']=$idegelnes;

$adat['services'] = $puffer1['services'];


//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);


?>