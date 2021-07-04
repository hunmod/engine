<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "<?php echo $pagedata["title"] ?>",
      "image": [
        "<?php echo $pagedata["image"] ?>"
       ],
      "description": "<?php echo $Text_Class->tageketcsupaszit($pagedata["leadtext"]) ?>",
      "sku": "<?= $pagedata["id"] ?>",
      "mpn": "",
      "brand": {
        "@type": "Brand",
        "name": " <?= $oldalneve ?>"
      },
     /* "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "Fred Benson"
        }
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.4",
        "reviewCount": "89"
      },*/
      "offers": {
        "@type": "Offer",
        "url": "https://example.com/anvil",
        "priceCurrency": "HUF",
        "price": "<?= $pagedata["priece"] ?>",
        "priceValidUntil": "<?php $datetime ?>",
        "itemCondition": "https://schema.org/UsedCondition",
        "availability": "https://schema.org/InStock"
      }
    }
    </script>

<script>
    function count_counterelement(myclass) {
        var numItems = $('.' + myclass).length
        return (numItems);
    }

    function cerate_count_list(several) {
        for (var i = 1; i < several + 1; i++) {
            thisdivid = "'" + i + "'";
            $("#countmenu").append('<li id="countlist' + i + '" onclick="set_active_counterelement(' + thisdivid + ');">' + i + '</li>');
        }
    }


    function set_active_counterelement(mynum) {
        $("li").removeClass("active");
        several = count_counterelement('countelement');
        for (var i = 1; i < several + 1; i++) {
            hidediv('ce' + i);
        }
        if (several < mynum) {
            mynum = several;
        }
        if (1 > mynum) {
            mynum = 1;
        }

        showdiv('ce' + mynum);
        $("#countlist" + mynum).addClass("active");
        activeelemntid = mynum;
    }

    function pageplus_minus(merre) {
        if (merre == '+') {
            activeelemntid++;
        }
        if (merre == '-') {
            activeelemntid--;
        }
        set_active_counterelement(activeelemntid);

    }

    function call_kosar_v1(plusminus,id){
        parancs='q=shop/widget_kosar&kosarba='+id+'&p='+plusminus;
        file="includeajax";
        console.log(server_url+file+".php?"+parancs);
        phpopenf("kosar",file,parancs)
    }

</script>
<style>
    hiddenbox {position: fixed; display: block; top: -1000px}
