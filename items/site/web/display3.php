<div class="animst1" itemprop="article">
    <div class="bg clear">
        <img itemprop="image" class="clear" src="<?php echo $nimg=$SiteClass->getimg($elem['id'],900,300);?>" alt="<?php echo $elem["title"];?>">
        <div class="bgcenterlayer">
        </div>
        <div class="bgcenterlayer1">
        </div>
    </div>

    <div class="contentlayer">
        <h2 itemprop="name" ><a  href="<?php echo $TextClass->levag($SiteClass->createurl($elem),100);/*$elem["url"];*/?>" itemprop="url"><?php echo $Text_Class->htmlfromchars($elem["title"]);?></a></h2>
        <div class="col-sm-12 sitedectription" itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leadtext"])));?></div>
        <div class="text-center">
            <a  href="<?php echo $TextClass->levag($SiteClass->createurl($elem),100);/*$elem["url"];*/?>" itemprop="url" class="btn btn-creme-inv col-sm-4 nofloat">></a>
        </div>
    </div>
</div>