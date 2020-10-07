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

</style>
<div class="clear"></div>
<div class="container">
    <div class="col-sm-8">

        <shop_article itemscope itemtype="http://schema.org/Product" class="border1 bgcolor1">
            <?php
            ?>
            <name itemprop="name" ><?php echo $Text_Class->htmlfromchars($pagedata["title"]); ?></name>

            <topimage class="col-sm-12"><img src="<?php echo("http://" . $domain . $homefolder . "/" . $img); ?>"
                           alt="<?php echo $pagedata["title"]; ?>" title="<?php echo $pagedata["title"]; ?>"
                           itemprop="image"/></topimage>

            <div class="col-sm-4">
            <prices itemprop="offers" itemtype="http://schema.org/AggregateOffer" itemscope>
                <!--endpriece><?php echo priece_format(($pagedata["priece"] + $elem["priece"] / 100 * $pagedata["vat"]), 0); ?>
                    Ft
                </endpriece-->
                <?php if ($eurhuf > 0) { ?>
                    (
                    <price><?php echo priece_format($pagedata["priece"] / $eurhuf, 2); ?> &#8364;</price> )<br/>
                <?php } ?>

                <?php if ($pagedata["priece_old"] > $pagedata["priece"]) { ?>
                    <oldprice itemprop="highPrice"><?php echo priece_format($pagedata["priece_old"], 0); ?> Ft</oldprice>
                    <action><?php echo percentage($pagedata["priece"], $pagedata["priece_old"], 0); ?> %</action>
                <?php } ?>
                <price itemprop="lowPrice">+<?php echo priece_format($pagedata["priece"], 0); ?> <currency itemprop="priceCurrency">Ft</currency></price>
    <!--vat itemprop="vat">+<?php echo $Text_Class->htmlfromchars($pagedata["vat"]); ?>% ÁFA</vat><br /-->

                <orderinfo >
                    <?php echo $storage_satus[$pagedata["storage_status"]]["nev"]; ?>
                    <?php if ($pagedata["storage_status"] == 3) { ?>

                       <span class="alert">minimum <?php echo $pagedata["ordertime"]; ?> nap a szálltási idő!</span>
                    <?php } ?>
                </orderinfo>

            </prices>
            <div class="actions">
                <ul>
                    <?php if ($pagedata["storage_status"] != 5) { ?>
                        <li>
                            <span class="buy clk" onclick="call_kosar_v1('add','<?= $pagedata["id"]?>');" ><iclass="icon-sr-cart-1"> </i><?= lan('Kosárba teszem') ?></span>
                        </li>
                    <?php } ?>
                    <li>
                        <a class="facebookicon35" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $homeurl.$separator.$getparams[0]."/shop/".($pagedata["id"])."/".$Text_Class->to_link($Text_Class->htmlfromchars($pagedata["title"]));?>" target="_blank" rel="noreferrer"><?= lan('Megosztom facebook')?></a>
                    </li>
                    <?php
                    if (($auser["jogid"] >= 3) ) {
                        ?>
                        <li>
                            <a href="<?php echo $kezdooldal . $separator . $getparams[0] . "/edittext/" . base64_encode($pagedata["id"]); ?>"><?= lan('edit')?></a>
                        </li>
                    <?php } ?>
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
                    <description><?php echo($Text_Class->htmlfromchars($pagedata["leadtext"])); ?></description>
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