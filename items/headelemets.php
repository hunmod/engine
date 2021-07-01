<!DOCTYPE html>
<html lang="<?= lang ?>">
<head>
    <title><?= $pagetitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-control" content="public,max-age=86400">
    <meta http-equiv="Content-language" content="<?= lang ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1c69ca"/>

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
    <meta property="og:type" content="website"/>

    <?php if ($page_ogimage == "") { ?>
        <?php
        $page_ogimage=homeurl."/picture2.php?picture=".encode( "styl/" . page_settings("site_css") . '/img/og.jpg' )."&x=1500"."&y=1000&ext=.jpg" ;


       //$page_ogimage = homeurl . '' . $stylefolder . 'img/og.jpg';
    } ?>
    <meta property="og:image" content="<?php echo $page_ogimage."&x=1500"."&y=1000&ext=.jpg"; ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image" content="<?php echo $page_ogimage; ?>"/>
    <?php if ($fb_page_id != "") { ?>
        <meta name="fb:page-id" content="<?php echo $fb_page_id; ?>"/>
    <?php } ?>
    <?php if ($page_ogimage != "") { ?>
    <meta property="og:image" content="<?php echo $page_ogimage; ?>"/>
    <?php } ?>
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




    <?php
    if (is_file('.'.$file['js'])){?>
        <script src="<?php echo $homeurl.$file['js']; ?>"></script>
    <?php }?>
    <script src="<?php echo $homeurl; ?><?php echo $makemin->js($stylefolder33 . '/scripts/hn.js', $stylefolder33 . '/scripts/hn.min.js', false) ?>"></script>

    <?php if($fb_ap_id){
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
