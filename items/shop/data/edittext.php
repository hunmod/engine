<?php
$extrascript[]= ' 
	<script src="scripts/jquery.ui.timepicker.js"></script> 
	<link rel="stylesheet" href="scripts/jquery.ui.timepicker.css" />

	<script src="scripts/html5lightbox/html5lightbox.js"></script> 
	<script src="./scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	';


if ($getparams[2]!=''){
$qadatok="SELECT * FROM  ".$tbl['shop']." WHERE id='".base64_decode($getparams[2])."'";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$adat=$adatok[0];
$adat['ar_old']=$adat['ar'];
}
if ($_POST['cim']!=""){
	$adat=$_POST;
	if ($adat["id"]<1)
	{
		unset($adat["id"]);
	}
	
	//$savedatas=$shop_class->table($adat);// shop_editform_form($adat);

	$shop_class->save($adat);


}

?>