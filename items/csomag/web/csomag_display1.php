<?php
$nimg = $CsomagClass->getimg($elem['id'], 800, 600);
?>
<article class="csomag">
    <div>
        <div class="icon">
            <?= hotelicon_print($elem['icon'], 50, 'feher') ?>
        </div>
        <div class="imgframe">
            <img class="img-responsive" src="<?= $nimg ?>" alt="<?= $elem['title']?>">
            <div class="clearfix"></div>

            <div class="leiraslong">
                <?= $elem['leadtext']?>
            </div>
        </div>
        <div class="cim">
            <h3><?= $elem['title']?></h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="ar"><?= $elem['priece']?> <?= $artipus[$elem['tip']]?></div>
    <a href="<?php echo $CsomagClass->createurl($elem);/*$elem["url"];*/?>" class="btn btn-creme "><?= lan('reszletek'); ?></a>
</article>