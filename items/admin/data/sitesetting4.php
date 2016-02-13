<?php
//$leftside[]="./items/user/web/usermenu.php";
//$leftside[]="./items/admin/web/widget_sitesetting_menu.php";

$extrascript[]= ' 
	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script> 
	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />
	<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>	
	';
	

foreach ($_POST as $name=>$value){

if ($name!=""){
/*	//echo $_POST[$_POST["what"]];
	$q="REPLACE INTO ".$tbl["page_settings"]." (`id` ,`value`)
VALUES ('".$_POST["what"]."', '".$_POST[$_POST["what"]]."');";
db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', 'replace');*/
updt_page_settings($name,$value);
}
}
?>