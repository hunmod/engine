<?php
//arraylist($adat);
?>
<style>
.maincontainer {
 /* margin-top: 45px!important; */
}
#lightSlider li img {
	width: 100%;
}
#breadCrumb{ 
/*background:rgba(255,255,255,0.6);
display:block;
float:left;
padding: 10px 20px;
margin-top: -50px;*/
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
<div class="container">
<div id="breadCrumb">
	<a href="<?php echo $homeurl;?>"><?= lan('home');?></a> >
	<a href="<?php echo $homeurl.'/'.$separator.shorturl_get("m/".$menu["id"]);?>"><?php echo $menu["nev"];?> </a> >
	<span><?php echo "". ($Text_Class->htmlfromchars($adat["title"]));?></span>
</div>


</div>



<iframe src = "https://maps.google.com/maps?q=<?= $adat["lati"]?>,<?= $adat["longi"]?>&hl=<?= $_SESSION['lang']?>;z=14&amp;output=embed" width="100%" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

<div class="container">

<div class=" col-xs-12">
        <site itemscope="" itemtype="http://schema.org/WebPage">
            <h1 itemprop="name" class=""><?php echo "". ($Text_Class->htmlfromchars($adat["title"]));?></h1>

			<div class=" col-xs-7">

				<img src="<?php echo $data["image"];?>" class="img-responsive"  alt="">
			</div>


            <div class=" col-xs-5">

                <?= $adat["priece"]; ?> <?= lan('ft') ?> <br>
				<b><?= $adat["cimnev"]; ?></b><br>
                <?= $adat["zip"]; ?> <?= $adat["city"]; ?> <?= $adat["cim"]; ?> <br>
                <a href="mailto:<?= $adat["email"]; ?>"><?= $adat["email"]; ?></a><br>
				<a href="call:<?= $adat["tel"]; ?>"><?= $adat["tel"]; ?></a><br>
				<a href="call:<?= $adat["tel1"]; ?>"><?= $adat["tel1"]; ?></a><br>
                <?= $adat["fromdate"]; ?> - <?= $adat["todate"]; ?><br>
				<?= $adat["leadtext"]; ?>





			<?php if ($auser["jog"]>3){?>
			<a itemprop="url" class="btn btn-creme" href="<?php echo $homeurl.$separator."locations/edittext/".encode($adat["id"]);?>"><?php echo lan("edit");?></a>
			<?php }?>
			<div class="clearfix "></div>
            </div>
            <description class="col-sm-12" itemprop="description">
                <?php echo "". ($Text_Class->youtoubecserel($Text_Class->htmlfromchars($adat["longtext"])));?>
				
            </description>

        </news>

</div>
</div>
<script>

</script>
	
	



</div>
