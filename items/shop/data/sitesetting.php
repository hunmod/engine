<?php
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/admin/web/widget_sitesetting_menu.php";


$extrascript[]= ' 
	<script src="scripts/jquery.ui.timepicker.js"></script> 
	<link rel="stylesheet" href="scripts/jquery.ui.timepicker.css" />
  
	<script src="scripts/jquery.Jcrop.js "></script> 
	<link rel="stylesheet" href="scripts/jquery.Jcrop.css" />
	
	<script src="scripts/html5lightbox/html5lightbox.js"></script> 
	<script src="./scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="scripts/hn_imageproc.js" type="text/javascript"></script>
	';
	

if ($_POST["what"]){
/*	//echo $_POST[$_POST["what"]];
	$q="REPLACE INTO ".$tbl["page_settings"]." (`id` ,`value`)
VALUES ('".$_POST["what"]."', '".$_POST[$_POST["what"]]."');";
db_query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', 'replace');*/
updt_page_settings($_POST["what"],$_POST[$_POST["what"]]);
}
?>