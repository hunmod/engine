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




	if ($homedatas["shop"]){
		$sdatas=array();
		foreach($homedatas["shop"] as $element)if ($element>0){
			$filters['id']=$element;
			$el=$ShopClass->get($filters,null,'0') ;
			$shdatas[]=$el['datas'][0];
		}
        $elemek=$shdatas;

	}


}
else {
	$filters['maxegyoldalon'] = 3;
	$sitesarray = $SiteClass->get($filters, null, '0');
}


include ('items/slide/web/widget_slider.php');
?>
<div class="clearfix"></div>
<div class="container home">
<div class="clearfix"></div>
	<?php
	$hirekelemek=$shoparray['datas'];
    //arraylist($sitesarray);
	//foreach($sitesarray['datas'] as $elem){?>
	<div class="pairunpair">
	<div class="container">
	<?php
	include ('./items/shop/web/list.php');
	?>
	</div>
	</div>
	<?php //} ?>


<div class="clearfix"></div>
	<?php
	$hirekelemek=$sitesarray['datas'];
    //arraylist($sitesarray);
	//foreach($sitesarray['datas'] as $elem){?>
	<div class="pairunpair">
	<div class="container">
	<?php
	include ('./items/site/web/list1.php');
	?>
	</div>
	</div>
	<?php //} ?>


</div>

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