</style>
<div class="clear"></div>
<div class="container">
    <div class="col-sm-8">

        <shop_article itemscope itemtype="http://schema.org/Product" class="border1 bgcolor1">
            <?php
            ?>
            <h2><name itemprop="name" ><?php echo $Text_Class->htmlfromchars($pagedata["title"]); ?></name></h2>

            <topimage class="col-sm-12"><img src="<?php echo(  homeurl.'/'.$img); ?>" alt="<?php echo $pagedata["title"]; ?>" title="<?php echo $pagedata["title"]; ?>" itemprop="image"/>
            </topimage>
            <meta itemprop="priceCurrency" content="huf" />
            <meta itemprop="category" content="cipőfűző" />
            <meta itemprop="brand" content="okosfuzo" />
            <meta itemprop="itemCondition" content="https://schema.org/NewCondition" />
            <meta itemprop="url" content="<?= ("https://" . $domain . $homefolder . "/" . $img); ?>" alt="<?php echo $pagedata["title"]; ?>" title="<?php echo $pagedata["title"]; ?>" />

            <hiddenbox itemprop="review"></hiddenbox>
            <hiddenbox itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                <span itemprop="ratingValue">4.5</span> /<span itemprop="reviewCount">100</span>
            </hiddenbox>
            <div class="col-sm-4">
            <prices itemprop="offers" itemtype="http://schema.org/Offer" itemscope>

            
            <?php if ($eurhuf>0){?>
            (<priece><?php echo priece_format($pagedata["priece"]/$eurhuf,2);?> &#8364;</priece> )<br />
        <?php }?>
        <?php if ($pagedata["priece_old"]>$pagedata["priece"]){?>
            <oldprice itemprop="highPrice"><?php echo priece_format($pagedata["priece_old"],0);?> </oldprice><currency itemprop="highPriceCurencey">Ft</currency>
            <action itemprop="precent"><?php echo percentage($pagedata["priece"], $pagedata["priece_old"], 0);?> %</action>
        <?php } ?>
        <price><?php echo priece_format($pagedata["priece"],0);?> </price><currency itemprop="priceCurrency">Ft</currency>
        <meta itemprop="price" content="<?= ($pagedata["priece"]);?> " />        
        <meta itemprop="currency_code" content="HUF" />

        <?php if ($pagedata["vat"]>0){?>
        <endprice>(+ <?= $pagedata["vat"]?>% Áfa) <?php echo priece_format(($pagedata["priece"]+$pagedata["priece"]/100*$pagedata["vat"]),0);?> Ft</endprice>
          <?  
       }
        /*          
               <!--vat itemprop="vat">+<?php echo $Text_Class->htmlfromchars($pagedata["vat"]);?>% ÁFA</vat><br /-->
 */ ?>
                <orderinfo >
                    <?php echo $storage_satus[$pagedata["storage_status"]]["nev"]; ?>
                    <?php if ($pagedata["storage_status"] == 3 ||  $pagedata["storage"]==0 ) { ?>

                       <span class="alert">minimum <?php echo $pagedata["ordertime"]; ?> nap a szálltási idő!</span>
                    <?php } ?>
                </orderinfo>

            </prices>
            <div class="actions">
                <ul>
                    <?php if ($pagedata["storage_status"] != 5) { ?>
                        <li>
                           <span class="buy clk" onclick="call_kosar_v1('add','<?= $pagedata["id"]?>');"  ><i class="fa fa-cart-plus"></i> <?= lan('Kosárba') ?></span>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $homeurl.$separator.$getparams[0]."/shop/".($pagedata["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($pagedata["title"]));?>" target="_blank" rel="noreferrer">
                                <i class="fa fa-facebook-square"></i> <?= lan('Megosztom')?></a>
                    </li>
                    <?php
                    if (($auser["jogid"] >= 3) ) {
                        ?>
                        <li>
                            <a href="<?= $kezdooldal . $separator . $getparams[0] . "/edittext/" . base64_encode($pagedata["id"]); ?>" rel="nofollow"><?= lan('edit')?></a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?= $kezdooldal . $separator . "shop/order/?kosarba=".$pagedata["id"]."&p=add"; ?>" rel="nofollow"><?= lan('order')?></a>
                    </li>

                </ul>
            </div>
             </div>
            <div class="col-sm-8">
                <div class="selector" >
                    <ul>
                        <li id="countlist1" onclick="set_active_counterelement('1');">Leírás</li>
                        <li id="countlist2" onclick="set_active_counterelement('2');">Képek</li>
                    </ul>
                </div>
                <div class="countelement" id="ce1">
                    <description itemprop="description" ><?= ( $Text_Class->keywordstaged( $Text_Class->htmlfromchars($pagedata["leadtext"]), $metakey_words)); ?></description>
                </div>
                <div class="countelement" id="ce2">
                    <images>
                        <?php
                        //$getparams[2]=decode($getparams[2]);

                        include_once("./items/files/web/list.php");
                        ?>
                    </images>
                </div>
            </div>

            <div class="clear"></div>

            <?php if ($pagedata["barcode"] != '') { ?>
                <barcode>*<?php echo $pagedata["barcode"]; ?>*</barcode>
            <?php } ?>
            <div class="clear"></div>
        </shop_article>
    </shop_article>
    </div>

    <div class="col-sm-4" id="kosar">
        <?php include("widget_kosar.php"); ?>
    </div>


    <div class="clear"></div>
</div>

<script>
    cerate_count_list(count_counterelement('countelement'));
    set_active_counterelement(1);
</script>