<?php
//arraylist($adat);
?>
<style>
.maincontainer {
  margin-top: 45px!important; 
}
#lightSlider li img {
	width: 100%;
}
#breadCrumb{ 
background:rgba(255,255,255,0.6);
display:block;
float:left;
padding: 10px 20px;
margin-top: -50px;
}
</style>
<script type="text/javascript">
function carusel_top(){
if ($( 'body' ).width()>742) {
	//console.log($( 'body' ).width());
	var caruselheight = ($('.carousel-inner').height());
	if (caruselheight>0)$(".leftcol").css({'margin-top': '-' + (caruselheight+1) + 'px'});
}else{
	$(".leftcol").css({'margin-top': '0px'});
}
}

$(document).ready(function () {
	$('.match-height').matchHeight();
	$('#lightSlider').lightSlider({
		gallery: true,
		item: 1,
		loop: true,
		thumbItem: 9,
		slideMargin: 0,
		enableDrag: false,
		currentPagerPosition: 'left',
		onSliderLoad: function (el) {
			el.lightGallery({
				selector: '#imageGallery .lslide'
			});
		}
	});

$( window ).resize(function() {
	carusel_top();    });

$( window ).load(function() {
	carusel_top();
	});	
	
});
</script>
<slider>
        	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
			  <?php
			  $active=" active";
			  $c=0;?>
                <li data-target="#carousel-example-generic" data-slide-to="<?= $c; ?>" class="<?= $active;?>"></li>
		<?php	foreach ($mylist as $onepic) { $c++ ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?= $c; ?>" class=""></li>

                <?php } ?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

			  <?php  $active=" active";?>
                <div class="item <?php echo $active;?>">
                  <img src="<?php echo $data["image"];?>" class="img-responsive"  alt="">
                </div>
            <?php 
			//arraylist($mylist);
			foreach ($mylist as $onepic) { ?>
			      <div class="item">
                  <img src="<?php echo $homeurl.$onepic["screen"];?>" class="img-responsive"  alt="">
                </div>
                <?php } ?>
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
<div class="container">
<div id="breadCrumb">
	<a href="<?php echo $homeurl;?>"><?= lan('home');?></a> >
	<a href="<?php echo $homeurl.'/'.$separator.shorturl_get("m/".$menu["id"]);?>"><?php echo $menu["nev"];?> </a> >
	<span><?php echo "". ($Text_Class->htmlfromchars($adat["title"]));?></span>
</div>	
<div class="col-sm-8 col-xs-12">
        <site itemscope="" itemtype="http://schema.org/WebPage">
            <h1 itemprop="name"><?php echo "". ($Text_Class->htmlfromchars($adat["title"]));?></h1>

            <div>
                <?= $adat["leadtext"]; ?>
			<?php if ($auser["jog"]>3){?>
			<a itemprop="url" class="btn btn-creme-inv" href="<?php echo $homeurl.$separator."site/edittext/".encode($adat["id"]);?>"><?php echo lan("edit");?></a>
			<?php }?>
			<div class="clearfix "></div>
            </div>
            <description class="col-sm-12" itemprop="description">
                <?php echo "". ($Text_Class->youtoubecserel($Text_Class->htmlfromchars($adat["longtext"])));?>
				
            </description>

        </news>

</div>
<div class="col-sm-4 col-xs-12 leftcol">
<?php include ('./items/csomag/web/sidelist.php');?>
<?php
include('items/files/web/list.php');
?>
</div>
</div>
<script>

</script>
	
	



</div>
