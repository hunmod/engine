<article itemprop="article"   itemscope="" itemtype="http://schema.org/WebPage" class="col-xs-12 oneurl article">
    <a  href="<?php echo $TextClass->levag($SiteClass->createurl($elem),100);/*$elem["url"];*/?>"><img itemprop="image" class="img-100" src="<?php echo $nimg=$SiteClass->getimg($elem['id'],800,260);?>" alt="<?php echo $elem["title"];?>"></a>
		<div class="text">
			<h3 itemprop="name" ><?php echo $Text_Class->htmlfromchars($elem["title"]);?></h3>
			<div class="col-sm-12 sitedectription" itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leadtext"])));?></div>
			<div class=" text-center">
				<a  href="<?php echo $TextClass->levag($SiteClass->createurl($elem),100);/*$elem["url"];*/?>" itemprop="url" class="btn btn-success col-sm-12 nofloat"><?= lan('tovabb');?></a>
			</div>
			</div>
  </article>