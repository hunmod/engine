<?php



//arraylist($adat);
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
            <div id="breadCrumb">
            <a href="<?php echo $homeurl;?>"><?=lan('home');?></a> >
            <a href="<?php echo $homeurl.''.$separator.shorturl_get("rooms/list/");?>"> <?=lan('szobalista');?></a> >
            <span><?php echo "". ($adat["title"]);?></span>
            </div>
            <div class="bottomspace">
            <h1 class="text-center"><?= $adat["title"]; ?></h1>

        <div class="text-center">
            <h3><?= lan('mindenszobahoztartozik'); ?></h3>
        </div>
                <div class="bottomspace mindenhezhead">
                    <?php
                    $filterssubcat["lang"]=$filtersrootcat["lang"]=$_SESSION["lang"];
                    $filtersrootcat["kat"]="mindenszobahoztartoz";
                    $filtersrootcat["status"]="2";
                    $qrootcat=$category_class->get($filtersrootcat,'','all') ;
                    if ($qrootcat['datas'])
                        foreach ($qrootcat['datas'] as $rcat){
                            ?>
                            <div class="mindeheztartozik">
                                <?= $caption=hotelicon_print($rcat['class'], 50, 'fekete',$rcat['nev']);?><br>
                                <?= $rcat['nev'] ?>
                            </div>
                        <?php }?>
                </div>





    </div>
    <div class="bottomspace">
        <div class="col-sm-7 match-height matchHeight">
            <?php
            $id = ($getparams[2]);
            $menu = $MenuClass->get_one_menu($id);
            $mappa = 'uploads/' . $folders["uploads"] . "/" . $getparams[0] . "/" . $id . '/';
            $mylist = $Upload_Class->folderlist($mappa, 150, 87,600);
            //arraylist($mylist);
            ?>

            <ul id="lightSlider">
                <li data-thumb="<?= $RoomsClass->getimg($adat['id'], 150, 87); ?>"
                    data-src="<?= $RoomsClass->getimg($adat['id'], 150, 87); ?>">
                    <img src="<?= $RoomsClass->getimg($adat['id'], 600, 300); ?>"/>
                </li>
                <?php foreach ($mylist as $onepic) { ?>

                    <li data-thumb="<?= $homeurl . $onepic["screen"] ?>" data-src="<?= $homeurl . $onepic["url"] ?>">
                        <img src="<?= $homeurl . $onepic["url"] ?>"/>
                    </li>
                <?php } ?>
            </ul>


            <!--img class="img-responsive" src="<?= $nimg; ?>" alt="<?= $adat["title"]; ?>"-->
        </div>
        <div class="col-sm-5 match-height matchHeight">
            <div>
                <?= $adat["title"]; ?>
            </div>
            <div class="connectedservices">
                <div class="col-sm-12 col-xs-6">
                    <?= hotelicon_print('KET-FO', 30, 'fekete') ?>
<?php if($adat['childbad']>1){?>
   <span style="float: left;">+</span>
                    <?= hotelicon_print('PELENKAZO', 30, 'fekete') ?>
<?php }?>
                    <b>

                        <?php if($adat['childbad']>=1){?>
                  <?= lan('max2felnott') ?> + <?= $adat['childbad'];?> <?= lan('bebi') ?>
                    <?php }
                    else
                      if ($adat["osszenyithato"]>=1){?>
                          <?= lan('max2felnott') ?>  + 2 <?= lan('gyerek') ?>
                          <?php }
                    else { ?>
                        <?= lan('max2fo') ?>
                    <?php }?>
                   </b>
                    <br>
                </div>
                <div class="col-sm-12 col-xs-6">
                    <?= hotelicon_print('SZOBA-MERETE', 30, 'fekete') ?> <b><?= $adat["roomsize"]; ?> M2</b>  <br>
                </div>

                <div class="col-sm-12 col-xs-6">
                   <?php if ($adat["roomtip"]==1){?>
                       <?= hotelicon_print('KETAGYAS', 30, 'fekete') ?> <b><?= lan('duplaagy') ?></b>  <br>
                   <?php }?>
                   <?php if ($adat["roomtip"]==2){?>
                       <?= hotelicon_print('FRANCIAAGY', 30, 'fekete') ?> <b><?= lan('franciaagy') ?></b>  <br>
                   <?php }?>
                    <?php if ($adat["roomtip"]==3){?>
                       <?= hotelicon_print('KIRALYI-AGY', 30, 'fekete') ?> <b><?= lan('franciaagy') ?></b>  <br>
                   <?php }?>
                </div>
                <div class="col-sm-12 col-xs-6">
                    <?= hotelicon_print('LEMONDAS', 30, 'fekete') ?> <b><?= lan("potagynincs"); ?> </b>  <br>
                </div>
                <?php if ($adat["roomnum"]==1){?>
                    <div class="col-sm-12">
                        <?= hotelicon_print('kulonNAPPALI', 30, 'fekete') ?> <b><?= lan('kulonNAPPALI');?></b>  <br>
                    </div>
                    <?php
                }
                ?>

                <?php if($adat['childbad']>=1){?>
                <div class="col-sm-12">
                    <?= hotelicon_print('PELENKAZO', 30, 'fekete') ?> <b><?= lan('kisagyxtra') ?></b>
                </div>
                <?php }?>

                <?php if($adat['erkely']>=1){?>
                <div class="col-sm-12">
                    <?= hotelicon_print('ERKELY', 30, 'fekete') ?> <b><?= lan('erkely') ?></b>
                </div>
                <?php }?>

                <div class="clearfix"></div>
                <div class="szobaar">
                    <?= lan('artolelott') ?><b><?= $adat["priece"]; ?> Ft</b>/<?= $tipusok[$adat["tip"]]; ?><?= lan('artolmogott') ?><br>
                    <?= lan('artolutan') ?>
                </div>
            </div>
            <a href="<?php echo $homeurl.$separator."rooms/request/".($adat["id"]).'/room/'.$TextClass->to_link($adat["title"]);?>" class="btn btn-creme col-xs-12"><?= lan('megrendelem'); ?></a>
            <span class="btn btn-creme-inv col-xs-12" onclick="roomkosarba('room','<?= $adat["id"]?>');"><?= lan('kosarba'); ?></span>
        </div>
        <div class="clearfix "></div>

    </div>
    <div>
        <?= $adat["longtext"]; ?>
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
                            $filterscim['lang']=$_SESSION['lang'];
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
        <?= $adat["included"]; ?>
    </div>
</div>
