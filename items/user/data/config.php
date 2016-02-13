<?php


$file_structuct=array();
$file_structuct["modules"]="user";

/*admin menü*/
$file_structuct["name"]="User list";
$file_structuct["file"]="list";
$adminmenu[]=$file_structuct;


include_once('./items/user/class/users.class.php');
$User_Class=$UserClass=new user();



$User_Class->create_table();

?>