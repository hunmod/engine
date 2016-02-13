<div class="container" >
    <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
    </left> 
    <section class="col-md-9 col-sm-8" >
    <h1><?= $lan['receptkalkulator'];?></h1>
    <div><?php include_once("recept_alapanyag_user.php"); ?></div>
    <div class="info bgcolor1 border1 col-sm-12">
    <img src="/uploads/FoodJournal.jpg" border="0" style="float:left; margin:3px;" />
    <?= $lan['kalkulatorleiras'];?>
    </div>
    </section> 


 
<?php
//$ADS_list=(random_ads_by_group('1,13',1));
if (count($ADS_list)>=1){
	foreach ($ADS_list as $elem){
//		print_ads($elem);		
	}
}
?>    
    <div class="clear"></div>     
    <div class="col-sm-12 attencion">
    <?= $lan["foot_info"];?>
    </div>
</div>
