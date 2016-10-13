<?php
$extrascript[]= '
<link type="text/css" rel="stylesheet" href="'.$homeurl.'/scripts/lightslider-master/src/css/lightslider.css" />
<script src="'.$homeurl.'/scripts/lightslider-master/src/js/lightslider.js"></script>
	';
$filters['id'] = $getparams[2];
$filters['lang'] = $_SESSION['lang'];
$news = $CsomagClass->get($filters, $order = '', $page = 'all');
$adat = $news['datas'][0];
/*$adatd["hu"] = $CsomagClass->get_text('hu', array('id' => $adat['id']));
$adat["hu"] = $adatd["hu"]["datas"][0];*/
$nimg = $CsomagClass->getimg($adat['id'], 800, 600);

$puffer1 = csomagtags_json_from($adat);
$puffer2 = array();
if ($puffer1['services']['rooms']) foreach ($puffer1['services']['rooms'] as $myrooms) {
    $roompuff = $RoomsClass->get(array('id' => $myrooms['id'], 'lang' => $_SESSION['lang']));
    //arraylist($roompuff['datas'][0]);
    $myrooms['title'] = $roompuff['datas'][0]['title'];
    $pufferrooms[] = $myrooms;

}
$adat['services'] = $puffer1['services'];
$adat['rooms'] = $pufferrooms;
?>