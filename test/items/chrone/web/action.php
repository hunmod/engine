<?php
$where=" WHERE status=1 ";
$qchrone="SELECT * FROM  ".$tbl['chron'].$where." LIMIT 0 , 30";
$chronlist=db_Query($qchrone, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");

foreach ($chronlist as $chron)
{
$interval= ($chron["intervalt"]);
$runable = date("Y-m-d H:i:s",strtotime(date($chron["lastrun"])." +".$interval." minutes"));
/*
echo "<br>";
echo $runable;
echo "<br>";
echo datedata($chron["lastrun"])." vs ".datedata($runable); 
echo "<br>";
echo datedata($date).">".datedata($runable); 
echo "<br>";
echo datedata($date)-datedata($runable); 
echo "<br>";*/

if (datedata($date)-datedata($runable)>0)	
{
$qchrone="UPDATE  ".$tbl['chron']." SET  `lastrun` = ".$date." WHERE  `system_chron`.`id` =".$chron["id"]." LIMIT 1 ;";
db_Query($qchrone, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");
if(file_exists("./items".$chron['file'])){
	include_once("./items".$chron['file']);	
}
}

}
//arraylist($chronlist);

?>