<style>
input:invalid { 
background:#FFE8E9;
}


::-webkit-validation-bubble{
}

::-webkit-validation-bubble-arrow-clipper {
}

::-webkit-validation-bubble-arrow {
}

::-webkit-validation-bubble-message{
}

input::error { appearance: balloon; }

.order{
    padding-bottom: 3em;
    display: inline-table;
    width: 100%;
}
#zip{
    width: 4em;
}#city{
    width: 14em;
}#address{
    width: 19em;
}
#address,#city,#zip{
    display: inline-block;
 //   font-size: 1em;
    margin: 0em 0.6em 1em 0em;
}

.select_pager .textb1{
    font-size: 1em;
    font-weight: inherit;
}
.select_pager,.select_pager .left_arrow, .select_pager .right_arrow, .select_pager .textb1{
    height: 1.5em;
    color: #0D0A0A;

}
.summspec{
    border-top: 2px black solid;
    padding-top: 1em;
}.summspec1{
height: 2.5em;
 }.summspecf{
font-weight: bold;
 }
  shop .btn-success{
      font-size: larger;
      text-transform: capitalize;
  }
/*
input:invalid ~ span:after { content: attr(title); color: red; margin-left: 0.6rem; }*/

</style>
<script>
    function call_kosar_v1(plusminus,id){
        parancs='q=shop/widget_kosar&kosarba='+id+'&p='+plusminus;
        file="includeajax";
        console.log(server_url+file+".php?"+parancs);
        phpopenf("kosar",file,parancs)
    }

</script>

<shop class="container">
    <?php
    //arraylist($_SESSION["kosaram"]["elem"]);
  //  arraylist($kosar_db);
   // arraylist($kosar);
    ?>
<h1>Megrendelés</h1>
<table class="order">
    <tr>
        <td></td>
        <td><?= lan("nev");?> </td>
        <td><?= lan("db");?> </td>
        <td><?= lan("Eegységár");?></td>
        <!--td> Netto</td>
        <td>        Áfa       </td-->
        <td><?= lan("Brutto");?></td>

    </tr>
<?php
if (count($kosar_db)>0){
	foreach($kosar_db as $egyelem)
	{
?>
    <tr>
        <td width="30%">
            <img src="<?php echo $ShopClass->getimg($egyelem["id"],100,100) ;?>" alt="<?php echo $egyelem["title"];?>" title="<?php echo $egyelem["title"];?>" height="100" itemprop="image" width="100px" />
        </td>
        <td width="30%">
	        <?php echo $egyelem["title"]; ?>
        </td>
        <td>
	        <?php echo " (".$egyelem["db"]."db) "; ?>
        </td>
        <td>
	        <?php echo $egyelem["priece"]." Ft"; ?>
        </td>
        <!--td>
	        <?php echo $egyelem["sum"]." Ft"; ?>
        </td>
        <td>
	        <?php echo $egyelem["vat"]."%"; ?>
        </td-->
        <td>
	        <?php echo $egyelem["endpriece"]." Ft"; ?>
        </td>        
        <td>
            <?php if ($egyelem["id"]!="post"){?>
             <a href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=add">+</a>
            <?php } ?> 
        </td>
        <td>
            <?php if ($egyelem["id"]!="post"){?>
              <a href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=neg">-</a>
            <?php } ?> 
        </td>
    </tr>
<?php
	//arraylist($egyelem);
	}
}
?>
    <tr class="summspec1">
        <td> </td>
        <td> </td>
        <td> <?=lan('Posta')?></td>
        <td><?php echo $shoppingcart['summa']["postpriece"] ?> <?=lan('ft')?></td>
		<td><?php echo $shoppingcart['summa']["postpriece"] ?> <?=lan('ft')?></td>
        <td> </td>

    </tr>
    <tr class="summspec summspec1" >
        <td>Összesen:</td>
        <td> </td>
		<td><?php echo $shoppingcart['summa']["articles_num"] ?> <?=lan('tétel')?></td>
		<td><?php echo $shoppingcart['summa']["articles_piece"] ?> <?=lan('darab')?></td>
        <td class="summspecf"><?php echo $shoppingcart['summa']["end_priece_vat"] ?> Ft</td>
        <td> </td>

    </tr>

    <!--tr>
        <td></td>
		<td>Áfa érték</td>
            <td><?php echo $shoppingcart['summa']["vat_sum"] ?> Ft</td>
    </tr> 
    <tr>
        <td></td>
		<td>Kerekítés</td>
            <td><?php echo $shoppingcart['summa']["round"] ?> Ft</td>
    </tr-->
    
</table>

<form method="post" action="?q=shop/order/">
  <div class="col-sm-6">
Megrendelő adatai:<br />
<?php $FormClass->hiddenbox('order',"ok");?>
<?php $FormClass->textbox('name',$orderdata["name"],lan('nev'),'',1)?><br />
<?php $FormClass->textbox('phone',$orderdata["phone"],lan('phone'),'',0)?><br />
<?php $FormClass->emailbox('email',$orderdata["email"],lan('email'),'',1)?><br />
    <?php
    if($orderdata["country"]==''){
        $orderdata["country"]="Magyarország";
    }
    $FormClass->hiddenbox('country',$orderdata["country"],lan('country'),'',1)?>
    <?php $FormClass->textbox('zip',$orderdata["zip"],lan('zip'),'',1)?>
    <?php $FormClass->textbox('city',$orderdata["city"],lan('city'),'',1)?>
    <?php $FormClass->textbox('address',$orderdata["address"],lan('address'),'',1)?>
    </div>
    <div class="clear"></div>
    <!--div class="col-sm-6">
Számlázási adatok:<br />
(nem kötelező megadni)<br />
    <?php $FormClass->textbox('pname',$orderdata["pname"],lan('Számla név'),'',0)?>
    <?php $FormClass->textbox('pcountry',$orderdata["pcountry"],lan('country'),'',0)?>
    <?php $FormClass->textbox('pzip',$orderdata["pzip"],lan('zip'),'',0)?>
    <?php $FormClass->textbox('pcity',$orderdata["pcity"],lan('city'),'',0)?>
    <?php $FormClass->textbox('paddress',$orderdata["paddress"],lan('address'),'',0)?>
    <?php $FormClass->textbox('pvatno',$orderdata["pvatno"],lan('Adószám'),'',0)?>
    </div-->


    <div class="col-sm-6">
Fizetési mód:<br />
<?php

$paymod=$ShopClass->paymod();
$paymod_typ["value"] = "id";
$paymod_typ["name"] = "nev";

if($orderdata["pmod"]==''){
    $orderdata["pmod"]=3;
}


$FormClass->selectbox_roll("pmod",$paymod,$paymod_typ,$orderdata["pmod"])?>
Átvétel:<br />
<?php
$post_mod=$ShopClass->post_mod();
if($orderdata["post_mod"]==''){
    $orderdata["post_mod"]=1;
}
$FormClass->selectbox_roll("post_mod",$post_mod,$paymod_typ,$orderdata["post_mod"])?>

<?php $FormClass->textaera('subject',$orderdata["subject"],lan('subject'))?><br />
    </div>
<input name="update" type="submit" value="Megrendelés ellenőrzése" class="btn btn-primary" />
    <?php
    if (!count($error) && $orderdata['zip']) {
        ?>
        <input name="ordok" type="submit" value="megrendelem" class="btn btn-success"/>
        <?php
    }
    ?>
</form>
    <?foreach ($error as $oneerror){
        ?>
        <?=$oneerror?><br>


    <?php }?>
</shop>