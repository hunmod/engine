<?php
$room_loc='uploads/rooms';
$tblmodulom='rooms';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."rooms";
$file_structuct=array();
$file_structuct["modules"]="rooms";


/*admin men�*/
$file_structuct["name"]="szobalista";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;

$file_structuct["name"]="szobalista";
$file_structuct["file"]="list";
$modules[]=$file_structuct;
$file_structuct["name"]="Egy szoba";
$file_structuct["file"]="room";
$modules[]=$file_structuct;

include('rooms.class.php');

?>