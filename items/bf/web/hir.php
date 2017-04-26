<div class="container">

    <iframe src = "https://maps.google.com/maps?q=<?= $aprodata["lati"]?>,<?= $aprodata["longi"]?>&hl=<?= $_SESSION['lang']?>;z=14&amp;output=embed" width="100%" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

<news itemscope="" itemtype="http://schema.org/WebPage">
    <top>
    	
        <div class="col-sm-6">
                        <div class="imgWrap alignleft">
                            <img itemprop="image" src="<?php echo $aprodata["image"];?>">
                        </div>
        </div>
        <div class="col-sm-6">
            <h1 itemprop="name"><?php echo "". ($Text_Class->htmlfromchars($aprodata["nev"]));?></h1>


            <?= $aprodata["zip"]?>
            <?= $aprodata["varos_nev"]?>
            <?= $aprodata["street"]?>
            <?= $aprodata["hsz"]?>


            <?= $elem["longi"]?>
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
</div>
