<?php
$adminv=1;
$admintemplate=1;

if ($getparams[2]){
	$_GET['kat']=$getparams[2];
}
if ($_GET['kat']){
	$adat['kat']=$_GET['kat'];
	$filterscim['lang']='hu';
	$filterscim['id']=$_GET['kat'];
	$menudatcimarray= $category_class->get($filterscim, $order = '', $page = 'all');
	$menudatcim=$menudatcimarray['datas'][0][nev].' ';
}


if ($auser["jog"]>=3){
    $filters['status']='all';
}
else{

}

include('list.php');
?>