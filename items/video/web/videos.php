<div class="container">

<div id="breadCrumb">
                <a href="<?php echo $homeurl;?>">Home</a> / <span><a href="<?php echo $homeurl.$separator.'/videos';?>">Videos</a></span>   / <span><strong><?php echo $qmenu['datas'][0]['nev'];?></strong></span>
            </div>
            

            
                  <section class="col-sm-12 videos">
                        <h1>Videos / <?php echo $qmenu['datas'][0]['nev'];?></h1>


<?php foreach ($datas["datas"] as $mdata){?>
    <div class="col-sm-6 video" itemscope itemtype="http://schema.org/VideoObject">
        <div align="center" class="box embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $mdata["url"]; ?>" frameborder="0" allowfullscreen="" itemprop="url"></iframe>
        </div>
    </div>
<?php } ?>
                  <div class="clearfix"></div>
<?php if ($pageakszama>1){
//pageazó	?>

                        <nav class="text-center">
                          <ul class="pagination">
                            <li>
                                <a href="<?php echo $pagerurl.$separator2."page=0"; ?>" aria-label="First">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $pagerurl.$separator2."page=".($page-1); ?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                </a>
                            </li>
    <?php
	$maxoldalazonum=10;
	$oldalakszama=$pageakszama+1;
if ($oldalakszama>$maxoldalazonum){
	
	$start=$oldal-round($maxoldalazonum/2);
	if ($start<1){
		$start=0;
		$end=$maxoldalazonum;	
	}
	else{
		
		$end=$start+$maxoldalazonum;
		if ($end>$oldalakszama)
		{
		$end=$oldalakszama;
		$start=$oldalakszama-$maxoldalazonum;
		}
		
	}
}
else
{
	$start=0;
	$end=$oldalakszama-1;
}
for ($c=$start;$c<=$end-1;$c++){
	?><li><a href="<?php echo $pagerurl.$separator2."page=".$c; ?>"><?php echo $c+1;?></a></li>
	<?php	}
	?>
                            <!--li class="active"><a href="#">2</a></li-->

                            <li>
                              <a href="<?php echo $pagerurl.$separator2."page=".($page+1); ?>" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                              </a>
                            </li>
                            <li>
                                <a href="<?php echo $pagerurl."&page=".($pageakszama-1); ?>" aria-label="Last">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li>
                          </ul>
                    </nav>
<?php	
//pageazó
}?>
</section>
				</div>
