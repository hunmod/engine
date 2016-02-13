<style>
.morebtn a{
	float:right;
}
</style>
<div class="container">
    <!--div id="breadCrumb">
		<a href="<?php echo $homeurl;?>">Home</a> / <span><strong>Videos</strong></span>
    </div-->
  <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/ads/web/widget_side1.php";
$widgets[]="items/konyha/web/widget_submenu.php";
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>                           
	<section class="col-md-9 col-sm-8 videolist">
<h3><?php echo $thmenu["nev"];?></h3>	
		<div class="">
<?php foreach ($qmenu as $data){?>   
			<h3><?php echo $data["nev"]; ?></h3>
 			<div class="row">
<?php
  $datas=$video_class->get(array("mid"=>$data["id"])," id DESC", '0');
?>
<?php 
$c=0;
foreach ($datas["datas"] as $mdata){
	$c++;
	if ($c>2){break;}
	?>
    <onevideo class="col-md-6" itemscope itemtype="http://schema.org/VideoObject">
        <div align="center" class="box embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $mdata["url"]; ?>" frameborder="0" allowfullscreen="" itemprop="url"></iframe>
        </div>
    </onevideo>
<?php } ?>

 		</div>
 		<div class="row">
 		<div class="morebtn">
			 <a href="<?php /*$Text_Class->to_link($data["nev"]).*/echo $homeurl."/video/videos".'/'.$data["id"] ?>">MORE</a>
		 </div>
	</div>


 <?php } ?>  
 </section>
                    
                    
        </div>                  

