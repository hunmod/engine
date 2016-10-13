<?php

$filters['id'] = $getparams[2];
$news = $CsomagClass->get($filters, $order = '', $page = 'all');
$adat = $news['datas'][0];
/*$adatd["hu"] = $CsomagClass->get_text('hu', array('id' => $adat['id']));
$adat["hu"] = $adatd["hu"]["datas"][0];
$nimg = $CsomagClass->getimg($adat['id'], 800, 600);
$tipusok = $CsomagClass->tipus();

$puffer1 = szobatags_json_from($adat);
$adat['services'] = $puffer1['services'];
$adat['wellnes'] = $puffer1['wellnes'];
$adat['foglalasinfok'] = $puffer1['foglalasinfok'];*/

arraylist($filters);
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


<div class="container room">
    <div class="bottomspace">
        <h1 class="text-center"><?= $adat["hu"]["title"]; ?></h1>

        <div class="text-center">
            <h3><?= lan('mindenszobahoztartozik'); ?></h3>
            <?php
            if($szobahoztartozik)foreach ($szobahoztartozik as $mlb) {
                echo hotelicon_print($mlb, 50, 'fekete');
            } ?>
        </div>
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


            <!--img class="img-responsive" src="<?= $nimg; ?>" alt="<?= $adat["hu"]["title"]; ?>"-->
        </div>
        <div class="col-xs-5 match-height matchHeight">
            <div>
                <?= $adat["hu"]["leadtext"]; ?>
            </div>
            <div>
                <?= $adat["hu"]["longtext"]; ?>
            </div>
            <div class="connectedservices">
                <div class="col-sm-12">
                    <?= hotelicon_print('SZOBATIPUS', 30, 'fekete') ?> <b><?= lan('SZOBATIPUS') ?></b>  <br>
                </div>
                <div class="col-sm-12">
                    <?= hotelicon_print('SZOBA-MERETE', 30, 'fekete') ?> <b><?= $adat["roomsize"]; ?> M2</b>  <br>
                </div>
                <?php if ($adat["roomnum"]>1){?>
                    <div class="col-sm-12">
                        <?= hotelicon_print('CSALADI', 30, 'fekete') ?> <b><?= lan('CSALADI');?></b>  <br>
                    </div>
                    <?php
                }else{?>
                    <div class="col-sm-12">
                        <?= hotelicon_print('KET-FO', 30, 'fekete') ?> <b><?= lan('KET-FO') ?></b>
                    </div>
                    <?php
                }
                ?>
                <?php if ($adat["roomtip"]==3){?>
                    <div class="col-sm-12">
                        <?= hotelicon_print('kulonNAPPALI', 30, 'fekete') ?> <strong><?= lan('kulonNAPPALI');?></strong>  <br>
                    </div>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
                <div class="szobaar">
                    <?= lan('artolelott') ?><b><?= $adat["priece"]; ?> Ft</b>/<?= $tipusok[$adat["tip"]]; ?><?= lan('artolmogott') ?><br>
                    <?= lan('artolutan') ?>
                </div>
            </div>
            <span class="btn btn-creme col-xs-12"><?= lan('megrendelem'); ?></span>
            <span class="btn btn-creme-inv col-xs-12"><?= lan('kosarba'); ?></span>
        </div>
        <div class="clearfix "></div>

    </div>


    <div class="clear"></div>
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
        //csatlakozó szolgáltatások
        if (is_array($adat['services'])) {
            foreach ($adat['services'] as $servicename => $serviceval) {
                if (is_array($serviceval)) {
                    foreach ($serviceval as $servicesubname => $servicesubval) {
                        if ($servicesubval == 1) {
                            $filterscim['lang']='hu';
                            $filterscim['id']=$servicesubname;
                            $menudatcimarray= $category_class->get($filterscim, $order = '', $page = 'all');
                            $menudatcim=$menudatcimarray['datas'][0]['nev'];
                            $menudatclass=$menudatcimarray['datas'][0]['class'];
                            ?>
                            <div class="col-sm-4">
                                <?= hotelicon_print($menudatclass, 30, 'fekete',$menudatcim) ?> <b><?= $menudatcim ?></b>
                            </div>
                        <?php }

                }
                }


            }

        }

       // arraylist($adat['services']);
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