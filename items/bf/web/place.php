<div class="container">
<?php if (count($widgets)){?>
  <left class="col-md-3 col-sm-4" >
<?php 
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>  

<news itemscope  itemtype="http://schema.org/WebPage" class="col-md-9 col-sm-8">
<?php } else {?>
<news itemscope="" itemtype="http://schema.org/WebPage">
<?php } ?>
 
    <h1 itemprop="name"><?php echo "". ($Text_Class->htmlfromchars($aprodata["nev"]));?></h1>
	<h2><?php echo $tipusok[$aprodata["tipus"]];?></h2>
    <top>		
    	
        <div class="col-sm-6">
                        <div class="imgWrap alignleft">
                            <img itemprop="image" src="<?php echo $aprodata["image"];?>">
                        </div>
        </div>
        <div class="col-sm-6">                
                        <p class="magazine_content">
						<?php if($aprodata["roki"]>0){echo lan('rokanntbarat');} ?>
						<?php if($aprodata["konyha"]>0){echo lan('konyha');} ?>
						<?php if($aprodata["gyerek"]>0){echo lan('gyerekbarat');} ?>
						<?php if($aprodata["pos"]>0){echo lan('bankterminal');} ?>
						<?php if($aprodata["sport"]>0){echo lan('sport');} ?>
						<?php if($aprodata["allat"]>0){echo lan('allat');} ?>
						<?php if($aprodata["bringa"]>0){echo lan('bringa');} ?>
						<?php if($aprodata["wifi"]>0){echo lan('wifi');} ?>
						<?php if($aprodata["support"]>0){echo lan('tamogat');} ?>
                        </p>
        </div>          
    </top>  
    <description class="col-sm-12" itemprop="description">
    <?php echo "". ($Text_Class->youtoubecserel($Text_Class->htmlfromchars($aprodata["leiras"])));?>
    </description>
    <?php if ($auser["jog"]>2){?>                            
                            <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."bf/edittext/".encode($aprodata["id"]);;?>"><?php echo $lan["edit"];?></a>
                            <?php }?>
           </news>                  

        <div style="clear:both;"></div>
          <?php $c=1; if (count($alsolista)){?>
            <h3 class="noprint">More from this</h3>
            <div class="row noprint">
          <?php
          foreach ( $alsolista as $elem) 
            {
                if ($c>3)break;
                include("items/bf/web/display_block1.php"); 
                $c++;                        
            } ?>  
              
            </div>
       <?php } ?>

        </div>
  

                
    <div class="text-center horizBanner">
    <?php 
    $adsfilter["pos"]=$pos3;
    $adsfilter["adid"]=$adspos[$adsfilter["pos"]]['sizes'];
   // include('items/ads/web/widget_side1.php');?>                  
    </div>
    <div class="modal fade" id="favok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-400">
        <div class="modal-content">
            <div class="modal-body">
                    <strong id="favok_text">Kedvelted ezt a cikket!</strong><br />
            <a data-toggle="modal" data-target="#favok" class="button enterButton" href="javascript:$(#dialog-message ).dialog( 'close' );"><span>OK</span></a>
            </div>
         </div>
      </div>
    </div>
</div>
