<?php
$leftside[]="./items/user/web/usermenu.php";
$leftside[]="./items/shop/web/widget_kosar.php";
$leftside[]="./items/shop/web/widget_menu.php";

if ($_SESSION["jogid"]!=4){
$whereorderlist=" WHERE ";
$whereorderlist=" uid=".$auser["id"];	
}

	$whereorderlist="";
	$qorderlist="SELECT * FROM  ".$tbl['shop_order'].$whereorderlist." ".$order." ".$limit;
	$orderlistlemek=db_Query($qorderlist, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");

	//arraylist($orderlistlemek);
	//echo "<br>"."<br>"."<br>"."<br>".$qorderlist;



?>