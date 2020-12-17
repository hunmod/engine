<article itemscope itemtype="http://schema.org/Product">
    <meta itemprop="category" content="cipőfűző" />
    <meta itemprop="brand" content="okosfuzo" />
    <meta itemprop="itemCondition" content="https://schema.org/NewCondition" />
    <meta itemprop="url" content="<?= ("https://" . $domain . $homefolder . "/" . $img); ?>" alt="<?php echo $elem["title"]; ?>" title="<?php echo $elem["title"]; ?>" />

    <hiddenbox itemprop="review"></hiddenbox>
    <hiddenbox itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
        <span itemprop="ratingValue">4.5</span> /<span itemprop="reviewCount">100</span>
    </hiddenbox>

    <div class="ParallaxImage"  style="background-image: url(<?= $nimg=$ShopClass->getimg($elem['id'],1100,850);?>)">
        <div class="container">
            <h3 itemprop="name" ><?php echo $Text_Class->htmlfromchars($elem["title"]); ?></h3>
            <br>
        </div>
    </div>

    <div class="ParallaxContent">
        <div class="container">
            <shoparticle class="col-sm-12">
                <h2 itemprop="name" ><?php echo $Text_Class->htmlfromchars($elem["title"]); ?></h2>

                <prices itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                    <meta itemprop="priceCurrency" content="huf" />


                    <?php if ($eurhuf > 0) { ?>
                        (
                        <price itemprop="price"><?php echo priece_format($elem["priece"] / $eurhuf, 2); ?> &#8364;</price> )<br/>
                    <?php } ?>

                    <!--endpriece><?php echo priece_format(($elem["priece"] + $elem["priece"] / 100 * $elem["vat"]), 0); ?>
                    Ft
                </endpriece-->

                    <?php if ($elem["priece_old"] > $elem["priece"]) { ?>
                        <oldprice itemprop="highPrice"><?php echo priece_format($elem["priece_old"], 0); ?> Ft</oldprice>

                        <action><?php echo percentage($elem["priece"], $elem["priece_old"], 0); ?> %</action>
                    <?php } ?>
                    <price><?php echo priece_format($elem["priece"], 0); ?> </price><currency>Ft</currency>
                    <meta itemprop="price" content="<?= ($elem["priece"]);?> " />
                    <meta itemprop="priceCurrency" content="HUF" />

                    <!--vat itemprop="vat">+<?php echo $Text_Class->htmlfromchars($elem["vat"]); ?>% ÁFA</vat><br /-->

                    <orderinfo >
                        <?php echo $storage_satus[$elem["storage_status"]]["nev"]; ?>
                        <?php if ($elem["storage_status"] == 3 ||  $elem["storage"]==0 ) { ?>

                            <span class="alert">minimum <?php echo $elem["ordertime"]; ?> nap a szálltási idő!</span>
                        <?php } ?>
                    </orderinfo>

                </prices>
<div class="col-sm-4 img-responsive" ><img class="img-responsive" src="<?= $nimg;?>"></div>
                <description  itemprop="description" class="col-sm-8"><?= $Text_Class->keywordstaged( $Text_Class->htmlfromchars($elem["leadtext"]), $metakey_words); ?></description>

                <div class="col-sm-12">
                    <a href="<?= $kezdooldal . $separator . "shop/order/?kosarba=".$elem["id"]."&p=add"; ?>" class="orderbtn" rel="nofollow"><?= lan('order')?></a>
                </div>

                <images class="col-sm-12">
                    <?php
                    //$getparams[2]=decode($getparams[2]);
                        $getparams[0]="shop";
                        $getparams[2]=$elem['id'];

                    include_once("./items/files/web/list.php");
                    ?>
                </images>

                <div class="col-sm-12">
                    <a href="<?= $kezdooldal . $separator . "shop/order/?kosarba=".$elem["id"]."&p=add"; ?>" class="orderbtn" rel="nofollow"><?= lan('order')?></a>
                </div>

            </shoparticle>
        </div>
    </div>
</article>








<style>
    hiddenbox {position: fixed; display: block; top: -1000px}
</style>

