<div class="container">
    <div id="breadCrumb">
        <a href="<?php echo $homeurl;?>">Home</a> / 
        <a href="<?php echo $homeurl.'/'.$separator.shorturl_get("m/".$menu["id"]);?>"><?php echo $menu["nev"];?> </a> / 
        <span><?php echo "". ($Text_Class->htmlfromchars($aprodata["cim"]));?></span>
    </div>
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
<news itemscope="" itemtype="http://schema.org/WebPage"class="col-md-12 col-sm-12">
<?php } ?>

          <div class="whiteHowToBox">
                <div class="articleMetaButtons" style="display:none;">
                <?php if ($auser["id"]>0)
                {
                $likebtn="hiraction('like','".$aprodata['id']."',0);";
                $favbtn="hiraction('fav','".$aprodata['id']."',0);";
                }
                else{
                $likebtn=$favbtn="mlogin();";
                }
                ?>
                
                    <button class="<?php echo $mlikecssx;?>" id="likei<?php echo $aprodata['id']; ?>"onclick="<?php echo $likebtn; ?>">
                        <span class="piros"><i class="fa fa-heart"></i> <strong id="like<?php echo $aprodata['id']; ?>"><?php echo $aprodata['like_count']; ?></strong></span>
                        Kedvelem
                    </button>
<input name="likes<?php echo $aprodata['id']; ?>" id="likes<?php echo $aprodata['id']; ?>" type="hidden" value="<?php echo $mlikeval; ?>" />


                    <button class="<?php echo $mfavcssx;?>" id="favi<?php echo $aprodata['id']; ?>"onclick="<?php echo $favbtn; ?>">
<span class="tenger"><i class="fa fa-floppy-o"></i></span>
                        Kedvencekhez
                    </button>
<input name="favs<?php echo $aprodata['id']; ?>" id="favs<?php echo $aprodata['id']; ?>" type="hidden" value="<?php echo $mfavval;?>" />
<button onclick="window.print();">
                        <span class="zold"><i class="fa fa-print"></i></span>
                        Print
                    </button>
                </div>
           </div>   
    <h1 itemprop="name"><?php echo "". ($Text_Class->htmlfromchars($aprodata["cim"]));?></h1>
    
                                <div class="imgWrap col-lg-3 col-md-4 col-sm-5">
                                        <img itemprop="image" src="<?php 
										$nimg=$gmrec_class->getimg($aprodata['id'],300,148);
											echo $nimg.'';
;?>" alt="<?php echo $Text_Class->htmlfromchars($aprodata["cim"]);?>"  title="<?php echo $Text_Class->htmlfromchars($aprodata["cim"]);?>"  >
                            </div>
                            
                            
    <div itemprop="ingredients col-lg-9 col-md-8 col-sm-7">
	<h3>Összetevők</h3>
	<?php echo "". ($Text_Class->htmlfromchars($aprodata["osszetevok"]));?></div>
    
    <div itemprop="leiras col-md-12 col-sm-12">
	<h3>Elkészítés</h3>
	<?php echo "". ($Text_Class->htmlfromchars($aprodata["leiras"]));?></div>
    
    <div itemprop="subject col-lg-12 ">
	<h3>Megjegyzés</h3>
	<?php echo "". ($Text_Class->htmlfromchars($aprodata["subject"]));?></div>    <!--top>		
    	
        <div class="col-sm-6">
                        <div class="imgWrap alignleft">
                            <img itemprop="image" src="<?php echo $aprodata["image"];?>">
                        </div>
        </div>
        <div class="col-sm-6">                
                        <p class="magazine_content">
                        <?php echo "". ($Text_Class->tageketcsupaszit($Text_Class->htmlfromchars($aprodata["hir"])));?>
                        </p>
        </div>          
    </top-->  
    <description class="col-sm-12" itemprop="description">
    <?php echo "". ($Text_Class->youtoubecserel($Text_Class->htmlfromchars($aprodata["hir2"])));?>
    </description>
    <?php if ($auser["jog"]>2){?>                            
                            <a itemprop="url" class="button enterButton moreButton" href="<?php echo $homeurl.$separator."gmrec/edittext/".encode($aprodata["id"]);;?>"><?php echo $lan["edit"];?></a>
                            <?php }?>
           </news>                  

        <div style="clear:both;"></div>
          <?php $c=1; if (count($alsolista)){?>
            <h3 class="noprint">Recept ajánló:</h3>
            <div class="row noprint">
          <?php
          foreach ( $alsolista as $elem) 
            {
                if ($c>3)break;
                include("items/hirek/web/hir_display_block2.php"); 
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
