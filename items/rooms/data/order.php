<?php
function isissetvarval($val){
    if ($val){
        return $val;
    }
    else return '0';

}
$gyerekkedvezmenyek=array();
$gyerekkedvezmenyek['gyerekedvezmeny0']=array('tip'=>page_settings("gyerekedvezmeny0_tip"),'val'=>page_settings("gyerekedvezmeny0"));
$gyerekkedvezmenyek['gyerekedvezmeny1']=array('tip'=>page_settings("gyerekedvezmeny1_tip"),'val'=>page_settings("gyerekedvezmeny1"));
$gyerekkedvezmenyek['gyerekedvezmeny2']=array('tip'=>page_settings("gyerekedvezmeny2_tip"),'val'=>page_settings("gyerekedvezmeny2"));
$gyerekkedvezmenyek['gyerekedvezmeny3']=array('tip'=>page_settings("gyerekedvezmeny3_tip"),'val'=>page_settings("gyerekedvezmeny3"));


$extrascript[]="<script>var gyerekkedevezmenyek=JSON.parse('".json_encode($gyerekkedvezmenyek)."');</script>";
?>

