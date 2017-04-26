<?php
$adminv=1;
$admintemplate=1;
$filterscim['maxegyoldalon']=30;
if ($getparams[2]){
	$_GET['kat']=$getparams[2];
}
if ($_GET['kat']){
    $filterscim['kat']=$adat['kat']=$_GET['kat'];
	$filterscim['lang']='hu';

	$filterscim['id']=$_GET['kat'];
	$menudatcimarray= $category_class->get($filterscim, ' sorrend ASC', $page = 'all');
   // echo $menudatcimarray['query'];
	$menudatcim=$menudatcimarray['datas'][0][nev].' ';
}


if ($auser["jog"]>=3){
    $filters['status']='all';
}
else{

}

include('list.php');
?>