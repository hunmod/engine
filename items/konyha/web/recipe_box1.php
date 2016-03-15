<recipe itemscope="recipe" itemtype="http://schema.org/Recipe" class="col-lg-3 col-md-4 col-sm-6">
        <?php if($recip["status"]!=1) echo $recstatus[$recip["status"]];?>
    <a href="<?php echo $rec_class->recipe_url($recip);?>" itemprop="url" title="<?php echo $recip["nev"];?>" >
        <h2 class="cim bgcolor0" itemprop="name"><?php echo $recip["nev"]."<br>";?></h2>
        <div class="imgWrap bgcolor0" style="position:relative;">
        <img src="<?php echo $rec_class->recipe_img($recip["id"],300,250);?>" alt="<?php echo $recip["nev"];?>" title="<?php echo $recip["nev"];?>" itemprop="image" />
        <div class="icons">
            <?php if ($recip["gluten"]){?>
            <div class="icon gluten" title="<?php echo $lan["gluten"]; ?>" >&nbsp;</div>
            <?php } ?>
            <?php if ($recip["diab"]){?>
            <div class="icon diab" title="<?php echo $lan["diab"]; ?>">&nbsp;</div>
            <?php } ?>   
            <?php if ($recip["lactose"]){?>
            <div class="icon lactose" title="<?php echo $lan["lactose"]; ?>" >&nbsp;</div>
            <?php } ?>    
        </div>
    </div>

<div class="tabla" itemprop="nutrition"
    itemscope itemtype="http://schema.org/NutritionInformation">
    <div class="tblrow" >
    <span><strong><?php echo $lan["tapertek"]; ?></strong></span>  
    <span><strong itemprop="servingSize">100g</strong></span>
    </div>
    <div class="tblrow">
        <span class="energia"><?php echo $lan["energia"]; ?></span>
        <span class="energia" itemprop="calories" ><?php echo $recip["energia"];?></span>
    </div>
    <div class="tblrow">        
        <span class="kaloria"><?php echo $lan["kaloria"]; ?></span>
        <span class="kaloria" ><?php echo $recip["kaloria"];?></span>
    </div>
    <div class="tblrow">        
        <span class="szenhidrat"><?php echo $lan["szenhidrat"]; ?></span>
        <span class="szenhidrat" itemprop="carbohydrateContent"><?php echo $recip["szenhidrat"];?></span>
    </div>
    <div class="tblrow">        
        <span class="feherje"><?php echo $lan["feherje"]; ?></span>
        <span class="feherje" itemprop="proteinContent"><?php echo $recip["feherje"];?></span>
    </div>
    <div class="tblrow">        
        <span class="rost"><?php echo $lan["rost"]; ?></span>
        <span class="rost" itemprop="fiberContent"><?php echo $recip["rost"];?></span>
    </div>
    <div class="tblrow">        
        <span class="koleszterin"><?php echo $lan["koleszterin"]; ?></span>        
        <span class="koleszterin" itemprop="cholesterolContent"><?php echo $recip["koleszterin"];?></span>
    </div>
    <div class="tblrow">        
        <span class="zsir"><?php echo $lan["zsir"]; ?></span>
        <span class="zsir" itemprop="fatContent"><?php echo $recip["zsir"];?></span>
    </div>
</div>
<div class="clear"></div>  
</a>
<div class="bgcolor0 text" itemprop="description">
	<?php echo 
	keywordstaged($Text_Class->htmlfromchars($recip["bevezeto"]),$metakeywordss)
	;?>
    <?php if (($auser["jogid"]>=3)||($auser["id"]==$recip["uid"]) ){?>
    <a href="<?php echo $kezdooldal.$separator.$getparams[0]."/edit/". ($recip["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
    <?php }?>  
</div>
 </recipe>
