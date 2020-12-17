
<?php
$filterss["status"]=2;
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
        $shoparray['datas']=$shdatas;

	}


}
else {
	$filters['maxegyoldalon'] = 3;
	$sitesarray = $SiteClass->get($filters, null, '0');
}
?>


<div class="ParalaxPage ">

	<?php
	$hirekelemek=$sitesarray['datas'];
    //arraylist($sitesarray);
	foreach($sitesarray['datas'] as $elem){?>
	<?php
	include ('./items/site/web/display5.php');
	?>
	<?php } ?>

    <?php
   // $hirekelemek=$shoparray['datas'];
    //arraylist($sitesarray);
    foreach($shoparray['datas'] as $elem){?>
        <div class="ParalaxPage">
            <?php
            include ('./items/shop/web/shop5.php');
            ?>
        </div>

    <?php } ?>
</div>

	<script type="text/javascript">
		function gomemove(){
			scrollanimate('.pairunpair .oneurl .text','fadeIn');
			scrollanimate('.pairunpair:nth-child(odd) .oneurl img','bounceInRight');
			scrollanimate('.pairunpair:nth-child(even) .oneurl img','bounceInLeft');
			scrollanimate('product','fadeIn');
			scrollanimate('.animst1','fadeIn');
		}
		jQuery(document).ready(function() {
			$('slider,article,.csomagbox').css( "display", "block" );
			$('.csomagbox').matchHeight();
			$(window).on('scroll resize', gomemove);
			$(window).trigger('scroll');
		});

    </script>
	</script>