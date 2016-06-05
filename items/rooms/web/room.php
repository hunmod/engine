<?php

$filters['id'] = $getparams[2];
$news = $RoomsClass->get($filters, $order = '', $page = 'all');
$adat = $news['datas'][0];
$adatd["hu"]=$RoomsClass->get_text('hu',array('id'=>$adat['id']));
$adat["hu"]=$adatd["hu"]["datas"][0];
$nimg = $RoomsClass->getimg($adat['id']);
$tipusok = $RoomsClass->tipus();

//arraylist($adat);
?>
<div class="container room">
 <div>
 <form method="post">

     <?php include('items/start/web/timerange.php');?>
     <?php $FormClass->numbox("adult", $Text_Class->htmlfromchars($adat['adult']),'Felnőtt') ?>
     <?php $FormClass->numbox("children", $Text_Class->htmlfromchars($adat['children']),'Gyerek') ?>
 </form>
 </div>


    <h1><?= $adat["hu"]["title"];?></h1>
    <div class="col-xs-4 thumbnail">
       <img class="img-thumbnail" src="<?= $nimg;?>" alt="<?= $adat["hu"]["title"];?>">
    </div>
    <div class="col-xs-8">
        <b><?= $lan["priece"];?>:</b><?= $adat["priece"];?><br>
        <b><?= $lan["tip"];?>:</b><?= $tipusok[$adat["tip"]];?><br>
        <b><?= $lan["guestbad"];?>:</b><?= $adat["guestbad"];?><br>
        <b><?= $lan["roomnum"];?>:</b><?= $adat["roomnum"];?><br>
        <b><?= $lan["bathroom"];?>:</b><?= $adat["bathroom"];?><br>
        <b><?= $lan["kitchen"];?>:</b><?= $adat["kitchen"];?><br>
    </div>

    <div class="clear">
    <div class="col-xs-6">
        <?= $adat["hu"]["leadtext"];?>
    </div>
    <div class="col-xs-12">
        <?= $adat["hu"]["longtext"];?>
    </div>
    <div class="col-xs-12">
        <?= $adat["hu"]["included"];?>
    </div>

    <div class="col-xs-12">
        <?php
        if ($adat["id"] > 0) {
            $getparams[2] = $adat["id"];
            include('items/files/web/list.php');
            ?>
        <?php } ?>
    </div>



</div>
