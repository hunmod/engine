<style>
.morebtn a{
	float:right;
}
</style>
<div class="container">
    <!--div id="breadCrumb">
		<a href="<?php echo $homeurl;?>">Home</a> / <span><strong>Videos</strong></span>
    </div-->

	<section class="col-sm-12 videolist">
<h1><?php echo $thmenu["nev"];?></h1>
<?php foreach ($qmenu as $data){?>
			<h3><?php echo $data["nev"]; ?></h3>
 			<div class="col-sm-12">
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
		<?php echo $mdata["nev"]; ?><br>

		<div align="center" class="box embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $mdata["url"]; ?>" frameborder="0" allowfullscreen="" itemprop="url"></iframe>
        </div>
    </onevideo>
<?php } ?>

 		</div>
 		<div class="col-sm-12 floatleft">
			 <a href="<?php /*$Text_Class->to_link($data["nev"]).*/echo $homeurl."/video/videos".'/'.$data["id"] ?>" class="btn btn-success"><?=lan("more")?></a>
	</div>


 <?php } ?>
 </section>
                    
                    
</div>

