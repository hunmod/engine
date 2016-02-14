<?php
$extrascript[]= '
<link rel="stylesheet" type="text/css" href="'.$server_url.'scripts/jrac/style.jrac.css" />
<script type="text/javascript" src="'.$server_url.'/scripts/jrac/jquery.jrac.js"></script>
	';


$cropdata["cx"]=0;
$cropdata["cy"]=200;
$cropdata["ch"]=595;
$cropdata["cw"]=595;
$cropdata["iw"]=630;

if($_POST["imgurl"]){

    $cropdata=$_POST;

   copy(".".$cropdata["imgurl"],".".$cropdata["imgurl"].".jpg");

    $Upload_Class->img_crop(".".$cropdata["imgurl"].".jpg", $cropdata["cw"], $cropdata["ch"],$cropdata["cx"],$cropdata["cy"],$cropdata["iw"] );
    //  img_crop($img_url, $img_w, $img_h,$img_x,$img_y,$img_width ){

//echo "fdfsdfdsfd ".$cropdata["imgurl"].".jpg";
    arraylist($cropdata);
}

?>