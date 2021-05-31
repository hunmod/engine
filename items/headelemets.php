<!DOCTYPE html>
<html lang="<?= lang ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-control" content="public,max-age=86400">
    <meta http-equiv="Content-language" content="<?= lang ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1c69ca"/>

    <title><?php echo $pagetitle; ?></title>
    <link rel="canonical" href="<?= homeurl . '/' . $MenuClass->shorturl_get($_GET['q']); ?>"/>
    <link rel="metalink" type="application/metalink+xml" href="<?= homeurl; ?>/rssfeed.php?<?= $_SERVER["QUERY_STRING"]; ?>"/>
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?= homeurl; ?>/rssfeed.php?<?= $_SERVER["QUERY_STRING"]; ?>"/>
    <link href="<?= homeurl; ?>/scripts/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" as="style">
    <link rel="stylesheet" as="stylesheet" type="text/css" href="<?= homeurl; ?><?= $makemin->css($stylefolder . 'style.css', $stylefolder . 'style.min.css') ?>"/>

    <?php if ($page_keywords != "") { ?>
        <meta name="keywords" content="<?= $Text_Class->tageketcsupaszit($page_keywords); ?>"/>
    <?php } ?>
    <?php if ($page_description != "") {
        $pgerite = substr($Text_Class->tageketcsupaszit($page_description), 0, 180);
        ?>
    <?php } else{
        $pgerite= page_settings("description_hu");
    } ?>
    <meta name="og:title" content="<?php echo $pagetitle; ?>"/>
    <meta name="description" content="<?php echo $pgerite; ?>"/>
    <meta property="og:description" content="<?php echo $pgerite; ?>"/>
    <meta name="twitter:description" content="<?php echo $pgerite; ?>"/>

    <?php if ($page_ogimage == "") { ?>
        <?php
        $page_ogimage=homeurl."/picture2.php?picture=".encode( "styl/" . page_settings("site_css") . '/img/og.jpg' )."&x=1500"."&y=1000&ext=.jpg" ;


       //$page_ogimage = homeurl . '' . $stylefolder . 'img/og.jpg';
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
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo homeurl . $_SERVER["REQUEST_URI"]; ?>"/>
    <meta name="rating" content="General"/>
    <?php if(page_settings('indexfollow')=='2'){ ?>
    <meta name="robots" content="index,follow"/>
    <meta name="GOOGLEBOT" content="INDEX, FOLLOW">
    <?php } else { ?>
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="GOOGLEBOT" content="NOINDEX, NOFOLLOW">
    <?php } ?>
    <meta name="revisit-AFTER" content="1 Days"/>
    <meta name="twitter:site" content="<?php echo $oldalneve; ?>">
    <meta name="twitter:creator" content="@Hunmod">
    <meta name="twitter:title" content="<?php echo $pagetitle; ?> <?php echo $oldalneve; ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" as="stylesheet"  href=""/-->

    <link rel="stylesheet" href="<?php echo $homeurl; ?><?php echo $makemin->css('/scripts/animate.css', '/scripts/animate.min.css') ?>"/>
    <script src="<?= $homeurl.('/scripts/viewportchecker.js') ?>" /></script>
    <!-- script src="<?php echo $server_url; ?>scripts/jquery-ui.min.js"></script -->
    <script src="<?php echo $homeurl; ?>/scripts/jquery.matchHeight-min.js"></script>
    <!--script src="<?php echo $homeurl; ?>/scripts/jquery.maskedinput.js"></script>
    <script src="<?php echo $homeurl; ?>/scripts/viewportchecker.js"></script-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!--script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "9c5b677a-e047-4b90-9467-d50508836784",
    });
  });
</script-->

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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $analitics_id ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?= $analitics_id ?>');
</script>



        <!--script>
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
        </script-->
    <?php }
    // Google analitics (konfig DB-ből olvassa)
    ?>

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
