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
float:left;
width:50%;
display:block;	
height:200px;
}
paymentcc{
margin-top:10px;
float:left;
width:100%;
display:block;	
}
</style>
<?php
//var_dump($getparams);


$orderdatas["articles"]=str_replace('
','',$orderdatas["articles"]);


//$oder_articlesid=$ShopClass->jsons_from($oder_articlestext);
$oder_articlesid=json_decode($orderdatas["articles"],true);

$paymod=$ShopClass->paymod();
$post_mod=$ShopClass->post_mod();

//arraylist($datas);
//arraylist($oder_articlesid);
?>
<order_info>
    <buyer>
        Megrendelő:<br />
        <?php echo $orderdatas['name'];?><br />
        <?php echo $orderdatas['email'];?><br />
        <?php echo $orderdatas['phone'];?><br />
        <?php echo $orderdatas['country'];?> <?php echo $orderdatas['zip'];?> <?php echo $orderdatas['city'];?><br />
        <?php echo $orderdatas['address'];?><br />
    </buyer>
    <buyer>
        Számlázási adatok:<br />
        <?php echo $orderdatas['pname'];?><br />
        <?php echo $orderdatas['pcountry'];?> <?php echo $orderdatas['pzip'];?> <?php echo $orderdatas['pcity'];?><br />
        <?php echo $orderdatas['paddress'];?><br />
        <?php echo $orderdatas['pvatno'];?><br />
    </buyer>
    <payment>
        Fizetés<br />
        Fizetési mód:<?php echo $paymod[$orderdatas['pmod']]["nev"];?><br />
        Fizetés ideje:<?php echo $orderdatas['payment_date'];?>
        <?php
        if ($orderdatas['post_date']=='0000-00-00 00:00:00'){
        ?>
        <form method="post">
            Csomag azonosító:<?php
            $FormClass->hiddenbox('formname','rememberpay');
            ?>
            <input name="" type="submit" value="Fizetési emlékezető"/>
       </form>
            <?php
            }


            ?>

            <br />

Szállított tételek: <?php echo $oder_articlesid['summa']["articles_num"];?><br />
Érték:<?php echo $orderdatas["oder_priece"];?> Ft <br />
<strong>Összesen:<?php echo $orderdatas["oder_priece"];?> Ft</strong>
	</payment>  	
    <post>
        Szállítás: <?= $orderdatas['post_priece']?> Ft.<br />
        Módja:<?php echo $post_mod[$orderdatas['post_mod']]["nev"];?><br />    
        Ideje:<?php echo $orderdatas['post_date'];?>
        <br />
        Postai azonosító:<?php echo $orderdatas['post_id'];?><br />    
	    Státusz:<strong><?php echo $order_satus[$orderdatas['pstatus']]["nev"];?></strong><br />
	    Megrendelés dátuma:<?php echo $orderdatas['order_date'];?><br />           
	</post>  

      
    Megjegyzés:<br />
	<?php echo $orderdatas['subject'];?><br />

<?php
//arraylist($oder_articlesid["articles"]);

?>
Tételek:<br />
<div class="clear"></div>
<shop>
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
<div class="clear"></div>
<?php
if ($auser["jogid"]==4){?>
    <a href="<?php echo $separator.$getparams[0].'/order_view/'.encode($getparams[2]);?>">Rendelés megtekintése</a>
<div class="clear"></div>
<?php
	//ha csak meg van rendelve és nem utánvétes
	if (($orderdatas["pstatus"]=='0') && ($orderdatas["pmod"]!='2'))
	{ ?>

	<form method="post">
	<?php
    $FormClass->hiddenbox('formname','payok');
    $FormClass->hiddenbox('pstatus','1');
    $FormClass->hiddenbox('pmod',$orderdatas["pmod"]);
    $FormClass->hiddenbox('id',$orderdatas["id"]);
	 ?>
	<input name="" type="submit" value="Fizetve"/>
	</form>
	<?php
       // arraylist($orderdatas);

    }
	
	//ha ki van fizetve de nincs elküldve
	if (($orderdatas["payment_date"]>'0000-00-00 00:00:00')&&($orderdatas["post_date"]=='0000-00-00 00:00:00')&&($orderdatas["pstatus"]!='6'))
	{ ?>
	<form method="post">
	Csomag azonosító:<?php
        $FormClass->hiddenbox('formname','postok');
        $FormClass->textbox('post_id',$_POST["post_id"]);
	 ?>
	<input name="" type="submit" value="Feldva"/>
	</form>
	<?php 
	}


	//utánvét elküldés
	if (($orderdatas["pmod"]=='2')&&($orderdatas["post_date"]=="0000-00-00 00:00:00"))
	{ ?>
	<form method="post">
	Csomag azonosító:<?php
	hiddenbox('formname','postok');
	textbox('post_id',$_POST["post_id"]);
	hiddenbox('pmod','2');
	 ?>
	 
	<input name="" type="submit" value="Utánvétre elküldöm"/>
	 
	</form>
	<?php 
	}
	//utánvét megjött a lé
	if (($orderdatas["pmod"]=='2')&&($orderdatas["post_date"]>"0000-00-00 00:00:00")&&($orderdatas["pstatus"]!='6'))
	{ ?>
	<form method="post">
	Megött a lé:<?php
        $FormClass->hiddenbox('formname','payok');
        $FormClass->hiddenbox('pmod','2');
        $FormClass->hiddenbox('pstatus',$orderdatas["pstatus"]);
	
	 ?>
	 
	<input name="" type="submit" value="ok"/>
	 
	</form>
	<?php 
	}
}

	//ha megvan rendelve, és nem utánvétes lehessen fizetni pp-vel
	//ki kell egészíteni, hogy ha nincs feladva lehessen pp-vel fizetni.
	if (($orderdatas["pstatus"]=='0') && ($orderdatas["pmod"]!='2'))
	{ ?>
    <form action='?q=shop/paypal/<?php echo $getparams[2];?>' METHOD='POST'>
    <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
    </form>
	<?php 
	}


	//ha ki van fizetve el van elküldve nincs lezárva
	if (($orderdatas["payment_date"]>'0000-00-00 00:00:00')&&($orderdatas["post_date"]>'0000-00-00 00:00:00')&&($orderdatas["pstatus"]!='6'))
	{ ?>
	<form method="post">
	Csomag megérkezett<br />
	<?php
    $FormClass->hiddenbox('formname','orderok');
	?>
	<input name="" type="submit" value="Elfogadom"/> 
	</form>
	<?php 
	}
	?>


