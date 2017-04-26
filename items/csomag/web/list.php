<style>
    .mhbl2 {
        height: 420px;
    }

    .mhbl2 h2 {
        font-size: 23px;
    }
    .connectedservices {
        float: left;
        display: block;
        width: 100%;
    }
</style>

<?php

?>

<div class="container roomlist csomaglist">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl;?>"><?=lan('home');?></a> >
        <a href="<?php echo $homeurl.'/'.$separator.shorturl_get("m/1");?>"> <?=lan('csomaglista');?></a> >
        <span><?php echo "". ($Text_Class->htmlfromchars($aprodata["cim"]));?></span>
    </div>


    <div class="row">
        <news itemscope="" itemtype="http://schema.org/WebPage">
            <div class="text-center">
                <h3><?= lan('csomagok'); ?></h3>
            </div>
            <h1>
                <?php echo $menu["nev"];
                $c = 1;
                if (count($menufelette)) foreach (array_reverse($menufelette) as $mef) {

                    if ($c != 1) {
                        $xclass = 'class="zold"';
                    } else {
                        $xclass = '';
                    }
                    if ($c < count($menufelette)) {
                        $xper = ' / ';
                    } else {
                        $xper = '';
                    }
                    $c++;
                    if ($c > 2) {
                        ?>
                        <span <?php echo $xclass; ?>><?php echo $mef["nev"]; ?></span><?php echo $xper; ?>
                        <?php
                    }
                }
                ?>
            </h1>
            <div>
            <?php
            if ($auser["jog"] > 2) {
                ?>
                <a href="<?php echo $homeurl . $separator . $getparams[0]; ?>/edittext"><?= lan('ujcsomag')?></a>
            <?php } ?>
            </div>
            <div class="col-xs-12 text-center filtericons">
                <?php
                $filtersextcat="csomagkategoria";
                $filterssubcat["lang"]=$filtersrootcat["lang"]=$_SESSION["lang"];
                $filterssubcat["kat"]=$filtersextcat;
                $qsubroot=$category_class->get($filterssubcat,'',$_GET["page"]) ;
                if ($qsubroot['datas'])
                    foreach ($qsubroot['datas'] as $scat){
                        $aactive='';
                        $acolor='greyishbeige';
                        if ($_GET['cn']==$scat['id']){
                            $aactive='active';
                            $acolor='feher';

                        }
                        $caption=hotelicon_print($scat['class'], 50, $acolor,$scat['nev']);


                        ?>
                        <a href="<?= $myparams1 ?>cn=<?= $scat['id']?>" class="<?= $aactive; ?>"><?= $caption ?></a>
                    <?php } ?>

            </div>
<div class="clearfix"></div>
            <?php
            //arraylist($hirekelemek);
            if (count($hirekelemek) > 0) {
                $che = $stn = 1;
                $counter = 0;
                $numh = count($hirekelemek);
                foreach ($hirekelemek as $elem) {

                    //lang text
                    /*$filtersh["id"] = $elem['id'];
                    $elemhuid = $CsomagClass->get_text('hu', $filtersh);
                    $elem['hu'] = $elemhuid['datas'][0];*/
                    $elem['url'] = $CsomagClass->createurl($elem);;
                    // arraylist($elemhuid);
?>

                    <div class="col-xs-12 col-sm-6 col-md-4">
      <?php              include('csomag_display2.php');?>
                    </div>
 <?php

                }
            }
            ?>
            <?php if ($oldalakszama > 1) {
//oldalazó	?>

                <nav class="text-center">
                    <ul class="pagination">
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . $separator2 . "page=0"; ?>"
                               aria-label="First">
                                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . $separator2 . "page=" . ($oldal - 1); ?>"
                               aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                            </a>
                        </li>
                        <?php
                        for ($c = 0; $c <= $oldalakszama - 1; $c++) {
                            ?>
                            <li><a
                                href="<?php echo $separator . $_GET["q"] . $separator2 . "page=" . $c; ?>"><?php echo $c + 1; ?></a>
                            </li>
                        <?php }
                        ?>
                        <!--li class="active"><a href="#">2</a></li-->
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . $separator2 . "page=" . ($oldal + 1); ?>"
                               aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . "&page=" . ($oldalakszama - 1); ?>"
                               aria-label="Last">
                                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php
//oldalazó
            } ?>
        </news>
    </div>

</div>
<script type="text/javascript">
    function gomemove(){
        scrollanimate('article','fadeIn');
    }
    jQuery(document).ready(function() {
        $(window).on('scroll resize', gomemove);
        $(window).trigger('scroll');
        $('.matchHeight').matchHeight();

    });
</script>

