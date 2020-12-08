<?php
/*
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
//updt_page_settings($_POST["what"],$_POST[$_POST["what"]]);
//}
?>
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
        updt_page_settings($name,$Text_Class->htmltochars($value));
    }
}
?>
