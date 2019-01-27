<div class="container">
		<div id="breadCrumb">
                <a href="<?php echo $homeurl;?>">Home</a> / Favourites / magazine
		</div>

                <div class="row">
                    <div class="col-md-9 col-sm-85">
                        <div id="filterBar">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="btn-group btn-group-justified">
<?php include("items/recipe/web/user_topmenu.php");?>
                                    </div>
                                </div>
                            </div>
                            </div>  
                        <p>Saved and sorted your favourite recipes and magazine articles here so you can find the perfect dish or reading in no time at all. You can save all your favourite recipes or articles by clicking on the save button beside the main image on all posts.</p>
                          <h2 class="favTitle"><a href="<?php echo $homeurl.'/recipe/fav' ;?>">Recipes</a> / <strong>Magazine</strong></h2>
                          
                            
                                      
  

<?php 
//arraylist($hirekelemek);
if (count($hirekelemek)>0){
foreach($hirekelemek as $elem){
	include('hir_display_short.php');
$che++;
}
}
?>

<?php if ($oldalakszama>1){
//oldalazó	?>
                        <nav class="text-center">
                          <ul class="pagination">
                            <li>
                                <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=0"; ?>" aria-label="First">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal-1); ?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                </a>
                            </li>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><li><a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".$c; ?>"><?php echo $c+1;?></a></li>
	<?php	}
	?>
                            <!--li class="active"><a href="#">2</a></li-->

                            <li>
                              <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal+1); ?>" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                              </a>
                            </li>
                            <li>
                                <a href="<?php echo $separator.$_GET["q"]."&oldal=".($oldalakszama-1); ?>" aria-label="Last">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li>
                          </ul>
                    </nav>
<?php	
//oldalazó
}?>
      </div>



                    
                    <div class="col-md-3 col-sm-45">

                        <div class="box adv">
                                    <span>Ads</span>
										<?php 
										$adsfilter["pos"]=2;
										$adsfilter["adid"]=$adspos[$adsfilter["pos"]]['sizes'];
										include('items/ads/web/widget_side1.php');?>
                        </div>
                        <?php include('items/vote/web/champagin_banner.php');?>
                    </div>                    
                    
                    
                    
                 </div>

                    </div>

