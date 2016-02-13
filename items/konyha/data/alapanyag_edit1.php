<?php
$extrascript[]= ' 
	<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>	
	';
?>
<?php
$KAPOTTID=decode($getparams[2]);
$acsopq=$Sys_Class->get_list('alapanyag_csoport',array('status=2'));
///1 kJ = 0.24 kcal
/* kapott adat feldolgozása*/
if ((count($_POST))&&($_POST["nev"]!=""))
{
 if ($_POST["energia"]>$_POST["kaloria"]){
	// $_POST["nev"]=(strtolower($_POST["nev"]));
$_POST["kaloria"]=$_POST["energia"]*0.23;
 }
 else{
	 $_POST["energia"]=$_POST["kaloria"]/0.23;
 }
	$back=$kapott=$_POST;


//$trnslate = new BingTranslator();
//echo $trnslate->detect($inputStr);
//echo $trnslate->translate($fromLanguage="en",$toLanguage="hu",$inputStr);

$lngrol='hu';
$lngra='de';
if ($kapott['nev_'.$lngra]==''){
	if ($kapott['nev']!=''){
		$kapott['nev_'.$lngra]= $trnslate->translate($lngrol,$lngra,$kapott['nev']);
	}
}
$lngrol='hu';
$lngra='en';
if ($kapott['nev_'.$lngra]==''){
	if ($kapott['nev']!=''){
		$kapott['nev_'.$lngra]= $trnslate->translate($lngrol,$lngra,$kapott['nev']);
	}
}
	
//arraylist($kapott);	
	$back["id"]=$rec_class->save_alapanyag($kapott);

if ($auser["jog"]<4){
	//email küldése adminnak
	$emailtext='Új hozzávalót adtak hozzá:'.$back['nev'];
	$emailsubject="új hozzávaló";
		emailkuldes('hunmod@gmail.com','Nagy Péter',$emailsubject,$emailtext);
}
	//arraylist($kapott);
/*	
	$kapott=alapanyag_editform_form($_POST);	
	$back=gen_form_save($kapott,"alapanyag",$_POST);
	
*/	
	if ($back["id"]>0){
	$KAPOTTID=$back["id"];
	$getparams[2]=encode($back["id"]);
	// redirect($kezdooldal.$separator.$getparams[0]."/".$getparams[1]."/".$getparams[2]);
  	header("Location:".$homeurl.$separator.$getparams[0]."/".$getparams[1]."/".$getparams[2]);	
}
}

/* kapott adat feldolgozása*/


/* lekérdezés*/
$dbadat=$rec_class->egy_hozzavalo($KAPOTTID);
if ($dbadat['status']<1){
	$dbadat['status']=1;
}
?>
