<?php


/*$extrascript[]= '
<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="'.$homeurl.$makemin->css('/scripts/owl-carousel/owl.carousel.css','/scripts/owl-carousel/owl.carousel.min.css').'" />
 <!-- Default Theme -->
 <link rel="stylesheet" href="'.$homeurl.$makemin->css('/scripts/owl-carousel/owl.theme.css','/scripts/owl-carousel/owl.theme.min.css').'" />
 <!-- Include js plugin -->
<script src="'.$homeurl.'/scripts/owl-carousel/owl.carousel.min.js"></script>';
*/

$cfilters["status"]=2;
$qhir=$category_class->get($cfilters,'',$_GET["page"]) ;
$catlist=$qhir;


//$page_ogimage=$homeurl.'/'.$stylefolder.'img/fblink.jpg';
//$page_description="Abrak a hasba a speciális diétás szakácskönyv. gluténmentes, laktózmentes, cukormentes, diabetikus recepetek kalóriatáblázattal. Tölsd fel te is kedvenc recepted!";

?>