<?php
//$leftside[]="./items/user/web/usermenu.php";
//$leftside[]="./items/admin/web/widget_sitesetting_menu.php";
//	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script>
//	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
$admintemplate=1;
$extrascript[]= ' 
	<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>	
	';

?>

<?php
/*
$extrascript[]= '
	<script src="scripts/jquery.ui.timepicker.js"></script> 
	<link rel="stylesheet" href="scripts/jquery.ui.timepicker.css" />

	<script src="scripts/html5lightbox/html5lightbox.js"></script> 
	<script src="./scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	';
*/
if ($getparams[2]!=''){
$qadatok="SELECT * FROM  ".$tbl['shop']." WHERE id='".$Text_Class->decode($getparams[2])."'";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$adat=$adatok[0];
$adat['ar_old']=$adat['ar'];

	$filter["id"]=$Text_Class->decode($getparams[2]);
	$filter["status"]='all';

	$datas=$ShopClass->get($filter,$order='',$page='all');
	$adat=$datas["datas"][0];
    //$qadat['id']=$filter["id"];
    $datas=$ShopClass->get_text('hu',$filter);
    $adat+=$datas["datas"][0];



}
if ($_POST['title']!=""){
	$adat=$_POST;
	if ($adat["id"]<1)
	{
		unset($adat["id"]);
	}
	
	//$savedatas=$ShopClass->table($adat);// shop_editform_form($adat);
    $mret=$ShopClass->save($adat);
    $adat['id']=$mret;
    $adat['title']=$adat['title'];
    $adat['leadtext']=$adat['leadtext'];
    $ShopClass->save_text('hu',$adat);

    //arraylist($adat);

   // save_text($lan,$datas)
//arraylist($ShopClass->save($adat));
}
?>