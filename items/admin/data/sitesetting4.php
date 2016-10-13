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
	

foreach ($_POST as $name=>$value){
if ($name!=""){
	updt_page_settings($name,$value);
}
}
?>