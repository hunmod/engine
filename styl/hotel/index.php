<?php include_once("./items/headelemets.php"); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link id="page_favicon" href="<?php echo $homeurl . $stylefolder; ?>icons/favicon.ico" rel="icon" type="image/x-icon"/>
<link href="<?php echo $server_url; ?>scripts/jquery.modalbox-1.5.0/css/jquery.modalbox.min.css" rel="stylesheet">
<link href="<?php echo $homeurl . $stylefolder; ?>css/font-awesome.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- HEADER -->
<header class="container-fluid">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $homeurl; ?>"><?php echo $oldalneve; ?></a>


                    <div class="c_head">
					        <span id="opentimesector" class="idopontgomb"><?= lan('idopont') ?></span>

                        <ul>
                            <li>
                                <?= hotelicon_print("TELEFON", 10, 'greyishbeige'); ?><a
                                    href="tel:<?= page_settings("c_telefon"); ?>"><?= page_settings("c_telefon"); ?></a>
                            </li>
                            <li>
                                <?= hotelicon_print("EMAIL", 10, 'greyishbeige'); ?><a
                                    href="mailto:<?= page_settings("c_email"); ?>"><?= page_settings("c_email"); ?></a>
                            </li>
                            <?php if ($auser["id"] < 1) { ?>
                                <li><a href="javascript:reg();"><span><?php echo $lan["reg"]; ?></span></a></li>
                                <li><a href="javascript:login();"><span><?php echo $lan["login"]; ?></span></a></li>

                            <?php } else { ?>
                                <li class="sub-menu"><a
                                        href="<?php echo $homeurl . '/' . $separator; ?>user/profil"><span><?php echo $lan["profil"]; ?></span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo $homeurl . '/' . $separator; ?>user/logout"><?php echo $lan["logout"]; ?></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <li>
                                <!--form method="get" action="/search/list">
                                    <input type="search" name="s" placeholder="keresés">
                                    <input type="submit" style="display:none;">
                                </form-->
                            </li>
                            <li>
                                <lang class="text-right">
                                    <div class="text-right langsel" style="display:inline-block">
                                        <a <?php if ($_SESSION["lang"] == 'en') echo 'class="active"'; ?>
                                            href="?lang=en">EN</a>
                                        <a <?php if ($_SESSION["lang"] == 'hu') echo 'class="active"'; ?>
                                            href="?lang=hu">HU</a>
                                    </div>


                                </lang>
                            </li>
                        </ul>
                    </div>


                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <?php include('menu.php'); ?>

                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div>
</header>
<div class="maincontainer">
    <?php include('items/start/web/timerange.php'); ?>

    <?php
    // arraylist($adminmenu);
    if (file_exists($file['web'])) {
        include_once($file['web']);
    }
    ?>
</div>
<div class="container-fluid">
    <div class="maincontainer footads" style="text-align:center;">
        <?php
        $widgetsfootb[] = "items/ads/web/widget_side2.php";
        foreach ($widgetsfootb as $widget) if (file_exists($widget)) include($widget); ?>
    </div>
</div>
<footer class="container-fluid" id="footer">
    <div class="container text-center">
        <h3><?= lan('miértfoglaljonnalunk'); ?></h3>

        <div class="col-sm-4">
            <span class="icon50  FIZ-IGAZOLAS fekete" title="Fizetési igazolás"></span>
            <br>
            <?= lan('FIZ-IGAZOLAS'); ?>
        </div>
        <div class="col-sm-4">
            <span class="icon50  BIZTONSAG fekete" title="Biztonság"></span>
            <br>
            <?= lan('BIZTONSAG'); ?>
        </div>
        <div class="col-sm-4">
            <span class="icon50  ARGARANCIA fekete" title="ARGARANCIA"></span>
            <br>
            <?= lan('ARGARANCIA'); ?>
        </div>
    </div>
    <hr>
    <div class="container">
        <h2><?= page_settings('footerblock1_' . $_SESSION["lang"]) ?></h2>

        <div class="col-sm-4 match-height matchHeight"><?= page_settings('footerblock2_' . $_SESSION["lang"]) ?></div>
        <div class="col-sm-4 match-height matchHeight"><?= page_settings('footerblock3_' . $_SESSION["lang"]) ?></div>
        <div class="col-sm-4 text-center match-height matchHeight">
            <style>
                #meteoprog-informer {
                    margin: auto;
                }
            </style>
            <div id='meteoprog-informer' style='width:152px; height:30px;'><a
                    href='http://www.meteoprog.hu/hu/weather/Hajduszoboszlo/'>Hajdúszoboszló</a></div>
            <script>
                url = 'http://www.meteoprog.hu/hu/informers/weather-now.html?cities%5B%5D=Hajduszoboszlo&background=ffffff&textcolor=000000&linkcolor=2b85ca&width=100&avatar=0';
                key1 = 'c6c13d3919561bcef8e79a858424d3274a4e1546';
                key2 = '5a90e9c7e514fd94648dd6c829a165cd939d1675';
                var script = document.createElement('script');
                script.src = 'http://www.meteoprog.hu/js/new_design/weather-informer.js';
                document.body.appendChild(script);
            </script>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4 match-height matchHeight"><?= page_settings('footerblock4_' . $_SESSION["lang"]) ?></div>
        <div class="col-sm-4 match-height matchHeight"><?= page_settings('footerblock4_' . $_SESSION["lang"]) ?></div>
        <div class="col-sm-4 match-height matchHeight"><?= page_settings('footerblock4_' . $_SESSION["lang"]) ?></div>

    </div>
</footer>
<?php include_once("./items/footerscripts.php"); ?>
<div class="modal fade" id="hiddenbox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-400">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="$('#hiddenbox').modal('hide');"></button>
            <div class="modal-head"></div>
            <div id="hiddencontent" class="modal-body"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-400">
        <div class="modal-content">
            <span type="button" onclick="$('#error').modal('hide');" class="close" data-dismiss="error"
                  aria-label="Close"></span><!-- Sanyi - bekerült a close button-->
            <?php if ($_SESSION["messageerror"] != '') {
                echo '<div class="modal-head">Error</div>';

                echo '<div class="modal-body">' . $_SESSION["messageerror"] . '</div>';
            } ?>

            <?php if ($_SESSION["messageok"] != '') {
                echo ' <div class="modal-head"></div>';
                echo '<div class="modal-body">' . $_SESSION["messageok"] . '</div>';
            } ?>

        </div>
    </div>
</div>
<?php if (($_SESSION["messageok"] != '' || $_SESSION["messageerror"] != '') && $noerrorep != 1) {
    $_SESSION["messageerror"] = '';
    $_SESSION["messageok"] = '';
    ?>
    <script>
        $('#error').modal('show');
    </script>
<?php } //arraylist($_SESSION);	
//echo $noerrorep;			
?>
<?php if (count($_SESSION["regeerror"])) { ?>
    <script>
        reg();
    </script>
<?php } ?>


</body>
</html>