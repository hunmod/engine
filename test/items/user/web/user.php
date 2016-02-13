<?php $userid= base64_decode($getparams[2]);
$q="UPDATE  ".$tbl['user']." SET  `jogid` =  '1' WHERE  `user`.`id` ='".$userid."'";
$vane=db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
		//echo $q;
?>
<h1>Felhasználónév aktiválása megtörtént!</h1>
