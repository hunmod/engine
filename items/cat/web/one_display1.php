<article class="kategoriaelem">
    <?php //arraylist( $elem); ?>
    <div>
        <div class="icon">
            <?= hotelicon_print($elem['class'], 50, 'fekete') ?>
        </div>
        <div class="cim">
            <h3><?php echo $Text_Class->htmlfromchars($elem["nev"]);?> </h3>
        </div>
        <div class="clearfix"></div>
        <img class="img-responsive" src="<?=homeurl?><?= $category_class->getimg($elem['id'],320,400)?>" alt="<?php echo $Text_Class->htmlfromchars($elem["nev"]);?>">
        <div class="clearfix"></div>
    </div>
    <?php if ($elem["ar"]>0){?>
    <div class="ar"><?php echo $Text_Class->htmlfromchars($elem["ar"]);?> FT / FŐ</div>
    <?php }?>
    <a href="<?= $category_class->createurl($elem)?>" class="btn btn-creme "><?= lan('reszletek');?></a>
</article>