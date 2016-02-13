<?php
$file_structuct=array();
$file_structuct["modules"]="slide";

$file_structuct["name"]="Slider";
$file_structuct["file"]="sliders";
$adminmenu[]=$file_structuct;

include('class.slide.php');
$class_slider=new slide();
$class_slider->create_tables();
/*
$file_structuct["name"]="satikus hogyan használd?";
$file_structuct["file"]="hogyan";
$modules[]=$file_structuct;
$file_structuct["name"]="satikus kezdőlap";
$file_structuct["file"]="index";
$modules[]=$file_structuct;
*/
?>