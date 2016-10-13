<article itemprop="article"  class="box horizontal boxWithMoreLink" itemscope="" itemtype="http://schema.org/WebPage">
    <div class="row">
        <div class="col-md-7 col-sm-5">
            <div class="imgWrap">
                <a  href="<?= $category_class->createurl($elem)?>" itemprop="url">
                    <img src="<?=homeurl?><?= $category_class->getimg($elem['id'],400,320)?>" class="img-100" alt="">
                </a>
            </div>
        </div>
        <div class="col-md-5 col-sm-7">
            <a href="<?php echo $elem["url"];?>">
                <name><h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["nev"]);?></h2></name>
            </a>
            <p itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leiras"])));?></p>
        </div>
    </div>
    <a itemprop="url" class="button enterButton moreButton" href="<?= $category_class->createurl($elem)?>"><?php echo $lan["more"];?></a>
    <?php if ($auser["jog"]>2){?>
        <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."cat/edittext/".encode($elem["id"]);;?>"><?php echo $lan["edit"];?></a>
    <?php }?>
</article>