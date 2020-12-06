<style>
    hiddenbox {position: fixed; display: block; top: -1000px}
</style>
<product itemscope itemtype="http://schema.org/Product" class="col-md-4 col-sm-6 col-12">
    <a href="<?= $homeurl.$separator."shop/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>">
        <topimage class="imgframe col-sm-12"><img class="img-responsive" src="<?php echo $ShopClass->getimg($elem["id"]);?>" alt="<?php echo $elem["title"];?>" title="<?php echo $elem["title"];?>" height="100" itemprop="image"  /></topimage>
    </a>
    <meta itemprop="url" content="<?= $homeurl.$separator."shop/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>" />

    <meta itemprop="name" content="<?= $Text_Class->htmlfromchars($elem["title"])?>" />
    <meta itemprop="category" content="cipőfűző" />
    <meta itemprop="brand" content="<?=$oldalneve?>" />
    <meta itemprop="itemCondition" content="https://schema.org/NewCondition" />
    <hiddenbox itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
        <span itemprop="ratingValue">4.6</span> /<span itemprop="reviewCount">100</span>
    </hiddenbox>
    <pricesc itemprop="offers" itemtype="http://schema.org/Offer" itemscope>

        <?php if ($eurhuf>0){?>
            (<priece><?php echo priece_format($elem["priece"]/$eurhuf,2);?> &#8364;</priece> )<br />
        <?php }?>
        <?php if ($elem["priece_old"]>$elem["priece"]){?>
            <oldprice itemprop="highPrice"><?php echo priece_format($elem["priece_old"],0);?> </oldprice><currency itemprop="highPriceCurencey">Ft</currency>
            <action itemprop="precent"><?php echo percentage($elem["priece"], $elem["priece_old"], 0);?> %</action>
        <?php } ?>
        <price><?php echo priece_format($elem["priece"],0);?> </price><currency itemprop="priceCurrency">Ft</currency>
        <meta itemprop="price" content="<?= ($elem["priece"]);?> " />

        <?  /*    <endprice><?php echo priece_format(($elem["priece"]+$elem["priece"]/100*$elem["vat"]),0);?> Ft</endprice>
               <!--vat itemprop="vat">+<?php echo $Text_Class->htmlfromchars($elem["vat"]);?>% ÁFA</vat><br /-->
 */ ?>
    </pricesc>
 <?php if ($elem["storage_status"]==3){
        ?><br /><?php echo lan("csak rendelésre"); //$elem["ordertime"];
     }?>
    <div class="actions">
        <ul>
            <?php if ($elem["storage_status"]!=5){?>
                <li>
                    <span class="buy clk" onclick="call_kosar_v1('add','<?= $elem["id"]?>');"  ><i class="fa fa-cart-plus"> </i> <?= lan('Kosárba') ?></span>
                </li>
            <?php } ?>
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $homeurl.$separator."shop/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>" target="_blank" rel="noreferrer"` ><i class="fa fa-facebook-square"></i> <?= lan('Megosztom')?></a>
            </li>
            <?php
            if ($auser["jogid"]>=3) {?>
                <li>
                    <a href="<?php echo $homeurl.$separator."shop/edittext/".base64_encode ($elem["id"]);?>"  ><?= lan('edit')?></a>
                </li>
            <?php }?>
        </ul>
    </div>
    <div class="clear"></div>
    <a href="<?php echo $homeurl.$separator."shop/shop/".($elem["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($elem["title"]));?>">
        <name itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["title"]);?></name>
    </a>

    <description itemprop="description"><?php echo $Text_Class->levag($Text_Class->htmlfromchars($elem["leadtext"]),45);?></description></a>
    <div class="clear"></div>
</product>
