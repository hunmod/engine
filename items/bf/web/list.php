<style>
.mhbl2{
height: 420px;	
}
.mhbl2 h2{
font-size:23px;
}

</style>
<div class="container">
            <!--div id="breadCrumb">
                <a href="<?php echo $homeurl;?>">Home</a> / 
 				<?php //echo $menu["nev"];
                ?>
                <span><strong><?php echo $breadtext;?></strong></span>
                <?php
               if ($auser["jog"]>2){
				?>
                <a href="<?php echo $homeurl.$separator;?>hirek/edittext">Új hír</a>
                <?php }?>
            </div-->
                <div class="row">


<?php if (count($widgets)){?>
  <left class="col-md-3 col-sm-4" >
<?php 
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>  

<news itemscope  itemtype="http://schema.org/WebPage" class="col-md-9 col-sm-8">
<?php } else {?>
<news itemscope="" itemtype="http://schema.org/WebPage">
<?php } ?>      
<div>
                <h1>
				<?php echo $menu["nev"];
				$c=1;
                if(count($menufelette))foreach(array_reverse($menufelette) as $mef){
					
					if ($c!=1){$xclass='class="zold"';}
					else {$xclass='';}
					if ($c<count($menufelette)){$xper=' / ';}
					else {$xper='';}
					$c++;
				if ($c>2){	
                ?>
                <span <?php echo $xclass;?>><?php echo $mef["nev"];?></span><?php echo $xper;?>
                <?php
                	}
                }
				?>
                </h1>
				 <?php
               if ($auser["jog"]>2){
				?>
                <a href="<?php echo $homeurl.$separator;?>hirek/edittext"><?= lan('ujhir');?></a>
                <?php }?>
          
</div>
		  <?php 
//arraylist($hirekelemek);
if ($hirekelemek){
foreach($hirekelemek as $elem){
		include('items/bf/web/display_short.php');	
	
}}
?>
    <div class="clear"></div>
<?php if ($oldalakszama>1){
//oldalazó	?>

                        <nav class="text-center">
                          <ul class="pagination">
                            <li>
                                <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=0"; ?>" aria-label="First">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=".($oldal-1); ?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                </a>
                            </li>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><li><a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=".$c; ?>"><?php echo $c+1;?></a></li>
	<?php	}
	?>
                            <!--li class="active"><a href="#">2</a></li-->

                            <li>
                              <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=".($oldal+1); ?>" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                              </a>
                            </li>
                            <li>
                                <a href="<?php echo $homeurl.$separator.$_GET["q"]."&page=".($oldalakszama-1); ?>" aria-label="Last">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li>
                          </ul>
                    </nav>
<?php	
//oldalazó
}?>
</news>



                    


                <div class="text-center horizBanner">
                <?php 
                $adsfilter["pos"]=$pos3;
                $adsfilter["adid"]=$adspos[$adsfilter["pos"]]['sizes'];
                //include('items/ads/web/widget_side1.php');?>                  
                </div>





                    </div>

</div>

<!--div>
<?php
if ($getparams[2]>0 && $auser["jogid"]>3){
	//arraylist($getparams);
//include_once("./items/files/web/list.php");	
}
?>
</div>
<div class="clear"></div>


<div class="col-md-3 col-sm-6">
                        <a href="<?php echo $kezdooldal.$separator.$getparams[0]."/hir/".($elem["id"]);?>" class="box matchHeight zold" style="height: 328px;">
                            <h2>How To's</h2>
                            <div class="imgWrap">
                                <img src="<?php echo $Text_Class->htmlfromchars($elem["image"]);?>">
                            </div>
                            <div class="upArrowDecor"></div>
                            <h3><?php echo $Text_Class->htmlfromchars($elem["cim"]);?></h3>
                            
                            <p><?php echo $Text_Class->htmlfromchars($elem["hir"]);?></p>
                        </a>
                        

                    </div>




</div-->
