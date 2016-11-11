<?php
$filtersside['lang'] = $_SESSION['lang'];
$sidearray = $CsomagClass->get($filtersside, $order = '', $page = 'all');
$sideadat = $sidearray['datas'];

foreach ($sideadat as $elem) {
   // $nimg = $CsomagClass->getimg($elem['id'], 800, 600);
include('csomag_display2.php');

}
?>