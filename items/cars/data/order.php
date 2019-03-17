<?php
$extrascript[]= '
	<script src="'.$server_url.'scripts/jquery.ui.timepicker.js"></script> 
	<link rel="stylesheet" href="'.$server_url.'scripts/jquery.ui.timepicker.css" />';
$extrascript[]= '	<script src="'.$server_url.'/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckeditor/adapters/jquery.js" type="text/javascript"></script>
	<script src="'.$server_url.'/scripts/ckfinder/ckfinder.js" type="text/javascript"></script>';
$extrascript[]= "<script>$(document).ready(function () { $( 'textarea.editor' ).ckeditor(); });</script>";
?>