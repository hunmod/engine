<style>
    .mhbl2 {
        height: 420px;
    }

    .mhbl2 h2 {
        font-size: 23px;
    }
</style>
<script>

</script>
<div class="container events">
    <div class="row">
        <locations itemscope="" itemtype="http://schema.org/WebPage">
            <h1>
                <?php //echo $menu["nev"];
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

            <div class="col-xs-12">
                <div id="map" style="height: 300px;"></div>
            </div>
            <script src="https://maps.googleapis.com/maps/api/js?key=<?= $google_api_key; ?>&callback=initMap" async
                    defer>
            </script>
            <?php
            //arraylist($hirekelemek);
            if (count($hirekelemek) > 0) {
                $che = $stn = 1;
                $counter = 0;
                $numh = count($hirekelemek);
                foreach ($hirekelemek as $elem) {
                    $elem["url"] = $PlacesClass->createurl($elem);
                    $scriptadd .= "makemarker('" . $elem['lati'] . "','" . $elem['longi'] . "','" . $elem['title'] . "');";
                    include('items/locations/web/display3.php');

                }
            }
            //include('hir_display_short_first.php');

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
        </locations>
    </div>

</div>
<script>
    $(document).ready(function () {
        <?php echo $scriptadd;?>
    });
</script>

<div class="clear"></div>
