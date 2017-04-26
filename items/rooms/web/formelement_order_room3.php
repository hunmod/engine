<style>
    ar {
        font-weight: bold;
    }

    helyett {
        text-decoration: line-through;
    }

    artipusid {
        display: none;
    }
</style>


<div class="row ordertable">
    <?php $c = $c * 1;
    //if(!$order['rooms'][$c]["id"])
    $xclass = '';
    if ($csomag['id']) $xclass = 'csomaggal';
    ?>
    <?php if ($getparams[3] == "csomag"){
    //ha csomag
    $chk = 0;
    if ($_POST["room"] == $roomdatas['id']) $chk = 1;
    ?>
    <div class="col-sm-2 col-xs-2">
        <?php $FormClass->radiobox('room', $roomdatas['id'], "", "checkbox-inline", $chk); ?>
    </div>
    <div class="col-sm-6 col-xs-8">
        <div>
            <name class="szobanev"><?php echo $roomdatas["title"]; ?></name>
        </div>

        <?php if ($csomag['id']) { ?>
            <img itemprop="image" class="csomaginfo"
                 src="<?php echo $nimg = $CsomagClass->getimg($csomag['id'], 100, 100); ?>"
                 alt="<?php echo $csomag["title"]; ?>"><?php
        }
        ?><img itemprop="image" class="szobainfo <?= $xclass ?>"
               src="<?php echo $RoomsClass->getimg($roomdatas['id'], 100, 100); ?>"
               alt="<?php echo $roomdatas["title"]; ?>">

    </div>
    <div class="col-sm-4 col-xs-8 text-left">

        <div class="col-sm-12"> <?= hotelicon_print('EGY-FO', 30, 'greyishbeige', lan("priece1person")) ?>

            <?php if ($csomag['id'] && $roomdatas['priece1'] > 0) { ?>
                <ar1><?= $room["priece1"]; ?></ar1>
                <artipus><?= $artipus[$room['tip']] ?></artipus>
                <artipusid><?= $room['tip'] ?></artipusid>
                <helyett><?= $roomdatas['priece1'] ?> <?= $artipus[$roomdatas['tip']] ?></helyett>
            <?php } else { ?>
                <ar1><?= $roomdatas['priece1'] ?></ar1>
                <artipus><?= $artipus[$roomdatas['tip']] ?></artipus>
                <artipusid><?= $roomdatas['tip'] ?></artipusid>
            <?php } ?>
        </div>

        <div class="col-sm-12"><?= hotelicon_print('KET-FO', 30, 'greyishbeige', lan("priece2person")) ?>
            <?php if ($csomag['id'] && $roomdatas['priece2'] > 0) { ?>
                <ar2><?= $room["priece2"]; ?></ar2>
                <artipus><?= $artipus[$room['tip']] ?></artipus>
                <artipusid><?= $room['tip'] ?></artipusid>
                <helyett><?= $roomdatas['priece2'] ?> <?= $roomdatas[$room['tip']] ?> <?= $artipus[$roomdatas['tip']] ?></helyett>
            <?php } else { ?>
                <ar2><?= $roomdatas['priece2'] ?></ar2>
                <artipus><?= $artipus[$roomdatas['tip']] ?></artipus>
                <artipusid><?= $roomdatas['tip'] ?></artipusid>
            <?php } ?>
        </div>
    </div>
        <?php } else {
        //ha szoba
        ?>
        <div class="col-sm-8 col-xs-10">
            <?php if ($csomag['id']) { ?>
                <img itemprop="image" class="csomaginfo"
                     src="<?php echo $nimg = $CsomagClass->getimg($csomag['id'], 100, 100); ?>"
                     alt="<?php echo $csomag["title"]; ?>"><?php
            }
            ?><img itemprop="image" class="szobainfo <?= $xclass ?>"
                   src="<?php echo $RoomsClass->getimg($roomdatas['id'], 100, 100); ?>"
                   alt="<?php echo $roomdatas["title"]; ?>">
            <name class="szobanev"><?php echo $roomdatas["title"]; ?></name>

        </div>
        <div class="col-sm-4 col-xs-8 text-left">

            <div class="col-sm-12"> <?= hotelicon_print('EGY-FO', 30, 'greyishbeige', lan("priece1person")) ?>

                <?php if ($csomag['id'] && $roomdatas['priece1'] > 0) { ?>
                    <ar1><?= $room["priece1"]; ?></ar1>
                    <artipus><?= $artipus[$room['tip']] ?></artipus>
                    <artipusid><?= $room['tip'] ?></artipusid>
                    <helyett><?= $roomdatas['priece1'] ?> <?= $artipus[$roomdatas['tip']] ?></helyett>
                <?php } else { ?>
                    <ar1><?= $roomdatas['priece1'] ?></ar1>
                    <artipus><?= $artipus[$roomdatas['tip']] ?></artipus>
                    <artipusid><?= $roomdatas['tip'] ?></artipusid>
                <?php } ?>
            </div>

            <div class="col-sm-12"><?= hotelicon_print('KET-FO', 30, 'greyishbeige', lan("priece2person")) ?>
                <?php if ($csomag['id'] && $roomdatas['priece2'] > 0) { ?>
                    <ar2><?= $room["priece2"]; ?></ar2>
                    <artipus><?= $artipus[$room['tip']] ?></artipus>
                    <artipusid><?= $room['tip'] ?></artipusid>
                    <helyett><?= $roomdatas['priece2'] ?> <?= $roomdatas[$room['tip']] ?> <?= $artipus[$roomdatas['tip']] ?></helyett>
                <?php } else { ?>
                    <ar2><?= $roomdatas['priece2'] ?></ar2>
                    <artipus><?= $artipus[$roomdatas['tip']] ?></artipus>
                    <artipusid><?= $roomdatas['tip'] ?></artipusid>
                <?php } ?>
            </div>

        </div>
        <div class="col-sm-4 col-xs-4 <?= 'rooms' . $c . 'rendelesadatok' ?> hidden">
            <?= $FormClass->hiddenbox('rooms[' . $c . '][csomagid]', $order['rooms'][$c]["csomagid"]) ?>
            <?= $FormClass->hiddenbox('rooms[' . $c . '][id]', $roomdatas['id']) ?>
            <?= $FormClass->hiddenbox('rooms[' . $c . '][childbad]', $roomdatas['childbad']) ?>
            <?= $FormClass->hiddenbox('rooms[' . $c . '][person]', 2, 'szabadhelyek') ?>
        </div>


    <?php
        } ?>

</div>