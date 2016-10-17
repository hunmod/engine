<?php

if ($auser["jog"] < 3) {
    header("Location:" . $homeurl);
}
$imgx=369;
$imgy=254;
$admintemplate=1;

/*$extrascript[]= '
	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script>
	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
	';*/
	$extrascript[]= '<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>
	';
$extrascript[]='
	<script src="'.$homeurl.'/scripts/cropit-master/dist/jquery.cropit.js"></script>
	';
$form = new formobjects();
$status = $RoomsClass->status();
$form = new formobjects();
$UploadClass = new file_upload();
$hirid=decode($getparams[2]);
//$adat['id']=$hirid;


if ($_POST['hirsave'] == '1') {
    // save nontextdatas
    $_POST["maxroom"]=$Text_Class->htmltochars($_POST["maxroom"]);
    $_POST["priece"]=$Text_Class->htmltochars($_POST["priece"]);
    $_POST["tip"]=$Text_Class->htmltochars($_POST["tip"]);
    $_POST["guestbad"]=$Text_Class->htmltochars($_POST["guestbad"]);
    $_POST["roomnum"]=$Text_Class->htmltochars($_POST["roomnum"]);
    $_POST["bathroom"]=$Text_Class->htmltochars($_POST["bathroom"]);
    $_POST["kitchen"]=$Text_Class->htmltochars($_POST["kitchen"]);
    $_POST["connectedservices"]=$Text_Class->htmltochars($_POST["connectedservices"]);
    //$_POST["connectedservices"]=szobatags_csv_to($_POST);
    $_POST["connectedservices"]=szobatags_json_to($_POST);
    $_POST["services"]=array();
    $hirid = $RoomsClass->save($_POST);
    $_POST["id"] = $hirid;
    $adat=$_POST;
    $adat["id"]= $hirid;
    //save texttadatas
    foreach ($avaibleLang as $alan){
    if ($_POST[$alan]){
        $_POST[$alan]['id']=$_POST["id"];
        $_POST[$alan]['title']=$Text_Class->htmltochars($_POST[$alan]['title']);
        $_POST[$alan]['leadtext']=$Text_Class->htmltochars($_POST[$alan]['leadtext']);
        $_POST[$alan]['longtext']=$Text_Class->htmltochars($_POST[$alan]['longtext']);
        $RoomsClass->save_text($alan,$_POST[$alan]);
    }
    }
//img upload
    $targetfldr = $room_loc.'/'.$hirid.'/';
    $fileup = $room_loc.'/'.$hirid.'/'.$hirid.'.jpg';
//fromtext
    if ($_POST['nimg'] !=''){
        $UploadClass->createdir($targetfldr);
        $data = $_POST['nimg'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        file_put_contents($fileup, $data);
    }
//from file
    $target = $UploadClass->uploadimg('photo', $room_loc . '/' . $hirid, '' . $hirid, $imgx,$imgy, true, true, true);
header("Location:".$homeurl."/rooms/edittext/".encode($hirid));
}

if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid > 0 && !isset($adat)) {
    $filters['id'] = $hirid;
    $news = $RoomsClass->get($filters, $order = '', $page = 'all');
    $adat = $news['datas'][0];

    $adatd["hu"]=$RoomsClass->get_text('hu',array('id'=>$adat['id']));
    $adat["hu"]=$adatd["hu"]["datas"][0];
    $nimg = $RoomsClass->getimg($adat['id'],$imgx,$imgy);

    //$tags = $RoomsClass->get_ad_tag(array("ad" => $filters["id"], "active" => 'all'));

    //var_dump($nimg);

    /*
    if ($getparams[2]!=''){
    $qadatok="SELECT * FROM  ".$tbl['hir']." WHERE id='".base64_decode($getparams[2])."'";
    $adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
    $adat=$adatok[0];*/
}else  $nimg = $RoomsClass->getimg($adat['id'],$imgx,$imgy);

$puffer1=szobatags_json_from($adat);
$adat['services']=$puffer1['services'];
$adat['wellnes']=$puffer1['wellnes'];
$adat['foglalasinfok']=$puffer1['foglalasinfok'];




//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);



?>