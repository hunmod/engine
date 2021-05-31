<style>
    articles {
        display:table;
        width:100%;
    }
    articles article{
        display:table-row;
    }
    articles article post_date,
    articles article post_id,
    articles article pic,
    articles article priece,
    articles article vat,
    articles article several,
    articles article endpriece
    {
        display:table-cell;
    }
    articles article destription
    {
        display:none;
    }
    buyer,
    post,
    payment{
   /*     float:left;
        width:50%;
        display:block;*/
       // height:200px;
    }
    paymentcc{
        margin-top:10px;
        float:left;
        width:100%;
        display:block;
    }
</style>
<order_info class="container"class="container">
    <h1><?= lan("Rendelési információ")?></h1>
    <buyer class="col-sm-6">
        <h3>Megrendelő:</h3>
        <?php echo $orderdatas['name'];?><br />
        <?php echo $orderdatas['email'];?><br />
        <?php echo $orderdatas['phone'];?><br />
        <?php echo $orderdatas['country'];?> <?php echo $orderdatas['zip'];?> <?php echo $orderdatas['city'];?><br />
        <?php echo $orderdatas['address'];?><br />
    </buyer>
    <payment class="col-sm-6">        
    Megrendelés dátuma:<?php echo $orderdatas['order_date'];?><br />

        <h3>Fizetés</h3>
        Fizetési mód:<?php echo $paymod[$orderdatas['pmod']]["nev"];?><br />
        Fizetési állapot:<?php echo $pay_status[$orderdatas['pstatus']]["nev"];?><br />
        Fizetés ideje:<?php echo $orderdatas['payment_date'];?><br />
        Szállított tételek: <?php echo $orderdatas['oder_piece'];?><br />
        Érték:<?php echo $orderdatas["oder_priece"];?> Ft <br />

        <strong>Összesen:<?php echo $orderdatas["oder_priece"];?> Ft</strong>
        <?php
       // echo $orderdatas['pstatus'];
       // arraylist($pay_status);
        //ha paypal és még nincs fizetve.
        if (/*$orderdatas['pmod']==3 &&*/ $orderdatas['payment_date']<='0000-00-00 00:00:00'){


            ?>
            <!-- PayPal payment form for displaying the buy button -->
            <form action="<?php echo PAYPAL_URL; ?>" method="post">
                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                <!-- Specify a Buy Now button. -->
                <input type="hidden" name="cmd" value="_xclick">
                <!-- Specify details about the item that buyers will purchase. -->
                <input type="hidden" name="item_name" value="<?php echo 'Okosfuzok'.$orderdatas['name']; ?>">
                <input type="hidden" name="item_number" value="<?php echo $orderdatas["id"]; ?>">
                <input type="hidden" name="amount" value="<?php echo $orderdatas["oder_priece"] ?>">
                <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
                <!-- Specify URLs -->
                <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                <!-- Display the payment button. -->
                <input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif">
                <!--input type="submit" class="btn btn-success" name="submit" value="<?=lan("Paypal fizetés")?>"-->
            </form>
            <?php
            
        }
        ?>
        
<a href="<?= homeurl."/shop/barion/".$orderdatas["id"] ?>"><img src="<?= homeurl."/uploads/barion-smart-payment-banners/barion-card-strip-intl_200px.png" ?>" alt="Barion" rel="nofollow"></a>
    </payment>
    <post class="col-sm-6">
        Szállítás: <?= $orderdatas['post_priece']?> Ft.<br />
        Módja:<?php echo $post_mod[$orderdatas['post_mod']]["nev"];?><br />
        Ideje:<?php echo $orderdatas['post_date'];?><br />
        Postai azonosító:<a target="_blank" href="https://www.posta.hu/nyomkovetes/nyitooldal?searchvalue=<?php echo $orderdatas['post_id'];?>"><?php echo $orderdatas['post_id'];?></a><br />
        Posta állapot:<?php echo $post_status[$orderdatas['post_status']]["nev"];?><br />
    </post>
<subject class="col-sm-6">
    <h3>Megjegyzés:</h3>
    <?php echo $orderdatas['subject'];?><br />
</subject>
<div class="clear"></div>
    <shop class="col-sm-12">
        <h3>Tételek:</h3>
        <div class="clear"></div>

        <?php
        for ($i = 0; $i < count($oder_articlesid["articles"]); $i++) {
            if ($oder_articlesid["articles"][$i]["id"]!="post"){?>
                <article>
                    <topimage>
                        <img src="<?php echo $ShopClass->getimg($oder_articlesid["articles"][$i]["id"])?>" height="100" itemprop="image"  />
                    </topimage>
                    <name>
                        <a href="<?php echo $separator.$getparams[0]."/shop"."/".$oder_articlesid["articles"][$i]["id"];?>"><?php echo $oder_articlesid["articles"][$i]["title"];?></a>
                    </name>
                    <priece>
                        <?php echo $oder_articlesid["articles"][$i]["priece"];?> Ft
                    </priece>
                    <!--vat>
            <?php echo $oder_articlesid["articles"][$i]["vat"];?> %
            </vat-->
                    <several>
                        <?php echo $oder_articlesid["articles"][$i]["db"];?> db
                    </several>
                    <!--sum>
            <?php echo $oder_articlesid["articles"][$i]["sum"];?> ft
            </sum-->
                    <endpriece>
                        <?php echo $oder_articlesid["articles"][$i]["endpriece"];?> ft
                    </endpriece>
                    <!--destription>
                        <?php echo $oder_articlesid["articles"][$i]["leadtext"];?>
                    </destription-->
                </article>

            <?php } } ?>


    </shop>
</order_info>
