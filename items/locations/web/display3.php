<location itemprop="article"   itemscope="" itemtype="http://schema.org/WebPage" class="col-xs-6 onelocation">
		<div class="text">
			<h3 itemprop="name" ><?php echo $Text_Class->htmlfromchars($elem["title"]);?></h3>
<?php
if($elem["city"]>0) {
	$cfiltersd['id'] = $elem["city"];
	$vcity = $location_class->get_city($cfiltersd);
	//arraylist($vcity);
	$elem['city_name']=$vcity['datas'][0]['city_name'];
}
?>
			<div class="col-sm-12 sitedectription" itemprop="description"><?php echo ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($elem["leadtext"])));?></div>
			<?= $elem['zip'] ?> <?= $elem['city_name'] ?>
<br>
			<?= $elem['fromdate'] ?> - <?= $elem['todate'] ?>
			<br>

				<a  href="<?php echo $TextClass->levag($PlacesClass->createurl($elem),100);/*$elem["url"];*/?>" itemprop="url" class="btn btn-creme-inv col-sm-4"><?= lan('tovabb');?></a>
			</div>
  </location>