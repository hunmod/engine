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

    .matchHeight table {
        height: 100%;
    }

    .matchHeight table td {
        vertical-align: top;
        padding-top: 5px;
    }

    .matchHeight table td:nth-child(2) {
        /* vertical-align: middle;*/
        padding-top: 10px;

    }

    .matchHeight table td img {
        margin-right: 5px;
    }

    .priecetable {
        width: 100%;
    }
    .togglestuff{
        background-color: #A49383;
        color: #fff;
        display: block;
        width: 100%;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        font-size: 16px;
    }
    .animhide{
        height: 0;
        overflow: hidden;
        display: none;
    }
</style>


<script type="text/javascript">
    function toggleanim(elementid){
        $(elementid).toggle(
          /*  function()
            {
                $(elementid).addClass('animhide');
            },
            function()
            {
                $(elementid).removeClass('animhide')
            }*/);
    }



    $(document).ready(function () {
        $('.match-height').matchHeight();
        $('.matchHeight').matchHeight();


        $('.togglestuff').click(function() {
            console.log( $(this).attr('id'));
            toggleanim('#'+$(this).attr('id')+'togle');
        });
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 4,
            slideMargin: 0,
            enableDrag: false,
            auto: true,
            pause: 7000,
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
        <a href="<?php echo $homeurl; ?>"><?= lan('home'); ?></a> >
        <a href="<?php echo $homeurl . '/' . $separator . shorturl_get("m/1"); ?>"> <?= lan('csomaglista'); ?></a> >
        <span><?= $menudatcim ?></span>
    </div>

    <?php //arraylist($adat); ?>

    <div class="bottomspace mindenhezhead">
        <?php
        $filterssubcat["lang"] = $filtersrootcat["lang"] = $_SESSION["lang"];
        $filtersrootcat["kat"] = "mindencsomaghoztarto";
        $filtersrootcat["status"] = "2";
        $qrootcat = $category_class->get($filtersrootcat, '', $_GET["page"]);
        if ($qrootcat['datas'])
            foreach ($qrootcat['datas'] as $rcat) {
                ?>
                <div class="mindeheztartozik">
                    <?= $caption = hotelicon_print($rcat['class'], 50, 'fekete', $rcat['nev']); ?><br>
                    <?= $rcat['nev'] ?>
                </div>
            <?php } ?>
    </div>

    <div class="clear"></div>

    <h1 class="text-center">
        <b><?= $menudatcim ?></b>
        <?= $adat["title"]; ?></h1>

    <div class="bottomspace text-center">
        <?= hotelicon_print($adat['icon'], 30, 'fekete', $menudatcim) ?>

        <?php
        //csatlakozó szolgáltatások

        if (is_array($adat['services']['csomagkategoria'])) {
            foreach ($adat['services']['csomagkategoria'] as $servicesubname => $servicesubval) {
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
        ?>
    </div>
    <div class="clear"></div>
    <div class="bottomspace">
        <div class="col-sm-7 match-height matchHeight">
            <?php
            $id = ($getparams[2]);
            $menu = $MenuClass->get_one_menu($id);
            $mappa = 'uploads/' . $folders["uploads"] . "/" . $getparams[0] . "/" . $id . '/';
            $mylist = $Upload_Class->folderlist($mappa, 150, 87, 1000);
            //arraylist($mylist);
            ?>

            <ul id="lightSlider">
                <li data-thumb="<?= $CsomagClass->getimg($adat['id'], 150, 87); ?>"
                    data-src="<?= $CsomagClass->getimg($adat['id'], 150, 87); ?>">
                    <img src="<?= $CsomagClass->getimg($adat['id'], 1000, 533); ?>"/>
                </li>
                <?php foreach ($mylist as $onepic) { ?>
                    <li data-thumb="<?= $homeurl . $onepic["screen"] ?>" data-src="<?= $homeurl . $onepic["url"] ?>">
                        <img src="<?= $homeurl . $onepic["url"] ?>"/>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-sm-5 match-height matchHeight">
            <div>
                <?= $adat["leadtext"]; ?>
            </div>
            <?php $idservices = (json_decode($adat["connectedservices"], true)); ?>

            <div class="connectedservices">
                <?php
                foreach ($idservices["services"]["csomagkategoria"] as $s_show => $val) {
                    $cscat = $category_class->get(array('id' => $s_show, 'lang' => $_SESSION['lang']));
                    ?>
                    <div class="col-sm-12 col-xs-6  text-left">
                        <?= hotelicon_print($cscat['datas'][0]['class'], 30, 'fekete', $cscat['datas'][0]['nev']) ?>
                        <b><?= $cscat['datas'][0]['nev']; ?></b>
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
            <a href="<?php echo $homeurl . $separator . "rooms/request/" . ($adat["id"]) . '/csomag/' . $TextClass->to_link($adat["title"]); ?>"
               class="btn btn-creme col-xs-12"><?= lan('megrendelem'); ?></a>
            <span class="btn btn-creme-inv col-xs-12"><?= lan('kosarba'); ?></span>
        </div>
        <div class="clearfix "></div>

    </div>
    <div class="clear"></div>
<?php //szobák listája?>
    <div>
        <?= $adat["longtext"]; ?>
    </div>
    <div class="clear"></div>
    <?php if ($adat['rooms']) { ?>
        <table class="priecetable">
            <tr>
                <th colspan="3"><?= hotelicon_print('SZALLAS', 30, 'greyishbeige', lan("szobatipus")) ?></th>
                <th><?= hotelicon_print('SZOBA-MERETE', 30, 'greyishbeige', lan("meret")) ?></th>
                <th><?= hotelicon_print('EGY-FO', 30, 'greyishbeige', lan("priece1person")) ?></th>
                <th><?= hotelicon_print('KET-FO', 30, 'greyishbeige', lan("priece2person")) ?></th>
            </tr>
            <?php foreach ($adat['rooms'] as $room) { ?>
                <tr>
                    <td><?= $room['title'] ?></td>
                    <td>
                        <?php //arraylist($room);?>
                        <?php if ($room['datas']["roomtip"] == 1){ ?>
                        <?= hotelicon_print('KETAGYAS', 30, 'fekete', lan('duplaagy')) ?>
                    <td><?= lan('duplaagy') ?></td>
                    <?php } ?>
                    <?php if ($room['datas']["roomtip"] == 2) { ?>
                        <?= hotelicon_print('FRANCIAAGY', 30, 'fekete', lan('franciaagy')) ?>
                        <td><?= lan('franciaagy') ?></td>
                    <?php } ?>
                    <?php if ($room['datas']["roomtip"] == 3) { ?>
                        <?= hotelicon_print('KIRALYI-AGY', 30, 'fekete', lan('lakosztaly')) ?>
                        <td><?= lan('lakosztaly') ?></td>
                    <?php } ?>
                    </td>
                    <td><?= $room['datas']["roomsize"]; ?></td>
                    <td><?= $room['priece1'] ?> <?= $artipus[$room['tip']] ?></td>
                    <td><?= $room['priece2'] ?> <?= $artipus[$room['tip']] ?></td>
                    <?php ?>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

    <?php //gyerekkedvezmény listája?>
<h2 class="togglestuff" id="togglestuff"><?= lan('gyerekkedvezmeny') ?></h2>
    <table class="priecetable animhide" id="togglestufftogle">
            <?php foreach ($gyerekkedvezmenyek as $name => $value){
            if ($value['val'] > 0){
            ?>
        <tr>
            <td class="col-sm-6">
                <?= lan($name) ?>
            </td>
            <td class="col-sm-6">
                <?= $value['val'] ?>
                <?= $kedvezmenytipus[$value['tip']] ?>
            </td>
        </tr>
        <?php }
        } ?>
    </table>
    <?php //előfogalásikedvezmény
    if ($elofoglalasikedvezmeny){
    ?>
<h2 class="togglestuff" id="elofoglalas"><?= lan('elofoglalasikedvezmeny') ?></h2>
    <table class="priecetable animhide" id="elofoglalastogle">
            <?php foreach ($elofoglalasikedvezmeny as $value){
            ?>
        <tr>
            <td class="col-sm-6">
                <?= str_replace('XNAP',$value['nap'],lan('xnap')) ?>
            </td>
            <td class="col-sm-6">
                <?= $value['szazalek'] ?>%
            </td>
        </tr>
        <?php
        } ?>
    </table>
    <?php
    } ?>

    <?php
    //arraylist($adat["services"]["csomaghozfizetos"]);
    //fizetős szolgáltatások

    //arraylist($qrootcat);
    if ($adat["services"]["csomaghozfizetos"]) {
        ?>
        <h2 class="togglestuff" id="priecestuff"><?= lan('felarasszolgaltatasok') ?></h2>

        <table class="priecetable animhide" id="priecestufftogle">
            <?php
            foreach ($adat["services"]["csomaghozfizetos"] as $rcat=>$value) {
                $filtersextcat['id'] = $rcat;
                $filtersextcat["lang"] = $_SESSION["lang"];
                $filtersextcat["status"] = 2;
                $qrootcat = $category_class->get($filtersextcat, '', $_GET["page"]);
                $rcatv=$qrootcat["datas"][0];
               // arraylist($qrootcat);
                ?>
                <tr class="<?= $rcatv['id'] ?>">
                    <td><?= hotelicon_print($rcatv['class'], 50, 'fekete', $rcatv['nev']) ?></td>
                    <td><b><?= $rcatv['nev'] ?></b></td>
                    <td><?= $rcatv['leiras'] ?> </td>
                    <td><?= $rcatv['ar'] ?> FT <?php if ( $catartipus[$rcatv['artipus']]) echo '/'; ?> <?= $catartipus[$rcatv['artipus']] ?></td>
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
