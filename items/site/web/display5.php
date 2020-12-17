<article itemprop="article"   itemscope="" itemtype="http://schema.org/WebPage">
    <div class="ParallaxImage" style="background-image: url(<?php echo $nimg=$SiteClass->getimg($elem['id'],1100,850);?>)">
    <div class="container">
        <h3 itemprop="name" ><?php echo $Text_Class->htmlfromchars($elem["title"]);?></h3>
    </div>
</div>

<div class="ParallaxContent">
    <div class="container">
        <div class="headlines">
            <div class="col-sm-12 sitedectription" itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leadtext"])));?></div>
        </div>
        <description class="col-sm-12" itemprop="description">
            <?php echo "" . $Text_Class->keywordstaged($Text_Class->youtoubecserel($Text_Class->htmlfromchars($elem["longtext"])),$metakey_words); ?>
        </description>
    </div>
</div>
</article>


