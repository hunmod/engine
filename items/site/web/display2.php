<article itemprop="article"   itemscope="" itemtype="http://schema.org/WebPage" class="col-xs-12 oneurl">
    <img itemprop="image" class="img-100" src="<?php echo $nimg=$SiteClass->getimg($elem['id'],1000,320);?>" alt="<?php echo $elem["title"];?>">      
		<div class="text">
			<h3 itemprop="name" ><?php echo $Text_Class->htmlfromchars($elem["title"]);?></h3>
			<div class="col-sm-12 sitedectription" itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leadtext"])));?></div>
			<a  href="<?php echo $SiteClass->createurl($elem);/*$elem["url"];*/?>" itemprop="url" class="btn btn-creme-inv col-sm-4"><?= lan('tovabb');?></a>
		</div>
  </article>