<style>
.maincontainer {
  margin-top: 0px !important; 
 
}
</style>
<?php
$filterss["status"]=2;
$sliderelements=$class_slider->get($filterss);


$filters['status']=2;
$filters['maxegyoldalon']=3;
$filters['lang']='hu';


$csomagokarray=$CsomagClass->get($filters,null,'0') ;
//arraylist($csomagokarray);

$sitesarray=$SiteClass->get($filters,null,'0') ;


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
<div class="clearfix"></div>
<div class="ajanlatcontainer">
	<?php foreach($csomagokarray['datas'] as $elem){?>
	<div class="col-sm-4"><?php
	include ('./items/csomag/web/csomag_display2.php');
	?></div>
	<?php } ?>
</div>
<div class="clearfix"></div>
<div class="siteelement">

	<?php
//arraylist($sitesarray);
	foreach($sitesarray['datas'] as $elem){?>
	<?php
	include ('./items/site/web/display2.php');
	?>
	<?php } ?>
</div>
</div>