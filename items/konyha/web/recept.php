<div class="container">
<?php if (count($widgets)){?>
  <left class="col-md-3 col-sm-4" >
<?php 
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>  

<recipe itemscope  itemtype="http://schema.org/Recipe" class="col-md-9 col-sm-8">
<?php } else {?>
<recipe itemscope  itemtype="http://schema.org/Recipe" class="">
<?php } ?>
<div class="row">
    <h1 itemprop="name"><?php echo $recept_data["nev"]."<br>";?></h1>
    <div class="col-sm-6">
		<div class="imgWrap alignleft">
<img src="<?php echo ($recept_data["image"]);?>" alt="<?php echo $recept_data["nev"];?>" title="<?php echo $recept_data["nev"];?>" itemprop="image" width="120" />

    	</div>
    </div>
	<div class="col-sm-6">
    	<description itemprop="description">
		<?php echo $Text_Class->htmlfromchars($recept_data["bevezeto"]);
        $leiras=$Text_Class->htmlfromchars($recept_data["leiras"]);
        ?>
        </description>
        <div class="clear"></div>
        <strong><?php echo $lan["adag"]; ?>:</strong> <?php echo $Text_Class->htmlfromchars($recept_data["adag"]);?><br />
        <strong><?php echo $lan["elkeszites_ido"]; ?>:</strong><meta itemprop="cookTime" content="PT<?php echo $Text_Class->htmlfromchars($recept_data["elkeszites_ido"]);?>M"><?php echo $Text_Class->htmlfromchars($recept_data["elkeszites_ido"]);?> <?php echo $lan["min_short"]; ?><br />
        <strong><?php echo $lan["nehezseg"]; ?>:</strong><?php echo $Text_Class->htmlfromchars($recept_data["nehezseg"]);?><br />
            	<div class="free row">
	   <?php if ($recept_data["gluten"]){?>
        <div class="icon gluten" title="<?php echo $lan["gluten"]; ?>" >&nbsp;</div>
        <?php } ?>
        <?php if ($recept_data["diab"]){?>
        <div class="icon diab" title="<?php echo $lan["diab"]; ?>">&nbsp;</div>
        <?php } ?>   
        <?php if ($recept_data["lactose"]){?>
        <div class="icon lactose" title="<?php echo $lan["lactose"]; ?>" >&nbsp;</div>
        <?php } ?>    
	</div><br />

        <owner>
        <?php if ($recept_owner['img']){ ?>
        <img alt="<?php echo $recept_owner["unev"];?>" src="<?php echo $recept_owner['img'];?>" >
        <?php }?>
        <span itemprop="author" ><?php echo $recept_owner["unev"];?></span>
        </owner>
        <?php if (($auser["jogid"]>=3) ){?>
            <a href="<?php echo $kezdooldal.$separator.$getparams[0]."/edit/". ($recept_data["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
        <?php }?>  
    </div>
</div>
    <social>
    <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $thisulr; ?>" class="facebook">&nbsp;</a>
    <a target="_blank" href="http://twitter.com/intent/tweet?source=sharethiscom?url=<?php echo $thisulr; ?>&text=ds" class="twitter">&nbsp;</a>
	<a target="_blank" href="https://plus.google.com/share?url=<?php echo $thisulr; ?>" class="googleplus">&nbsp;</a>
<a data-pin-do="buttonBookmark" data-pin-round="true" data-pin-tall="true" href="https://www.pinterest.com/pin/create/button/" id="pinterest"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_round_red_32.png" /></a>
<!-- Please call pinit.js only once per page -->
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>  
 <a onclick="window.print();" class="printme">&nbsp;</a>    
    </social>

	<div class="clear"></div>
<?php
$widgetc="items/konyha/web/widget_content1.php";
if (file_exists($widgetc))include($widgetc);
?>

<?php if ($getparams[2]>0){ ?>
<div class="row"><?php include_once("recept_alapanyag_user.php"); ?></div>
<?php  }?>
    <div class="row bgcolor1" itemprop="recipeInstructions" >
	<?php echo $leiras;
	//arraylist($recept_data);
	?>
    </div>
	<images>
		<h3><?php echo $lan["kepek"]; ?></h3>
		<?php	
		//$getparams[2]=encode($getparams[2]);	
		//$jugpuff=$auser["jogid"];
		//$auser["jogid"]=3;
		include_once("./items/files/web/list.php");
		//$auser["jogid"]=$jugpuff;
		//$getparams[2]=decode($getparams[2]);	
        ?>
    </images>
 <?php
	if (($fbpost>0)&&($fb_page_id!=""))
	{
	echo '<div class="fb-comments" data-href="https://www.facebook.com/'.$fb_page_id.'/posts/'.$fbpost.'" data-numposts="5"></div>'; 
	}
 ?>
 <br />
 
    <div><br />


        
        <meta itemprop="datePublished" content="<?php echo ($recept_data["ido"]);?>"> 
 <?php if (($auser["jogid"]>=3) ){?> 
	    <a href="http://abrakahasba.hu/includeajax.php?q=konyha/recept_send_mail/<?php echo $getparams[2];?>/&email=hunmod.abrakahasba@blogger.com&s=s" target="_blank">bloggerra</a>
<?php } ?>        
    </div> 

    <div class="attencion"><?= $lan["foot_info"];?></div>
 
</recipe>


  </div>
 
     <div class="clear"></div>  

<?php
/*$ADS_list=(random_ads_by_group('1,13',1));
if (count($ADS_list)>=1){
	foreach ($ADS_list as $elem){
		print_ads($elem);		
	}
}*/
?> 




