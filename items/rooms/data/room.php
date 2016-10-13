<?php
$extrascript[] = '
<link type="text/css" rel="stylesheet" href="' . $homeurl . '/scripts/lightslider-master/src/css/lightslider.css" />
<script src="' . $homeurl . '/scripts/lightslider-master/src/js/lightslider.js"></script>
';

$filters['id'] = $getparams[2];
$filters['lang'] = $_SESSION['lang'];
$news = $RoomsClass->get($filters, $order = '', $page = 'all');
$adat = $news['datas'][0];
$adatd["hu"] = $RoomsClass->get_text('hu', array('id' => $adat['id']));
$adat["hu"] = $adatd["hu"]["datas"][0];
$nimg = $RoomsClass->getimg($adat['id'], 800, 600);
$tipusok = $RoomsClass->tipus();

$puffer1 = szobatags_json_from($adat);
$adat['services'] = $puffer1['services'];
$adat['wellnes'] = $puffer1['wellnes'];
$adat['foglalasinfok'] = $puffer1['foglalasinfok'];
?>