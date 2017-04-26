<?php
$extrascript[] = '
<link type="text/css" rel="stylesheet" href="' . $homeurl . '/scripts/lightslider-master/src/css/lightslider.css" />
<script src="' . $homeurl . '/scripts/lightslider-master/src/js/lightslider.js"></script>
';

$filters['id'] = $getparams[2];
$filters['lang'] = $_SESSION['lang'];
$news = $SiteClass->get($filters, $order = '', $page = 'all');
$adat = $news['datas'][0];
//$adatd["hu"] = $SiteClass->get_text('hu', array('id' => $adat['id']));
//$adat["hu"] = $adatd["hu"]["datas"][0];
$data['image']=$SiteClass->getimg($adat['id'], 1520, 533);
$menu=$MenuClass->get_one_menu($aprodata["mid"]);
$id = ($getparams[2]);
$mappa = 'uploads/' . $folders["uploads"] . "/" . $getparams[0] . "/" . $id . '/';
$mylist = $Upload_Class->folderlist($mappa, 1520, 533, 70);

$page_ogimage=$data['image'];
?>