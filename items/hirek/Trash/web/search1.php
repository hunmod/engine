<?php 
$myparams='hirek/'.$getparams[1];
foreach ($_REQUEST as $nam=>$req )
{
if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page')
	
$myparams.='&'.$nam.'='.$req;
}?>

            <div id="breadCrumb">
               <?php 
               if ($getparams[1]=="search1"){
                   $sname="Ingredients";
               }
               if ($getparams[1]=="search2"){
                   $sname="Magazine";
               }
                 if ($getparams[1]=="search3"){
                   $sname="Offers";
               }             
               if ($_GET["tag"]){
                   $breadCrumb=" Tag / ".$_GET["tag"];
               }
               else if($_GET["s"]) {
                   $breadCrumb=" Search / ".$_GET["s"];
               }
               else{
                   $breadCrumb=" all ";
               }
                ?>
                <a href="<?php echo $homeurl;?>">Home</a> / <?php echo $sname;?> / <span><strong><?php echo  $breadCrumb; ?></strong></span>
            </div>
        </div>
        
        
<div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-85">
                        <div id="filterBar">
                            <div class="row">
                                <div class="col-lg-12">
<?php include("items/recipe/web/recipes_topmenu.php")?>
                                </div>
                            </div>
                        </div>
                        
                        <h1><?php echo $_REQUEST['s']?></h1>
<?php 
//arraylist($hirekelemek);
if (count($hirekelemek)<1){
 ?>
<h2>Unfortunately, your search didn't return any results. We suggest to look for relevant recipes by categories <a href="<?php echo $homeurl."/categories";?>">here</a>.</h2>
<?php
    
}
if (count($hirekelemek)>0){
foreach($hirekelemek as $elem){
    
include('hir_display_short.php');
}
}
?>
                    </div>
                    <div class="col-md-3 col-sm-45">
                        <div class="box adv">
<span>Ads</span>
										<?php 
										$adsfilter["pos"]=4;
										$adsfilter["adid"]=$adspos[$adsfilter["pos"]]['sizes'];
										include('items/ads/web/widget_side1.php');?>                        </div>

                    <?php include('items/hirek/web/widget_random.php');?>
                        <div class="box adv">
<span>Ads</span>
										<?php 
										$adsfilter["pos"]=5;
										$adsfilter["adid"]=$adspos[$adsfilter["pos"]]['sizes'];
										include('items/ads/web/widget_side1.php');?>                        </div>                        <?php include('items/vote/web/champagin_banner.php');?>
                    </div>
                </div>


                
 <?php if ($oldalakszama>1){
//oldalazó	?>

                                <nav class="text-center">
                                    <ul class="pagination">
                                        <li>
   <a href="<?php echo $server_url.$separator.$myparams."page=0"; ?>" aria-label="first">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                            </a>
                                        </li>
                                        <li>
   <a href="<?php echo $server_url.$separator.$myparams."page=".($oldal-1); ?>" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                            </a>
                                        </li>


                    
<?php for ($c=0;$c<=$oldalakszama-1;$c++){
	$selc= '';
	if ($oldal==$c)$selc='class="active"';
?>
   <li> <a href="<?php echo $server_url.$separator.$myparams."&page=".$c; ?>" <?php echo $selc; ?> ><?php echo $c+1;?></a></li>
<?php	
}
?>
                                        <li>
    <a href="<?php echo $server_url.$separator.$myparams."&page=".($oldal+1); ?>" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                          </a>
                                        </li>
                                        <li>
    <a href="<?php echo $server_url.$separator."&page=".($oldalakszama-1); ?>" aria-label="Last">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                            </a>
                                        </li>    
                                      </ul>
                                </nav>
								
<?php	
//oldalazó
}?>

               
                

                <div class="text-center horizBanner">
										<?php 
										$adsfilter["pos"]=6;
										$adsfilter["adid"]=$adspos[$adsfilter["pos"]]['sizes'];
										include('items/ads/web/widget_side1.php');?>
                </div>
            </div>
        </div> 