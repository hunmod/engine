<div class="container">

  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
<rssitem class="col-md-9 col-sm-8" itemscope="" itemtype="http://schema.org/WebPage">
<?php // echo $data['chanelid']; ?>
<h2 itemprop="name"><?php echo $data['title']; ?></h2>
<description itemprop="description">
<?php echo $data['description']; ?>
</description>

<content itemprop="content">
<?php echo $data['content']; ?>
</content>

<br />
<strong><?php echo $lan['source']; ?>:</strong> <a href="<?php echo $data['link']; ?>" target="_blank" itemprop="url"><?php echo $data['link']; ?></a><br />
<strong><?php echo $lan['date']; ?>:</strong> <span><?php echo $data['pubDate2']; ?></span>
<br />

</rssitem>
</div>
