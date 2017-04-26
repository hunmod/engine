<?php include_once("./items/headelemets.php"); ?>

<!-- Bootstrap -->
<link href="<?php echo $homeurl . $stylefolder; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $homeurl . $stylefolder; ?>css/font-awesome.css" rel="stylesheet" type="text/css">
<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
<!-- HEADER -->
<header class="container-fluid">
    <div class="container-fluid">
        <!--div class="container headcontainer">
        </div-->
    </div>
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
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <?php include('menu.php'); ?>
                    <ul class="nav navbar-nav navbar-right">
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
                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div>
</header>
<div class="maincontainer">
    <?php
    // arraylist($adminmenu);
    if (file_exists($file['web'])) {
        include_once($file['web']);
    }
    ?>

</div>
<footer class="container" id="footer">
    <div class="container-fluid">
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

<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=Llnqi1asyr00q9" style="display:none"
               height="1" width="1" alt=""/></noscript>


<?php
//var_dump($auser);

if($auser["jogid"]>=3){?>
    <div class="adminseourl">SEO-URL<br />
        <form action="" method="post">
            <input name="paramsseo" type="hidden" value="<?php echo $shorturledit; ?>"/>
            <?php echo $shorturledit;
            ?><br />
            <input name="getseo" type="text" value="<?php echo $shorturltext; ?>"/>
            <input name="" type="submit" />
        </form>
    </div>
<?php } ?>
</body>
</html>