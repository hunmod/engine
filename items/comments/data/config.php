<?php
$tblmodulom='comment';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."comments";
$file_structuct=array();
$file_structuct["modules"]="comment";


/*admin menü*/
$file_structuct["name"]="comment lista";
$file_structuct["file"]="lista";
$adminmenu[]=$file_structuct;
$hirimg_loc='uploads/comments/';
include_once("class.comment.php");
$comment_class->create_table();

?>