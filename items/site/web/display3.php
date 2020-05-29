<div class="animst1" itemprop="article">
    <div class="bg clear">
        <img itemprop="image" class="clear" src="<?php echo $nimg=$SiteClass->getimg($elem['id'],800,260);?>" alt="<?php echo $elem["title"];?>">
        <div class="bgcenterlayer">
        </div>
        <div class="bgcenterlayer1">
        </div>
    </div>

    <div class="contentlayer">
        <h2 itemprop="name" ><a  href="<?php echo $TextClass->levag($SiteClass->createurl($elem),100);/*$elem["url"];*/?>" itemprop="url"><?php echo $Text_Class->htmlfromchars($elem["title"]);?></a></h2>
        <div class="col-sm-12 sitedectription" itemprop="description"><a  href="<?php echo $TextClass->levag($SiteClass->createurl($elem),100);?>" itemprop="url"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leadtext"])));?></a></div>
    </div>
</div>