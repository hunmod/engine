<?php



//arraylist($adat);
?>
<style>

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


<div class="container site">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl;?>"><?=lan('home');?></a> >
        <a href="<?php echo $homeurl.''.$separator.shorturl_get("site/list/");?>"> <?=lan('sitelist');?></a> >
        <span><?php echo "". ($adat["title"]);?></span>
    </div>
    <div class="bottomspace">
        <h1 class="text-center"><?= $adat["title"]; ?></h1>
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
                <li data-thumb="<?= $SiteClass->getimg($adat['id'], 70, 39); ?>"
                    data-src="<?= $SiteClass->getimg($adat['id'], 70, 39); ?>">
                    <img src="<?= $SiteClass->getimg($adat['id'], 600, 300); ?>"/>
                </li>
                <?php foreach ($mylist as $onepic) { ?>
                    <li data-thumb="<?= $homeurl . $onepic["url"] ?>" data-src="<?= $homeurl . $onepic["screen"] ?>">
                        <img src="<?= $homeurl . $onepic["screen"] ?>"/>
                    </li>
                <?php } ?>
            </ul>
            <!--img class="img-responsive" src="<?= $nimg; ?>" alt="<?= $adat["title"]; ?>"-->
        </div>
        <div class="col-xs-5 match-height matchHeight">
            <div>
                <?= $adat["leadtext"]; ?>
            </div>
        </div>
		<?php if ($auser["jog"]>3){?>
			<a itemprop="url" class="btn btn-creme-inv" href="<?php echo $homeurl.$separator."site/edittext/".encode($elem["id"]);;?>"><?php echo lan("edit");?></a>
		<?php }?>
        <div class="clearfix "></div>
    </div>

    <div>
        <?= $adat["longtext"]; ?>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.match-height').matchHeight();
    });
</script>