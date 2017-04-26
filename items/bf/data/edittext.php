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
    $addres=$_POST["zip"].',';
        $cfilters['id'] = $_POST['varos'];
        $citysarray = $location_class->get_city($cfilters, ' LIMIT 0,5');
    $addres.=$citysarray["datas"][0]['city_name'].',';
    $addres.=$_POST["street"];
    if ($_POST["hsz"])    $addres.=','.$_POST["hsz"];

    $_POST["nev"]=$Text_Class->htmltochars($_POST["nev"]);
    $_POST["leiras"]=$Text_Class->htmltochars($_POST["leiras"]);
    $_POST["megjegyzes"]=$Text_Class->htmltochars($_POST["megjegyzes"]);
    $_POST["cim"]=$Text_Class->htmltochars($_POST["cim"]);
    $_POST["street"]=$Text_Class->htmltochars($_POST["street"]);
    $_POST["szamlazasicim"]=$Text_Class->htmltochars($_POST["szamlazasicim"]);


    if ($_POST["longi"]==''||$_POST["lati"]==''){
        // $Google_Class-> get_google_geocdata($_POST["lati"],$_POST["longi"]);
        // echo $addres;
        $gback=  $Google_Class-> get_google_geocoding($addres);
        if($gback[0]['geometry']['location']['lat']){
            $_POST["lati"]=$gback[0]['geometry']['location']['lat'];
            $_POST["longi"]=$gback[0]['geometry']['location']['lng'];
        }

        // arraylist($gback);
    }

    $mcats='';
    if (count($_POST["cats"]))foreach($_POST["cats"] as $name=>$val){
        if ($mcats)$mcats.=',';
        $mcats.=$name;
    }
        $_POST["cat"]=$mcats;


        //arraylist($_POST);

    $hirid = $bf_class->save($_POST);
    $_POST["id"] = $hirid;

    //$target = $UploadClass->uploadimg('photo', $bfimg_loc . '/' . $hirid, '' . $hirid, 800, 600, true, true, true);
    $target = $UploadClass->uploadimg('photo', $bfimg_loc , '' . $hirid, 800, 600, true, true, true);
//echo $target;
// header("Location:".$homeurl."/bf/edittext/".encode($hirid));
 header("Location:".$homeurl."/bf/lista");

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

$bfallcat=$category_class->get(array('status'=>'2','lang'=>'hu'));
//arraylist($bfallcat);
if (!isset($adat["status"]))$adat["status"]=2;


$allselect=0;
if (!isset($adat["pos"]))$adat["pos"]=$allselect;
if (!isset($adat["wifi"]))$adat["wifi"]=$allselect;
if (!isset($adat["bringa"]))$adat["bringa"]=$allselect;
if (!isset($adat["dohanyzo"]))$adat["dohanyzo"]=$allselect;
if (!isset($adat["sport"]))$adat["sport"]=$allselect;
if (!isset($adat["allat"]))$adat["allat"]=$allselect;
if (!isset($adat["roki"]))$adat["roki"]=$allselect;
if (!isset($adat["konyha"]))$adat["konyha"]=$allselect;
if (!isset($adat["medence"]))$adat["medence"]=$allselect;
if (!isset($adat["gyerek"]))$adat["gyerek"]=$allselect;
if (!isset($adat["specdieta"]))$adat["specdieta"]=$allselect;
if (!isset($adat["szepkartya"]))$adat["szepkartya"]=$allselect;
if (!isset($adat["erzsebetkartya"]))$adat["erzsebetkartya"]=$allselect;
if (!isset($adat["telen"]))$adat["telen"]=$allselect;
if (!isset($adat["support"]))$adat["support"]=$allselect;
?>