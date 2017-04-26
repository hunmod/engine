<style>
.maincontainer {
  margin-top: 0px !important; 
 
}
    /*css bugfix*/

slider,article,.csomagbox{
display: none;
}


</style>
<?php
$filterss["status"]=2;
$sliderelements=$class_slider->get($filterss);

include('items/slide/web/widget_slider.php');


$filters['lang']='hu';

$homedatas = json_decode(page_settings("homelements"),true);
$filters['lang']=$_SESSION['lang'];

if ($homedatas){
//	arraylist($homedatas);

	if (count($homedatas["csomag"])){
		$sdatas=array();
		foreach($homedatas["csomag"] as $element)
			if ($element>0){
			$filters['id']=$element;
			$el=$CsomagClass->get($filters,null,'0') ;
			//arraylist($el);
			$csdatas[]=$el['datas'][0];
		}
		$csomagokarray["datas"]=$csdatas;
	}

	if ($homedatas["sites"]){
		$sdatas=array();
		foreach($homedatas["sites"] as $element)if ($element>0){
			$filters['id']=$element;
			$el=$SiteClass->get($filters,null,'0') ;
			$sdatas[]=$el['datas'][0];
		}
		$sitesarray["datas"]=$sdatas;
		//arraylist($sitesarray);
	}


	if ($homedatas["event"]){
		$sdatas=array();

		foreach($homedatas["event"] as $element)if ($element>0){
			$filters['id']=$element;
			$el=$PlacesClass->get($filters,null,'0') ;
			$sdatas[]=$el['datas'][0];
		}
		$events["datas"]=$sdatas;
	}
}
else {

	$filters['status']=2;
	$filters['maxegyoldalon']=3;
	$csomagokarray = $CsomagClass->get($filters, null, '0');
//arraylist($csomagokarray);

	$filters['maxegyoldalon'] = 3;

	$sitesarray = $SiteClass->get($filters, null, '0');


	$filterse['ido'] = $date;
	$filterse['maxegyoldalon'] = 3;
	$filterse['lang'] = $_SESSION['lang'];
	$events = $PlacesClass->get($filterse, null, '0');

}








include ('items/slide/web/widget_slider.php');
?>
<div class="clearfix"></div>

<div class="container home">
<div class="clearfix"></div>
<div class="ajanlatcontainer">
	<?php foreach($csomagokarray['datas'] as $elem){?>
	<div class="col-sm-4 csomagbox"><?php
	include ('./items/csomag/web/csomag_display2.php');
	?></div>
	<?php } ?>
</div>
<div class="clearfix"></div>
<div class="ketgombhomen">
<a class="btn btn-creme-inv" href="<?= homeurl ?>/csomag/list"><?= lan('tudommikorszeretnekutazni');?></a>
<a class="btn btn-creme-inv" href="<?= homeurl ?>/rooms/request"><?= lan('megnezemmindet');?></a>
</div>
<div class="clearfix"></div>
</div>
	<?php
//arraylist($sitesarray);
	foreach($sitesarray['datas'] as $elem){?>
	<div class="pairunpair">
	<div class="container">
	<?php
	include ('./items/site/web/display2.php');
	?>
	</div>
	</div>
	<?php } ?>

<div class="pairunpair location">
	<div class="container">
	<span class="btn-creme-inv text-center cim"><?= lan("events")?></span>
	</div>
	<div class="container">

<?php
if (count($events["datas"])==1)
	foreach ($events["datas"] as $elem){?>
		<?php
		if (count($events["datas"])==1)include ('./items/locations/web/display2.php');
		if (count($events["datas"])==2)include ('./items/locations/web/display2_2.php');
		if (count($events["datas"])==3)include ('./items/locations/web/display2_3.php');
		?>
		<?php
	}else
if (count($events["datas"])>1){
?>
<?php
foreach ($events["datas"] as $elem){?>
			<?php
			if (count($events["datas"])==1)include ('./items/locations/web/display2.php');
			if (count($events["datas"])==2)include ('./items/locations/web/display2_2.php');
			if (count($events["datas"])==3)include ('./items/locations/web/display2_3.php');
			?>
	<?php
}
?>

	<?php
}

?>
	</div>

</div>
<div>




<script type="text/javascript">
function gomemove(){
   scrollanimate('.pairunpair .oneurl .text','fadeIn');
    scrollanimate('.pairunpair:nth-child(odd) .oneurl img','bounceInRight');
   scrollanimate('.pairunpair:nth-child(even) .oneurl img','bounceInLeft');
}
jQuery(document).ready(function() {
    $('slider,article,.csomagbox').css( "display", "block" );
	$('.csomagbox').matchHeight();
    $(window).on('scroll resize', gomemove);
    $(window).trigger('scroll');
});
</script>