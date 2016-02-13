<?php

$qhir=$hir_class->get($filters,' sorrend ASC ',$_GET["page"]) ;
$hirekelemek=($qhir['datas']);
$hszlistacount=$qhir['count'];



?>


<style>
new{
height:420px;	
}
</style>
<div class="container">
<?php
/* 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
$widgets[]="items/ads/web/widget_side1.php"; */
?>

<?php if (count($widgets)){?>
  <left class="col-md-3 col-sm-4" >
<?php 
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>  

<news itemscope  itemtype="http://schema.org/WebPage" class="col-md-9 col-sm-8">
<?php } else {?>
<news itemscope="" itemtype="http://schema.org/WebPage">
<?php } ?>

<?php

if (count($hirekelemek)>0){
	$che=1;
	$stn=4;
foreach($hirekelemek as $elem){
	//include('hir_display_short.php');
	if($che==4&&$stn==3){
		$stn=4;
		$che=1;
	}
	if($che==3&&$stn==4){
		$stn=3;
		$che=1;
	}

	
	if 	($stn==3){
		include('items/hirek/web/hir_display_block2.php');	
	}else include('items/hirek/web/hir_display_block1.php');
			$che++;
	}
}


//include('hir_display_short_first.php');

?>
</news>
</div>
<?php




?>

<?php ?>
<?php ?>
<?php ?>