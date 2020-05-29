<!DOCTYPE html>
<html lang="<?= lang ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="Content-language" content="<?php echo lang ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pagetitle; ?><?php echo $oldalneve; ?></title>
    <link rel="canonical" href="<?php echo $homeurl . '/' . $MenuClass->shorturl_get($_GET['q']); ?>"/>
    <link rel="metalink" type="application/metalink+xml"
          href="<?php echo $homeurl; ?>/rssfeed.php?<?php echo $_SERVER["QUERY_STRING"]; ?>"/>
    <link rel="alternate" type="application/rss+xml" title="RSS"
          href="<?php echo $homeurl; ?>/rssfeed.php?<?php echo $_SERVER["QUERY_STRING"]; ?>"/>
    <link href="<?php echo $homeurl; ?>/scripts/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <!--link rel="stylesheet" type="text/css" href="<?php echo $homeurl; ?><?php echo $makemin->css($stylefolder . 'style.css', $stylefolder . 'style.min.css') ?>"/-->
    <link rel="stylesheet" type="text/css" href="<?php echo $homeurl.$stylefolder . 'style.css'; ?>"/>
    <?php if ($page_keywords != "") { ?>
        <meta name="keywords" content="<?php echo $Text_Class->tageketcsupaszit($page_keywords); ?>"/>
    <?php } ?>
    <?php if ($page_description != "") {
        $pgerite = substr($Text_Class->tageketcsupaszit($page_description), 0, 180);
        ?>
        <meta name="description" content="<?php echo $pgerite; ?>"/>
        <meta property="og:description" content="<?php echo $pgerite; ?>"/>
        <meta name="twitter:description" content="<?php echo $pgerite; ?>"/>
    <?php } ?>
    <?php if ($page_ogimage == "") { ?>
        <?php $page_ogimage = $homeurl . '/' . $stylefolder . 'img/logo.png';
    } ?>
    <meta property="og:image" content="<?php echo $page_ogimage; ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image" content="<?php echo $page_ogimage; ?>"/>
    <?php if ($fb_page_id != "") { ?>
        <meta name="fb:page-id" content="<?php echo $fb_page_id; ?>"/>
    <?php } ?>
    <?php if ($page_ogimage != "") { ?>
        <meta property="og:image" content="<?php echo $page_ogimage; ?>"/>
    <?php } ?>
    <meta property="og:url" content="<?php echo $homeurl . $_SERVER["REQUEST_URI"]; ?>"/>
    <meta name="rating" content="General"/>
    <meta name="robots" content="index,follow"/>
    <meta name="GOOGLEBOT" content="INDEX, FOLLOW">
    <meta name="revisit-AFTER" content="60 Days"/>
    <meta name="twitter:site" content="<?php echo $oldalneve; ?>">
    <meta name="twitter:creator" content="@Hunmod">
    <meta name="twitter:title" content="<?php echo $pagetitle; ?> <?php echo $oldalneve; ?>">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
    <link rel="stylesheet" href="<?php echo $homeurl; ?><?php echo $makemin->css('/scripts/jquery-ui.css', '/scripts/jquery-ui.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo $homeurl; ?><?php echo $makemin->css('/scripts/animate.css', '/scripts/animate.min.css') ?>"/>
    <script src="<?= $homeurl.('/scripts/viewportchecker.js') ?>" /></script>
    <script src="<?php echo $server_url; ?>scripts/jquery-ui.min.js"></script>
    <script src="<?php echo $homeurl; ?>/scripts/jquery.matchHeight-min.js"></script>
    <!--script src="<?php echo $homeurl; ?>/scripts/jquery.maskedinput.js"></script>
    <script src="<?php echo $homeurl; ?>/scripts/viewportchecker.js"></script-->

    <?php
    if (is_file('.'.$file['js'])){?>
        <script src="<?php echo $homeurl.$file['js']; ?>"></script>
    <?php }?>
    <script src="<?php echo $homeurl; ?><?php echo $makemin->js($stylefolder33 . '/scripts/hn.js', $stylefolder33 . '/scripts/hn.min.js', false) ?>"></script>
    <?php if($fb_ap_id){
        //facebook api js
        ?>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '<?= $fb_ap_id?>',
                    xfbml      : true,
                    version    : 'v2.9'
                });
                FB.AppEvents.logPageView();
            };
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                console.log(response);
                if (response.status === 'connected') {
                    testAPI();
                } else {
                    document.getElementById('status').innerHTML = 'Please log ' +
                        'into this app.';
                }
            }

            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '<?= $fb_ap_id?>',
                    cookie     : true,  // enable cookies to allow the server to access
                                        // the session
                    xfbml      : true,  // parse social plugins on this page
                    version    : 'v2.8' // use graph api version 2.8
                });
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });

            };

            // Load the SDK asynchronously
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function testAPI() {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {

//                    console.log(document.cookie);
 //                   console.log(response);
                    document.cookie= 'fbuserid='+response.id;
                });
            }

        </script>



     <?php
    }
    ?>
    <?php
    // Google analitics (konfig DB-ből olvassa)
    if (isset($analitics_id) && $analitics_id != "") {
        ?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', '<?php echo $analitics_id;?>', '<?php echo $_SERVER["HTTP_HOST"];?>');
            ga('require', 'linkid', 'linkid.js');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
        </script>
    <?php }
    // Google analitics (konfig DB-ből olvassa)
    ?>
    <script type="text/javascript"><!--
        // sets two variables to store the X and Y position
        var homeurl = '<?= $homeurl;?>';
        var xpos;
        var ypos;
        function click_sendfile() {
            $('#wrkstat').html('Töltök');
            $(save).click();
        }
        $(document).ready(function () {
            $('#droppedimg').draggable(
                {
                    cursor: 'pointer',      // sets the cursor apperance
                    opacity: 0.35,          // opacity fo the element while it's dragged
                    stack: $('#droppedimg'),       // brings the '#dg2' item to front
                    axis: 'y'               // allow dragging only on the horizontal axis
                });

            // sets draggable the element with id="dg"
            $('#droppedimg').draggable(
                {
                    stop: function (event, ui) {
                        // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
                        var xmove = ui.position.left;
                        var ymove = ui.position.top;

                        alert('LEFT:' + xmove + ' pixels \n "top:"' + ymove + ' pixels');
                    }
                });
        });
        --></script>
<?php
if (count($extrascript) >= 1) {

    foreach ($extrascript as $xtra) {
        echo $xtra;
    }
}
if (is_file($file['js'])) {
    $ejs = $makemin->js($file['js'], str_replace('.js', '.min.js', $file['js']), false);
    echo '<script src="' . $server_url . $ejs . '" type="text/javascript"></script>';
}
?>
