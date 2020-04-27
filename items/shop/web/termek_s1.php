<product itemscope itemtype="http://schema.org/Product" class="col-md-4 col-sm-6 col-12">
    <a href="<?php echo $homeurl.$separator.$getparams[0]."/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>">
        <topimage class="imgframe col-sm-12"><img class="img-responsive" src="<?php echo $ShopClass->getimg($elem["id"]);?>" alt="<?php echo $elem["title"];?>" title="<?php echo $elem["title"];?>" height="100" itemprop="image"  /></topimage>
    </a>
    <prieces>
        <!--endpriece><?php echo priece_format(($elem["priece"]+$elem["priece"]/100*$elem["vat"]),0);?> Ft</endpriece-->
        <?php if ($eurhuf>0){?>
            (<priece><?php echo priece_format($elem["priece"]/$eurhuf,2);?> &#8364;</priece> )<br />
        <?php }?>
        <?php if ($elem["priece_old"]>$elem["priece"]){?>
            <action itemprop="precent"><?php echo percentage($elem["priece"], $elem["priece_old"], 0);?> %</action>
            <oldpriece itemprop="highPrice"><?php echo priece_format($elem["priece_old"],0);?> Ft</oldpriece><br />
        <?php } ?>
        <priece itemprop="price"><?php echo priece_format($elem["priece"],0);?> Ft</priece>
        <!--vat itemprop="vat">+<?php echo $Text_Class->htmlfromchars($elem["vat"]);?>% ÁFA</vat><br /-->
    </prieces>
    <?php if ($elem["storage_status"]==3){
        ?><br /><?php echo lan("csak rendelésre"); //$elem["ordertime"];
     }?>
    <div class="actions">
        <ul>
            <?php if ($elem["storage_status"]!=5){?>
                <li>
                    <span class="buy clk" onclick="call_kosar_v1('add','<?= $elem["id"]?>');" ><iclass="icon-sr-cart-1"> </i><?= lan('Kosárba teszem') ?></span>
                </li>
            <?php } ?>
            <li>
                <a class="facebookicon35" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $homeurl.$separator.$getparams[0]."/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>" target="_blank"><?= lan('Megosztom facebook')?></a>
            </li>
            <?php
            if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){?>
                <li>
                    <a href="<?php echo $homeurl.$separator.$getparams[0]."/edittext/".base64_encode ($elem["id"]);?>"  ><?= lan('edit')?></a>
                </li>
            <?php }?>
        </ul>
    </div>
    <div class="clear"></div>
    <a href="<?php echo $homeurl.$separator.$getparams[0]."/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>">
        <name itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["title"]);?></name>
    </a>

    <description itemprop="description"><?php echo $Text_Class->levag($Text_Class->htmlfromchars($elem["leadtext"]),45);?></description></a>
    <div class="clear"></div>
</product>
