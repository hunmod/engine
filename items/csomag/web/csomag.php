<?php

?>
<style>
    .connectedservices div p {
        display: block;
        width: 100%;
        float: left;
    }

    .connectedservices b {
        margin: 5px 0px 0px 8px;
    }

    .connectedservices b,
    .connectedservices span {
        float: left;
        display: block;
    }

    .bottomspace {
        margin-bottom: 2em;

    }

    #lightSlider li img {
        width: 100%;
    }
</style>


<script type="text/javascript">

    $(document).ready(function () {
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 9,
            slideMargin: 0,
            enableDrag: false,
            currentPagerPosition: 'left',
            onSliderLoad: function (el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }
        });
    });
</script>


<div class="container csomag">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl;?>"><?=lan('home');?></a> >
        <a href="<?php echo $homeurl.'/'.$separator.shorturl_get("m/1");?>"> <?=lan('csomaglista');?></a> >
        <span><?= $menudatcim ?></span>
    </div>

    <?php //arraylist($adat); ?>

    <div class="bottomspace">
        <?= hotelicon_print($adat['icon'], 50, 'fekete', $menudatcim) ?>
        <h1 class="text-center">
            <b><?= $menudatcim ?></b>
            <?= $adat["title"]; ?></h1>
        <?php
        //csatlakozó szolgáltatások
        if (is_array($adat['services'])) {
            foreach ($adat['services'] as $servicename => $serviceval) {
                if (is_array($serviceval)) {
                    foreach ($serviceval as $servicesubname => $servicesubval) {
                        if ($servicesubval == 1) {
                            $filterscim['lang'] = 'hu';
                            $filterscim['id'] = $servicesubname;
                            $menudatcimarray = $category_class->get($filterscim, $order = '', $page = 'all');
                            $menudatcim = $menudatcimarray['datas'][0]['nev'];
                            $menudatclass = $menudatcimarray['datas'][0]['class'];
                            ?>
                                <?= hotelicon_print($menudatclass, 30, 'greyishbeige', $menudatcim) ?>
                        <?php }

                    }
                }
            }
        }?>
    </div>
    <div class="bottomspace">
        <div class="col-xs-7 match-height matchHeight">
            <?php
            $id = ($getparams[2]);
            $menu = $MenuClass->get_one_menu($id);
            $mappa = 'uploads/' . $folders["uploads"] . "/" . $getparams[0] . "/" . $id . '/';
            $mylist = $Upload_Class->folderlist($mappa, 600, 300, 70);
            //arraylist($mylist);
            ?>

            <ul id="lightSlider">
                <li data-thumb="<?= $CsomagClass->getimg($adat['id'], 70, 39); ?>"
                    data-src="<?= $CsomagClass->getimg($adat['id'], 70, 39); ?>">
                    <img src="<?= $CsomagClass->getimg($adat['id'], 600, 300); ?>"/>
                </li>
                <?php foreach ($mylist as $onepic) { ?>

                    <li data-thumb="<?= $homeurl . $onepic["url"] ?>" data-src="<?= $homeurl . $onepic["screen"] ?>">
                        <img src="<?= $homeurl . $onepic["screen"] ?>"/>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-xs-5 match-height matchHeight">
            <div>
                <?= $adat["leadtext"]; ?>
            </div>

            <div class="connectedservices">
                <div class="col-sm-12">
                    <?= hotelicon_print('SZOBATIPUS', 30, 'fekete') ?> <b><?= lan('SZOBATIPUS') ?></b> <br>
                </div>
                <div class="col-sm-12">
                    <?= hotelicon_print('SZOBA-MERETE', 30, 'fekete') ?> <b><?= $adat["roomsize"]; ?> M2</b> <br>
                </div>
                <?php if ($adat["roomnum"] > 1) { ?>
                    <div class="col-sm-12">
                        <?= hotelicon_print('CSALADI', 30, 'fekete') ?> <b><?= lan('CSALADI'); ?></b> <br>
                    </div>
                    <?php
                } else { ?>
                    <div class="col-sm-12">
                        <?= hotelicon_print('KET-FO', 30, 'fekete') ?> <b><?= lan('KET-FO') ?></b>
                    </div>
                    <?php
                }
                ?>
                <?php if ($adat["roomtip"] == 3) { ?>
                    <div class="col-sm-12">
                        <?= hotelicon_print('kulonNAPPALI', 30, 'fekete') ?>
                        <strong><?= lan('kulonNAPPALI'); ?></strong> <br>
                    </div>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
                <div class="szobaar">
                    <?= lan('artolelott') ?><b><?= $adat["priece"]; ?>
                        Ft</b>/<?= $tipusok[$adat["tip"]]; ?><?= lan('artolmogott') ?><br>
                    <?= lan('artolutan') ?>
                </div>
            </div>
            <a href="<?php echo $homeurl.$separator."rooms/order/".($adat["id"]).'/csomag/'.$TextClass->to_link($adat["title"]);?>" class="btn btn-creme col-xs-12"><?= lan('megrendelem'); ?></a>
            <span class="btn btn-creme-inv col-xs-12"><?= lan('kosarba'); ?></span>
        </div>
        <div class="clearfix "></div>

    </div>
    <div class="clear"></div>

    <div>
        <?= $adat["longtext"]; ?>
    </div>
    <div class="clear"></div>
    <?php if ($adat['rooms']) { ?>
        <table class="priecetable">
            <tr>
                <th><?= hotelicon_print('SZALLAS', 30, 'greyishbeige',lan("szobatipus")) ?></th>
                <th><?= hotelicon_print('EGY-FO', 30, 'greyishbeige',lan("priece1person")) ?></th>
                <th><?= hotelicon_print('KET-FO', 30, 'greyishbeige',lan("priece2person")) ?></th>
                </tr>
            <?php foreach ($adat['rooms'] as $room) { ?>
                <tr>
                    <td><?= $room['title'] ?></td>
                    <td><?= $adat["roomsize"]; ?><?= $room['priece1'] ?> <?= $artipus[$room['tip']]?></td>
                    <td><?= $adat["roomsize"]; ?><?= $room['priece2'] ?> <?= $artipus[$room['tip']]?></td>
                    <?php ?>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    <?php


    /*
    //arraylist($adat['services']);
    if ($adat['services'])
        foreach ($adat['services'] as $szolgvar => $szolg) {
            if (is_array($szolg)) {
                $qsubroot = $category_class->get(array('id' => $szolgvar, 'lang' => $_SESSION['lang']), '', $_GET["page"]); ?>
                <div class="<?= $qsubroot['datas'][0]['id'] ?>">
                    <?php
                    foreach ($szolg as $subszolgvar => $subszolg){
                    $qsubroot = $category_class->get(array('id' => $subszolgvar, 'lang' => $_SESSION['lang']), '', $_GET["page"]); ?>
                        <?= hotelicon_print($qsubroot['datas'][0]['class'], 30, 'fekete') ?>
                        <b><?= $qsubroot['datas'][0]['nev'] ?></b>
                        <?= $qsubroot['datas'][0]['leiras'] ?>
                        <?= $qsubroot['datas'][0]['leirash'] ?>
                        <?php
                        }
                        ?>
                </div>
                <?php
            }
        }
*/
    ?>

    <div class="col-xs-12 connectedservices">
        <?php
        /*
        if ($adat['services']) foreach ($adat['services'] as $hat => $val) { ?>
            <div class="col-sm-4">
                <?= hotelicon_print($hat, 30, 'fekete') ?> <b><?= lan($hat) ?></b>
                <?php if ($lan[$hat . "_leiras"] != '') {
                    echo '<p>' . $lan[$hat . "_leiras"] . '</p>';
                } ?>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <div class="col-xs-6 wellnes">
        <?php
        if ($adat['wellnes']) foreach ($adat['wellnes'] as $hat => $val) { ?>
            <div class="col-sm-12">
                <?= hotelicon_print($hat, 30, 'fekete') ?> <b><?= lan($hat) ?></b>
                <?php if ($lan[$hat . "_leiras"] != '') {
                    echo $lan[$hat . "_leiras"];
                } ?>
            </div>
        <?php }*/ ?>
    </div>

    <div class="clear"></div>
    <div class="col-xs-12">
        <?= $Text_Class->htmlfromchars(page_settings('roomunder1' . $_SESSION["lang"])) ?>
    </div>
    <div class="clear"></div>
    <div class="col-xs-12">
        <?= $Text_Class->htmlfromchars(page_settings('roomaltalanos' . $_SESSION["lang"])) ?>
    </div>


    <div class="col-xs-12 connectedservices">
        <?php /*
        if ($adat['services']) foreach ($adat['services'] as $hat => $val) { ?>
            <div class="col-sm-4">
                <?= hotelicon_print($hat, 30, 'fekete') ?> <b><?= lan($hat) ?></b>
                <?php if ($lan[$hat . "_leiras"] != '') {
                    echo '<p>' . $lan[$hat . "_leiras"] . '</p>';
                } ?>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <div class="col-xs-6 wellnes">
        <?php
        if ($adat['wellnes']) foreach ($adat['wellnes'] as $hat => $val) { ?>
            <div class="col-sm-12">
                <?= hotelicon_print($hat, 30, 'fekete') ?> <b><?= lan($hat) ?></b>
                <?php if ($lan[$hat . "_leiras"] != '') {
                    echo $lan[$hat . "_leiras"];
                } ?>
            </div>
        <?php }*/ ?>
    </div>
    <div class="clear"></div>
    <div class="col-xs-6 foglalasinfok">
        <?php /*
        if ($adat['foglalasinfok']) foreach ($adat['foglalasinfok'] as $hat => $val) { ?>
            <div class="col-sm-12">
                <?= hotelicon_print($hat, 30, 'fekete') ?> <b><?= lan($hat) ?></b>
                <?php if ($lan[$hat . "_leiras"] != '') {
                    echo $lan[$hat . "_leiras"];
                } ?>
            </div>
        <?php } */ ?>
    </div>
    <div class="clear"></div>
    <div class="col-xs-12 connectedservices">
        <?= $adat["hu"]["included"]; ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.match-height').matchHeight();
    });
</script>