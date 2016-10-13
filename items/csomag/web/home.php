<style>
.maincontainer {
  margin-top: 0px !important; 
 
}
</style>
<?php
$filterss["status"]=2;
$sliderelements=$class_slider->get($filterss);
?>
<slider>
        	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
			  <?php
			  $active=" active";
			  $c=0;
foreach($sliderelements["datas"] as $slider){?>			  
                <li data-target="#carousel-example-generic" data-slide-to="<?= $c; ?>" class="<?= $active;?>"></li>
<?php 
$c++;
$active="";
} ?>  
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
			  
			  <?php
			  $active=" active";
foreach($sliderelements["datas"] as $slider){
			$img="picture2.php?picture=".encode($slider['imgurl'])."";
?>
                <div class="item <?php echo $active;?>">
                  <img src="<?php echo $server_url.$img;?>&x=980&y=420" class="img-responsive"  alt="<?php echo $slider["name_".$_SESSION['lang']]; ?>">
				  <a href="<?= $slider["url"];?>">
                  <div class="carousel-caption">
					<p><?=  $slider["description"]; ?></p>
                  </div>
				  </a>
                </div>
<?php 
$active="";
} ?>  			
				
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
</slider>
<div class="clearfix"></div>

<div class="container home">
<div class="ajanlatcontainer">

<div class="col-sm-4">
<?php include ('csomag.php');?>
</div><div class="col-sm-4">
<?php include ('csomag.php');?>
</div><div class="col-sm-4">
<?php include ('csomag.php');?>
</div>
</div>
<div class="clearfix"></div>

  <article class="col-xs-12 oneurl">

    <img src="<?=homeurl?>/picture2.php?picture=dXBsb2Fkcy9zbGlkZXIvL2IxLmpwZw==&amp;x=1000&amp;y=320" class="img-100" alt="">      
		<div class="text">
			<h3>ez a cime</h3>
			<div class="col-sm-8"> ez a leirasa nem legyen ám tul hosszú</div>
			<a href="#" class="btn btn-creme col-sm-4"><?= lan('tovabb');?></a>
		</div>
  </article>
  <article class="col-xs-12 oneurl">
    <img src="<?=homeurl?>/picture2.php?picture=dXBsb2Fkcy9zbGlkZXIvL2IxLmpwZw==&amp;x=1000&amp;y=320" class="img-100" alt="">      
		<div class="text">
			<h3>ez a cime</h3>
			<div class="col-sm-8"> ez a leirasa nem legyen ám tul hosszú</div>
			<a href="#" class="btn btn-creme col-sm-4"><?= lan('tovabb');?></a>
		</div>
  </article>
  <article class="col-xs-12 oneurl">
    <img src="<?=homeurl?>/picture2.php?picture=dXBsb2Fkcy9zbGlkZXIvL2IxLmpwZw==&amp;x=1000&amp;y=320" class="img-100" alt="">      
		<div class="text">
			<h3>ez a cime</h3>
			<div class="col-sm-8"> ez a leirasa nem legyen ám tul hosszú</div>
			<a href="#" class="btn btn-creme col-sm-4"><?= lan('tovabb');?></a>
		</div>
  </article>

</div>