<div class="row ordertable">
    <?php $c=$c*1;
    //if(!$order['rooms'][$c]["id"])
    $xclass='';
    if($csomag['id'])$xclass='csomaggal';
    ?>
    <div class="col-sm-2 col-xs-4"><?= $FormClass->numbox('rooms['.$c.'][ordernum]',$order['rooms'][$c]["ordernum"], 'db', 0); ?></div>
    <div class="col-sm-4 col-xs-8">
        <div>
        <?php if ($csomag['id']) {?>
            <name class="szobanev"><?= $csomag['title'] ?> - </name>
        <?php } ?>
        <name class="szobanev"><?php echo $roomdatas["title"]; ?></name>
        </div>
        <?php if ($csomag['id']) {?>
            <img itemprop="image" class="csomaginfo" src="<?php echo $nimg = $CsomagClass->getimg($csomag['id'], 100, 100); ?>" alt="<?php echo $csomag["title"]; ?>"><?php
        }
        ?><img itemprop="image" class="szobainfo <?= $xclass?>" src="<?php echo $RoomsClass->getimg($roomdatas['id'], 100, 100); ?>" alt="<?php echo $roomdatas["title"]; ?>">

    </div>
    <div class="col-sm-4 col-xs-8 text-left">
        <div class="col-sm-12"><?= hotelicon_print('EGY-FO', 30, 'greyishbeige', lan("priece1person")) ?>
        <ar><?= $room["priece1"]; ?></ar><helyett><?= $roomdatas['priece1'] ?> <?= $roomdatas[$room['tip']] ?></helyett><artipus><?= $artipus[$room['tip']] ?></artipus></div>
        <div class="col-sm-12"><?= hotelicon_print('KET-FO', 30, 'greyishbeige', lan("priece2person")) ?>
        <ar><?= $room["priece2"]; ?></ar><helyett><?= $roomdatas['priece2'] ?> <?= $roomdatas[$room['tip']] ?></helyett><artipus><?= $artipus[$room['tip']] ?></artipus></div>
    </div>
    <div class="col-sm-2 col-xs-4">
        <?= $FormClass->hiddenbox('rooms['.$c.'][csomagid]',$order['rooms'][$c]["csomagid"])?>
        <?= $FormClass->hiddenbox('rooms['.$c.'][id]',$roomdatas['id'])?>
        <?= $FormClass->hiddenbox('rooms['.$c.'][childbad]',$roomdatas['childbad'])?>
        <?= $FormClass->hiddenbox('rooms['.$c.'][person]',2,'szabadhelyek')?>
        <?= $FormClass->numbox('rooms['.$c.'][felnott]',$order['rooms'][$c]["felnott"],'felnott')?>
        <?= $FormClass->numbox('rooms['.$c.'][gyerek]',$order['rooms'][$c]["gyerek"],'gyerek')?>

    </div>
</div>
