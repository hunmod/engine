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
    $_POST["jsondatas"]=$Text_Class->htmltochars($_POST["jsondatas"]);
    $_POST["jsondatas"]=$SiteClass->jsons_to($_POST);
    $_POST["services"]=array();
    $hirid = $SiteClass->save($_POST);
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
        $SiteClass->save_text($alan,$_POST[$alan]);
    }
    }
//img upload
    $targetfldr = $site_loc.'/'.$hirid.'/';
    $fileup = $site_loc.'/'.$hirid.'/'.$hirid.'.jpg';
//fromtext
    if ($_POST['nimg'] !='' && $_POST['nimg'] !='undefined'){
        $UploadClass->createdir($targetfldr);
        $data = $_POST['nimg'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        file_put_contents($fileup, $data);
    }
//from file
    $target = $UploadClass->uploadimg('photo', $site_loc . '/' . $hirid, '' . $hirid, 1024,768, true, true, true);
header("Location:".$homeurl."/site/edittext/".encode($hirid));
}

if (decode($getparams[2]) > 0) {
    $hirid = base64_decode($getparams[2]);
}
if ($hirid > 0 && !isset($adat)) {
    $filters['id'] = $hirid;
    $news = $SiteClass->get($filters, $order = '', $page = 'all');
    $adat = $news['datas'][0];
    foreach ($avaibleLang as $alan){
        $adatd[$alan]=$SiteClass->get_text($alan,array('id'=>$adat['id']));
        //arraylist($adatd);

        $adat[$alan]=$adatd[$alan]["datas"][0];
    }
    $nimg = $SiteClass->getimg($adat['id'],$imgx,$imgy);
}else  
$nimg = $SiteClass->getimg($adat['id'],$imgx,$imgy);
$adat=$SiteClass->jsons_from($adat);

if(!$adat["status"])$adat["status"]=2;
if(!$adat["sorrend"])$adat["sorrend"]=5;

//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);



?>